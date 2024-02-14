<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Auth;
  use constGuards;
  use constDefaults;
  use App\Models\Admin;
  use Illuminate\Support\Facades\DB;
  use Illuminate\Support\Facades\Hash;
  use Illuminate\Support\Str;
  use Illuminate\Support\Carbon;
  use Illuminate\Support\Facades\File;


  class AdminController extends Controller
  {
    public $admin;

    public function loginHandler(Request $request){

      $fieldType = filter_var($request->login_id,FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

      if($fieldType == 'email'){
        $request->validate([
          'login_id' => 'required|email|exists:admins,email',
          'password' => 'required|min:5|max:45'
        ],[
          'login_id.required' => 'Se requiere correo o nombre de usuario.',
          'login_id.email'    => 'Dirección de correo no válida.',
          'login_id.exists'   => 'El correo no existe en el sistema.',
          'password.required' => 'Se requiere contraseña.'
        ]);
      }else{
        $request->validate([
          'login_id' => 'required|exists:admins,username',
          'password' => 'required|min:5|max:45'

        ],[
          'login_id.required' => 'Se requiere correo o nombre de usuario.',
          'login_id.exists'   => 'El correo no existe en el sistema.',
          'password.required' => 'Se requiere contraseña.',
          'min'               => 'La contraseña debe tener al menos 5 caracteres.',
          'max'               => 'La contraseña no debe exceder más de 45 caracteres.'

        ]);
      }
      $creds = array(
        $fieldType => $request->login_id,
        'password' => $request->password
      );
      if(Auth::guard('admin')->attempt($creds)){
        return redirect()->route('admin.home');
      }else{
        session()->flash('fail','Credenciales incorrectas');
        return redirect()->route('admin.login');
      }

    }

    public function logoutHandler(Request $request){
      Auth::guard('admin')->logout();
      session()->flash('fail','Estás desconectado!');
      return redirect()->route('admin.login');
    }

    public function sendPasswordResetLink(Request $request){

      $request->validate([
        'email' => 'required|email|exists:admins,email'
      ],[

        'email.required' => 'Correo electronico es requerido',
        'email.email'    => 'Dirección de correo electrónico no válida',
        'email.exists'   => 'El correo electrónico no existe en el sistema',
      ]);

      /** Get admin details */
      $admin = Admin::where('email',$request->email)->first();

      /** Generate token */
      $token = base64_encode(Str::random(64));

      /** Check if there is an existing reset password token */
      $oldToken = DB::table('password_reset_tokens')->where(['email' => $request->email,'guard' => constGuards::ADMIN])->first();

      if($oldToken){
        /** Update token */
        DB::table('password_reset_tokens')->where([
          'email' => $request->email,
          'guard' => constGuards::ADMIN])
          ->update([
            'token'      => $token,
            'created_at' => Carbon::now()
          ]);

      }else{
        /** Add new token */
        DB::table('password_reset_tokens')->insert([
          'email'      => $request->email,
          'guard'      => constGuards::ADMIN,
          'token'      => $token,
          'created_at' => Carbon::now()
        ]);
      }

      $actionLink = route('admin.reset-password',['token' => $token,'email' => $request->email]);

      $data = array(
        'actionLink' => $actionLink,
        'admin'      => $admin
      );

      $mail_body = view('email-templates.admin-forgot-email-template',$data)->render();

      $mailConfig = array(
        'mail_from_email'      => env('EMAIL_FROM_ADDRESS'),
        'mail_from_name'       => env('EMAIL_FROM_NAME'),
        'mail_recipient_email' => $admin->email,
        'mail_recipient_name'  => $admin->name,
        'mail_subject'         => 'Reset password',
        'mail_body'            => $mail_body
      );

      if(sendEmail($mailConfig)){
        session()->flash('success','Le enviamos por correo el enlace para restablecer su contraseña.');
        return redirect()->route('admin.forgot-password');

      }else{
        session()->flash('fail','Algo salió mal');
        return redirect()->route('admin.forgot-password');
      }

    }

    public function resetPassword(Request $request,$token = null){

      $check_token = DB::table('password_reset_tokens')->where(['token' => $token,'guard' => constGuards::ADMIN])->first();

      if($check_token){
        /** Check if token is not expire */
        $diffMins = Carbon::createFromFormat('Y-m-d H:i:s',$check_token->created_at)->diffInMinutes(Carbon::now());
        //$diffMins = DB::select("SELECT DATEDIFF(MINUTE, GETDATE(), ?) AS diffMins",[$check_token->created_at])[0]->diffMins;

        //d($diffMins);

        if($diffMins > constDefaults::tokenExpiredMinutes){
          /** token expired */
          session()->flash('fail','El token expiró, solicite otro enlace para restablecer la contraseña.');
          return redirect()->route('admin.forgot-password',['token' => $token]);
        }else{
          return view('backend.pages.admin.auth.reset-password')->with(['token' => $token]);
        }

      }else{
        session()->flash('fail','Token no válido! Solicite otro enlace para restablecer la contraseña');

      }

    }

    public function resetPasswordHandler(Request $request){
      $request->validate([
        /*'new_password'              => 'required|min:5|max:45|required_with:new_password_confirmation|same:new_password_confirmation',
        'new_password_confirmation' => 'required'*/

        'new_password'              => 'required|min:5|max:20',
        'new_password_confirmation' => 'required|same:new_password',
      ],[
        'required' => 'Se requiere nueva contraseña.',
        'min'      => 'La nueva contraseña debe tener al menos 5 caracteres.',
        'max'      => 'La nueva contraseña no debe exceder más de 20 caracteres.',
        'same'     => 'La confirmación de la contraseña no coincide con la nueva contraseña.',

      ]);

      $token = DB::table('password_reset_tokens')->where(['token' => $request->token,'guard' => constGuards::ADMIN])->first();

      /** Get admin token */
      $admin = Admin::where('email',$token->email)->first();

      /** Update admin password */
      Admin::where('email',$admin->email)->update(['password' => Hash::make($request->new_password)]);

      /** Deleted token record */
      DB::table('password_reset_tokens')->where([
        'email' => $admin->email,
        'token' => $request->token,
        'guard' => constGuards::ADMIN
      ])->delete();

      /** Send email to notify admin */
      $data = array(
        'admin'        => $admin,
        'new_password' => $request->new_password
      );

      $mail_body = view('email-templates.admin-reset-email-template',$data)->render();

      $mailConfig = array(
        'mail_from_email'      => env('EMAIL_FROM_ADDRESS'),
        'mail_from_name'       => env('EMAIL_FROM_NAME'),
        'mail_recipient_email' => $admin->email,
        'mail_recipient_name'  => $admin->name,
        'mail_subject'         => 'Password Changed',
        'mail_body'            => $mail_body
      );

      sendEmail($mailConfig);
      /** Redirect and display message on login page */
      return redirect()->route('admin.login')->with('success','Listo!, Tu contraseña ha sido cambiada. Utilice la nueva contraseña para iniciar sesión en el sistema.');

    }

    public function profileView(Request $request){
      $admin = null;
      if(Auth::guard('admin')->check()){
        $admin = Admin::findOrFail(auth()->id());
      };
      return view('backend.pages.admin.profile',compact('admin'));
    }

    public function changeProfilePicture(Request $request){
    	$admin = Admin::findOrFail(auth('admin')->id());
      $path = 'images/users/admins/';
      $file = $request->file('adminProfilePictureFile');
      $old_picture = $admin->getAttributes()['picture'];
      $file_path = $path.$old_picture;
      $filename = 'ADMIN_IMG_'.rand(2,1000).$admin->id.time().uniqid().'.jpg';

      $upload = $file->move(public_path($path),$filename);

      if($upload){
        if($old_picture != null && File::exists(public_path($path.$old_picture))){
          File::delete(public_path($path.$old_picture));
        }
        $admin->update(['picture'=>$filename]);
        return response()->json(['status'=>1,'msg'=>'Tu foto de perfil se ha actualizado correctamente.']);
      }else{
        return response()->json(['status'=>0,'msg'=>'Algo ha salido mal.']);
      }

    }


  }



