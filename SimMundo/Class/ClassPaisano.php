<?php

/**
* 
*/
class ClassPaisano
{
	
	public $numeroFechasSulfatos;
	public $diasDuracionSulfato;
	public $rangoTiempoSulfato;

	function __construct()
	{
		# code...
	}

 	public function setDuracionSulfato($duracion){
 		$this->diasDuracionSulfato = $duracion;
 	}



 	public function setFechasSulfato($arrayFech){
 		$this->rangoTiempoSulfato = $arrayFech;
 	}


 	public function setNumeroFechasSulfatos($num){
 		$this->numeroFechasSulfatos = $num;
 	}


 	public function getNumeroFechasSulfatos(){
 		return $this->numeroFechasSulfatos;
 	}

}

?>