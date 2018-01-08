<?php

if(!isset($_GET["historial_tipo"]))
{
	if(isset($_GET['codcliente']))
	{
		$historia =  new historial();
		$historia->usuario        = $_REQUEST['codcliente'];
		$historia->tipo_operacion = $_REQUEST['operacion_tipo'];
		$tipo_operacion_letras="...";
		
		if(isset($_GET['pagina']))
		{
			$tipo_operacion_letras =  $_REQUEST['pagina'];
		}
		$historia->observacion    = date('l jS \of F Y h:i:s A')." tipo: ".$tipo_operacion_letras."";
		$historia->add();
	}
}





if(!isset($_SESSION["cart"])){
	$_SESSION["cart"] = array( array("product_id"=>$_GET["product_id"],"q"=>1 ));
}else{
	
	$products = $_SESSION["cart"];
	$news = array();
	$newp = array("product_id"=>$_GET["product_id"],"q"=>1);
		if(!in_array($newp, $products)){
			array_push($products, $newp);
		}
		$_SESSION["cart"]=$products;
}
//print_r($products);

if($_GET["href"]=="product"){
Core::redir("index.php?view=producto&product_id=".$_GET["product_id"]);
}else if($_GET["href"]=="cat"){
	$p =  ProductData::getById($_GET["product_id"]);
	$cat = CategoryData::getById($p->category_id);
	Core::redir("index.php?view=productos&cat=".$cat->short_name);
}




?>