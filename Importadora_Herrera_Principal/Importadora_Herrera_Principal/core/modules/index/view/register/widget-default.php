
		
<div class="container">
	<div class="row">
		<div class="col-md-7">
    <h3>Registrate para poder participar y comprar!</h3>  
    <p>Sistema de compra online . Tomando como base principal el control de la calidad</p>
    </div>
		<div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-heading">REGISTRO DE CLIENTES</div>
				<div class="panel-body">
<form class="form-horizontal" role="form" id="formulario" method="post" action="index.php?action=register">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">*Nombre</label>
    <div class="col-lg-10">
      <input type="text"  required onkeypress="return soloLetras(event);" name="name" class="form-control" id="nombre" placeholder="Nombre" >
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">*Apellido</label>
    <div class="col-lg-10">
      <input type="text" required onkeypress="return soloLetras(event);" name="lastname" class="form-control" id="apellido" placeholder="Apellido" >
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Telefono</label>
    <div class="col-lg-10">
      <input type="text" name="phone" class="form-control" id="telefono" placeholder="Telefono" >
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Direccion</label>
    <div class="col-lg-10">
      <input type="text" name="address" class="form-control" id="inputEmail1" placeholder="Direccion" >
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">*Correo Electronico</label>
    <div class="col-lg-10">
      <input type="email" name="email" required="required" class="form-control" id="email" placeholder="Correo Electronico">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">*Contrase&ntilde;a</label>
    <div class="col-lg-10">
      <input type="password" required name="password" class="form-control" id="pass" placeholder="Contrase&ntilde;a">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="accept" required> Acepto terminos y condiciones de uso
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" id="send" class="btn btn-block btn-default">Registrarme</button>
    </div>
  </div>
</form>
      <p class="text-muted">* Campos obligatorios</p>
				</div>
			</div>
		</div>
	</div>
</div>