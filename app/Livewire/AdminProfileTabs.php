<?php

  namespace App\Livewire;

  use Livewire\Component;
  use Illuminate\Support\Facades\Auth;
  use App\Models\Admin;
  use Illuminate\Support\Facades\Hash;

  class AdminProfileTabs extends Component
  {

    public $tab = null;
    public $tabname = 'personal_details';
    protected $queryString = ['tab'];
    public $fullname,$email,$username,$admin_id;
    public $current_password,$new_password,$new_password_confirmation;

    public $type;
    public $message;

    public function selectTab($tab){
      $this->tab = $tab;

    }

    public function mount(){
      $this->tab = request()->tab ? request()->tab : $this->tabname;

      if(Auth::guard('admin')->check()){
        $admin          = Admin::findOrFail(auth()->id());
        $this->admin_id = $admin->id;
        $this->fullname = $admin->fullname;
        $this->email    = $admin->email;
        $this->username = $admin->username;

      }

    }

    public function updateAdminPersonalDetails(){
      $this->validate([
        'fullname' => 'required|min:5',
        'email'    => 'required|email|unique:admins,email,' . $this->admin_id,
        'username' => 'required|min:5|unique:admins,username,' . $this->admin_id
      ],[
        'fullname' => 'Se requiere nombre completo del usuario',
        'min'      => 'El nombre debe tener un mínimo de 5 caracteres.',

      ]);

      Admin::find($this->admin_id)
        ->update([
          'fullname' => $this->fullname,
          'email'    => $this->email,
          'username' => $this->username
        ]);

      $this->dispatch('updateAdminSellerHeaderInfo');
      $this->dispatch('updateAdminInfo',[
        'adminName'  => $this->fullname,
        'adminEmail' => $this->email,

      ]);

      $this->showToastr('success','Sus datos personales se han actualizado correctamente.');
    }

    public function updatePassword(){
      $this->validate([
        'current_password' => [
          'required',function($attribute,$value,$fail){
            if(!Hash::check($value,Admin::find(auth('admin')->id())->password)){
              return $fail(__('La contraseña actual es incorrecta'));
            }
          }
        ],
        'new_password'     => 'required|min:5|max:45|confirmed'
      ],[
        'new_password.required'  => 'El campo nueva contraseña es obligatorio.',
        'new_password.min'       => 'La nueva contraseña debe tener al menos 5 caracteres.',
        'new_password.confirmed' => 'La confirmación de la contraseña no coincide.',

      ]);

      $query = Admin::findOrFail(auth('admin')->id())->update([
        'password' => Hash::make($this->new_password)
      ]);

      if($query){
        /** Send email to notify admin */
        $_admin = Admin::findOrFail($this->admin_id);
        $data = array(
          'admin'        => $_admin,
          'new_password' => $this->new_password
        );

        $mail_body = view('email-templates.admin-reset-email-template',$data)->render();

        $mailConfig = array(
          'mail_from_email'      => env('EMAIL_FROM_ADDRESS'),
          'mail_from_name'       => env('EMAIL_FROM_NAME'),
          'mail_recipient_email' => $_admin->email,
          'mail_recipient_name'  => $_admin->name,
          'mail_subject'         => 'Password Changed',
          'mail_body'            => $mail_body
        );

        sendEmail($mailConfig);

        $this->current_password = $this->new_password = $this->new_password_confirmation = null;
        $this->showToastr('success','Cambio de contraseña exitoso.');
      }else{
        $this->showToastr('error','Algo salió mal.');
      }

    }

    public function showToastr($type,$message){
      return $this->dispatch('showToastr',[
        'type'    => $type,
        'message' => $message,

      ]);

    }

    public function render(){
      return view('livewire.admin-profile-tabs');

    }


  }


