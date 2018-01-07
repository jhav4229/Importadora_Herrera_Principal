<?php
$total = 0;
$iva = ConfigurationData::getByPreffix("general_iva")->val;
$coin_symbol = ConfigurationData::getByPreffix("general_coin")->val;
$ivatxt = ConfigurationData::getByPreffix("general_iva_txt")->val;

?>
<div class="container">
	<div class="row">

		<div class="col-md-12">
			<?php if(!isset($_SESSION["client_id"])):?>
				<p id="operacion_error" name="operacion_error" class="alert alert-danger">Debes registrarte e iniciar sesion para proceder.</p>
					<script>
					
						$( "#operacion_error" ).load( "ajax/test.html", function() 
						{
							  var cliente_log = $("#usuario_logueado").val();
								$.ajax({
									contentType: "application/json; charset=utf-8",
									type: "GET",
									url: 'index.php?action=addtocart&href=historial_tipo',
									data:{codcliente:cliente_log,operacion_tipo:3},
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
						});
					
					</script>
			<?php endif; ?>
		</div>
</div>

	<div class="row">

		<div class="col-md-12">
			<?php if(isset($_SESSION["cart"]) && count($_SESSION["cart"]>0)):?>
		<h2>Mi Carrito</h2>
<table class="table table-bordered">
<thead>
	<th>Codigo</th>
	<th>Producto</th>
	<th>Cantidad</th>
	<th>Precio Unitario</th>
	<th>Total</th>
	<th></th>
</thead>
<?php 
foreach($_SESSION["cart"] as $s):?>

<?php if($s["product_id"]!=null){  ?>

<?php $p = ProductData::getById($s["product_id"]);  ?>
<tr>
<td><?php  if($p!=null){ echo $p->code; }?></td>
<td><?php  if($p!=null){ echo $p->name; }?></td>
<td style="width:100px;">
<form id="p-<?=$s["product_id"];?>">
<input type="hidden" name="p_id" value="<?=$s["product_id"];?>">
<input type="number" name="q" id="num-<?=$s["product_id"];?>" value="<?php echo $s["q"]; ?>" class="form-control">
</form>
<script>
	$("#num-<?=$s['product_id'];?>").change(function(){
		$.post("./?action=editcart",$("#p-<?=$s['product_id']?>").serialize()	,function(data){
			window.location = window.location;

		});
	});
</script>
</td>
<td><h4><?php echo $coin_symbol;  ?> <?php if($p!=null){ echo $p->price; }        ?></h4> </td>
<td><h4><?php echo $coin_symbol; ?>  <?php if($p!=null){ echo $p->price*$s["q"];} ?></h4> </td>
<td style="width:30px;"><a href="index.php?action=deletefromcart&product_id=<?php echo $p->id; ?>&href=cart" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a></td>
<?php
		if($p!=null)
		{
			$total += $s["q"]*$p->price;
		}
	
	}
 endforeach; ?>
</tr>
</table>


<div class="row">
<div class="col-md-5">

</div>
<div class="col-md-5 col-md-offset-2">
	<table class="table table-bordered">
		<tr>
			<td>Subtotal</td><td><?php echo $coin_symbol; ?> <?php echo number_format($total-($total*($iva/100)),2,".",","); ?></td>
		</tr>
		<tr>
			<td><?php echo $ivatxt; ?></td><td><?php echo $coin_symbol; ?> <?php echo number_format($total*($iva/100),2,".",","); ?></td>
		</tr>
		<?php if(isset($_SESSION["coupon"])):?>
	<?php else:?>
		<tr>
			<td>Total</td><td><?php echo $coin_symbol; ?> <?php echo number_format($total,2,".",","); ?></td>
		</tr>

	<?php endif; ?>

	</table>
<br>
			<?php if(isset($_SESSION["client_id"])):?>
<form action="index.php?view=checkout" method="post">
<label>Metodo de pago</label>




<select class="form-control"  name="paymethod_id">
<?php foreach(PaymethodData::getActives() as $pay):?>
	<option value="<?php echo $pay->id; ?>"><?php echo $pay->name; ?></option>
<?php endforeach; ?>
</select><br>
<button class="btn btn-primary btn-block">Confirmar Comprar</button>
</form>
<?php endif; ?>
<br>
<a href="index.php?action=cleancart" class="btn btn-danger btn-block">Limpar Carrito</a>
</div>
</div>



			<?php else:
			?>
				<div class="jumbotron">
				<h2>No hay productos</h2>
				<p>No ha agregado productos al carrito.</p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>