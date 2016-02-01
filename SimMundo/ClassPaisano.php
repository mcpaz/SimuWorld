<?php

/**
* 
*/
class ClassPaisano
{
	
	public $sulfatar;
	public $duracionSulfato = 20;
	public $rangoTiempoSulfato = 50;

	function __construct()
	{
		# code...
	}

 	public function getSulfatar(){
 		return $this->sulfatar;
 	}


 	public function setSulfatar($s){
 		$this->sulfatar = $s;
 	}


 	public function getDuracionSulfato(){
 		return $this->duracionSulfato;
 	}

 	public function setDurecionSulfato($duracion){
 		$this->duracionSulfato = $duracion;
 	}

 	//cada cuanto se sulfata
 	public function getRangoTiempoSulfato(){
 		return $this->rangoTiempoSulfato;
 	}

 	public function setRangoTiempoSulfato($rango){
 		$this->rangoTiempoSulfato = $rango;
 	}



}

?>