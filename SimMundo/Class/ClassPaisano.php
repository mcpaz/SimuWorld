<?php

/**
* 
*/
class ClassPaisano
{
	
	public $numeroFechasSulfatos;
	public $diasDuracionSulfato;
	public $tiempoSulfato = array();

	function __construct()
	{
		# code...
	}

 	public function setDuracionSulfato($duracion){
 		$this->diasDuracionSulfato = $duracion;
 	}

 	public function getDuracionSulfato(){
 		return $this->diasDuracionSulfato;
 	}



 	public function setFechasSulfato($arrayFech){
 		$this->tiempoSulfato = $arrayFech;
 	}

 	public function getFechasSulfato(){
 		return $this->tiempoSulfato;
 	}


 	public function setNumeroFechasSulfatos($num){
 		$this->numeroFechasSulfatos = $num;
 	}


 	public function getNumeroFechasSulfatos(){
 		return $this->numeroFechasSulfatos;
 	}

}

?>