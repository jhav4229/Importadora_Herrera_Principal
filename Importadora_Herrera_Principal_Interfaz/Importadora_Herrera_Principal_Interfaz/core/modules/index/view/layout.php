<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Importadora Herrera - Sistema de Tienda en Linea</title>

  <link rel="stylesheet" type="text/css" href="res/lib/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="res/lib/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="res/btn-label.css">
  <script src="res/lib/jquery/jquery.min.js"></script>


  <script type="text/javascript">
  	$(document).ready(function(){
  
  	//validacion telefono

	$("#formulario").submit(function () {
		if(isNaN($("#telefono").val())) {
			alert("El teléfono solo debe contener números");
			return false;
		}
		if($("#telefono").val().length < 10) {
			alert("El teléfono debe tener 10 caracteres. Ej. 0984508934");
			return false;
		}
		
	});

	//validacion correo

	$('#send').click(function() {
    // Expresion regular para validar el correo
    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,3}/;

    // Se utiliza la funcion test() nativa de JavaScript
    if (regex.test($('#email').val().trim())) {
        return true;
        
    } else {
        alert('La dirección de correo no es valida. Ej. ejemplo@dominio.com');
        return false;
    }
});

});

  </script>

<script type="text/javascript">
	//Se utiliza para que el campo de texto solo acepte letras
function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
    especiales = [8, 37, 39, 46, 6]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial){
alert('Ingrese solo letras');
        return false;
      }
}
</script>


</head>
<body >

<style type="text/css">
 .goog-te-banner-frame.skiptranslate {
    display: none !important;
    } 
body {
    top: 0px !important; 
    }
 .goog-te-gadget-icon {
    display: none !important;
    } 	
	

.skiptranslate goog-te-gadget {
display: none;
}


.right{
    float: right;
}

  </style>
	<script language="JavaScript" type="text/javascript">
		var fechaInicio;
		$( document ).ready(function() {
			$(".goog-logo-link").removeClass("goog-logo-link").addClass("hide");
			$(".goog-te-banner-frame skiptranslate").removeClass("goog-te-banner-frame skiptranslate").addClass("hide");
			$(".goog-te-gadget-icon").removeClass("goog-te-gadget-icon").addClass("hide");
			
			var fecha = new Date();
			fechaInicio = new Date(fecha);
						
		});
		$( window ).on( "load", function() {
			$(".goog-logo-link").removeClass("goog-logo-link").addClass("hide");
			$(".goog-te-banner-frame skiptranslate").removeClass("goog-te-banner-frame skiptranslate").addClass("hide");
			$("# :1.container").removeClass("goog-te-banner-frame skiptranslate").addClass("hide");
		});
	   $(".goog-te-gadget-icon").removeClass("goog-te-gadget-icon").addClass("hide");
	   
	   
	   
	    window.onbeforeunload = preguntarAntesDeSalir;
		function preguntarAntesDeSalir()
		{
		  
		  
									var fecha = new Date();
							var fechaFinal = new Date(fecha);
				//La diferencia se da en milisegundos así que debes dividir entre 1000
				var c = ((fechaFinal-fechaInicio)/1000);

				if(c<=5)
				{
						var pathname = window.location.pathname;
						var cliente_log = $("#usuario_logueado").val();
						$.ajax({
							contentType: "application/json; charset=utf-8",
							type: "GET",
							url: 'index.php?action=addtocart&href=historial_tipo',
							data:{codcliente:cliente_log,operacion_tipo:6,pagina:pathname},
							dataType: "json",
							success: function(response)
							{
								$.each(response, function(index, element) 
								{                        
									if(index=='nombre')
									{
										$('#txtNombre').val(element);
									}
								});                   
							}
						});
				}
				else
				{
						var pathname = window.location.pathname;
						var cliente_log = $("#usuario_logueado").val();
						$.ajax({
							contentType: "application/json; charset=utf-8",
							type: "GET",
							url: 'index.php?action=addtocart&href=historial_tipo',
							data:{codcliente:cliente_log,operacion_tipo:7,pagina:pathname},
							dataType: "json",
							success: function(response)
							{
								$.each(response, function(index, element) 
								{                        
									if(index=='nombre')
									{
										$('#txtNombre').val(element);
									}
								});                   
							}
						});
				}
			
		}

	   
    </script>
	
	<div class="right">
		<div id="google_translate_element">
		</div>
	</div>
	<div class="right">
		<a  data-toggle="modal" data-target="#exampleModalLong" onclick="guardar_historial()" >
		  Ayuda  
		</a>
		&nbsp;  &nbsp; &nbsp; &nbsp;
	</div>	

	<script type="text/javascript">
				function googleTranslateElementInit() {
				  new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages: 'en,es', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
				}
				
				function guardar_historial()
				{

			
					 var cliente_log = $("#usuario_logueado").val();
						$.ajax({
							contentType: "application/json; charset=utf-8",
							type: "GET",
							url: 'index.php?action=addtocart&href=historial_tipo',
							data:{codcliente:cliente_log,operacion_tipo:1},
							dataType: "json",
							success: function(response)
							{
								$.each(response, function(index, element) 
								{                        
									if(index=='nombre')
									{
										$('#txtNombre').val(element);
									}
								});                   
							}
						});
				}	
	</script>
	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
	</script>



</br>
</br>



<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Sistema De Ayuda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

	  Hola mundo. Sistema De Ayuda


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>






<section>
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-xs-5">
      <br><h1>Importadora Herrera</h1>
      </div>
      <div class="col-md-7 col-xs-5">
<br><br>
<form class="form-horizontal" role="form">
<div class="input-group">
<input type="hidden" name="view" value="productos">
<input type="hidden" name="act" value="search">
      <input type="text" name="q" placeholder="Buscar productos ..." class="form-control">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="button">&nbsp;<i class="fa fa-search"></i>&nbsp;</button>
      </span>
    </div><!-- /input-group -->
</form>
<br><br>
      </div>
      <div class="col-md-2 col-xs-2">
        <!-- cart button -->
<br><br>
<a href="index.php?view=mycart" class="btn btn-block btn-default"><i class="fa fa-shopping-cart"></i> 
<?php if(isset($_SESSION["cart"])):?>
<span class="badge"><?php echo count($_SESSION["cart"]); ?></span>
<?php endif; ?>
      </a>
      </div>

    </div>
  </div>
</section>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
<div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li><a href="./"><i class="fa fa-home"></i> Inicio</a></li>
<?php
$cats = CategoryData::getPublics();
?>
<?php if(count($cats)>0):?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-th-list"></i> Productos<b class="caret"></b></a>
        <ul class="dropdown-menu">
<?php foreach($cats as $cat):?>
          <li><a href="index.php?view=productos&cat=<?php echo $cat->short_name; ?>"><?php echo $cat->name; ?></a></li>
<?php endforeach; ?>
        </ul>
      </li>
<?php endif; ?>
<!--      <li><a href="index.php?view=contacto"><i class="fa fa-envelope"></i> Contactanos</a></li> -->
    </ul>

    <ul class="nav navbar-nav navbar-right">

<?php if(!isset($_SESSION["client_id"])):?>
	<input type="hidden" name="usuario_logueado" id="usuario_logueado" value="invitado">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp; <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?view=clientaccess">Iniciar Sesion</a></li>
          <li><a href="index.php?view=register">Registrarse</a></li>
        </ul>
      </li>
    </ul>
<?php else:
$client = ClientData::getById($_SESSION["client_id"]);

?>

	<script type="text/javascript">
				function guardar_historial_cerrar_sesion()
				{
					 var cliente_log = $("#usuario_logueado").val();
						$.ajax({
							contentType: "application/json; charset=utf-8",
							type: "GET",
							url: 'index.php?action=addtocart&href=historial_tipo',
							data:{codcliente:cliente_log,operacion_tipo:5},
							dataType: "json",
							success: function(response)
							{
								$.each(response, function(index, element) 
								{                        
									if(index=='nombre')
									{
										$('#txtNombre').val(element);
									}
								});                   
							}
						});
				}	
	</script>
	
<input type="hidden" name="usuario_logueado" id="usuario_logueado" value="<?php $client ?>">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> &nbsp; <?php echo $client->name." ".$client->lastname;?><b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?view=client">Inicio</a></li>
          <li><a href="logout.php">Salir</a></li>
        </ul>
      </li>
    </ul>
<?php endif; ?>
  </div><!-- /.navbar-collapse -->
</div>
</nav>
<?php View::load("index"); ?>
<br><br><br>
<section>
<div class="container">

<!-- - - - -->
<div class="row">
<div class="col-md-12">
<hr>
<p><b>Importadora Herrera</b> &copy; 2018</p>
<ul class="list-inline">

</ul>
</div>
</div>
</div>
</section>
<br>
  <script src="res/lib/bootstrap/js/bootstrap.min.js"></script>
  <script>
  $(".tip").tooltip();
  </script>
</body>
</html>