<p>Estimado: {{ $admin->name }}</p>
<p>
  Recibimos una solicitud para restablecer el password de la cuenta de LivoBank asociada con <i>{{ $admin->email }}</i>.
  Puede restablecer su password haciendo clic en el boton a continuacion:
  <br><br>
  <a href="{{$actionLink}}" target="_blank" style="color:#fff;border-color:#22bc66;border-style:solid;border-width: 5px 10px;background-color: #22bc66;
	display:inline-block;text-decoration:none;border-radius:3px;box-shadow: 0 2px 3px rgba(0,0,0,0.16); -webkit-text-size-adjust: none;box-sizing: border-box;">Restablecer
    el password</a>
  <br><br>
  <b>NB:</b> Este enlace seguira siendo valido dentro de 30 minutos.
  <br><br>
  No solicitaste el restablecimiento del password. Por favor ignore este correo electronico.
</p>

