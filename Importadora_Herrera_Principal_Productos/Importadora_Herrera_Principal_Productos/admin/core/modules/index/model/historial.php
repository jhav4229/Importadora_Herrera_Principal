<?php
class historial {
	public static $tablename = "historial";


	public function historial(){
		$this->usuario = "";
		$this->tipo_operacion = 0;
		$this->observacion = "";
		

	}

	public function add(){
		$sql = "insert into ".self::$tablename." (usuario,tipo_operacion,observacion) ";
		$sql .= "value (\"$this->usuario\",$this->tipo_operacion,\"$this->observacion\")";
		Executor::doit($sql);
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new historial());
	}

}

?>