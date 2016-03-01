<?php

/**
* 
*/
class ClassPaisano
{
	
	public $sulfatar;
	public $diasDuracionSulfato;
	public $rangoTiempoSulfato;

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


 	public function getDiasDuracionSulfato(){
 		return $this->diasDuracionSulfato;
 	}

 	public function setDiasDurecionSulfato($duracion){
 		$this->diasDuracionSulfato = $duracion;
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