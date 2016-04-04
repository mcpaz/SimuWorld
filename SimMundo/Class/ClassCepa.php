<?php

class ClassCepa{

	//varialbe que recoje del mundo
	public $temperatura;
	public $lluvia; //cantidad de lluvia  que cae 
	public $humedad; 
	public $tipoTierra; // tipo de tierra que es determiante en la produccion y calidad del vino
					  // por si queremos meter tambien este tipo de variable.
	public $phTierra;
	public $sulfato;//guarda si el paisano ha sulfatado o no.
	

	//variables propias de la cepa
	public $totalTamanoHojas;
	public $arrayHojas = array();
	public $pesoRacimo = 0.1;
	public $pesoRacimoPerdido = 0;

	public $tenerHongo = 0; //guarda si tiene o no hongo
	public $fechaSulfatado;
	public $inicializarArrayHojas = 0;//para controlar que se inicilize el array de hojas

	//getters
	public function getTemperatura(){
		return $this->temperatura;		
	}
	public function getLluvia(){
		return $this->lluvia;		
	}
	public function gethumedad(){
		return $this->humedad;		
	}
	public function getPhTierra(){
		return $this->phTierra;		
	}
	public function getSulfatado(){
		return $this->sulfato;		
	}
	public function getVelocidadViento(){
		return $this->velocidadViento;		
	}


	//getters especificos de cepa

	public function getPesoRacimo(){
		return $this->pesoRacimo;		
	}

	public function getNumeroRacimo(){
		return $this->velocidadViento;		
	}

	public function getNumeroHojas(){
		return $this->numerohojas;		
	}

	public function getTamanoHojas(){
		return $this->tamanoHojas;		
	}

	public function getTenerHongo(){
		return $this->tenerHongo;		
	}

	public function getFechaSulfatado(){
		return $this->fechaSulfatado;		
	}


	//setters
	public function setTemperatura($t){
		$this->temperatura = $t;		
	}
	public function setLluvia($l){
		$this->lluvia = $l;		
	}
	public function setHumedad($h){
		$this->humedad = $h;		
	}
	public function setPhTierra($pt){
		$this->phTierra = $pt;		
	}
	public function setSulfate($s){
		$this->sulfatado = $s;		
	}


	//setters propios

	public function setPesoRacimo($i){
		$this->pesoRacimo=$i;		
	}

	public function setNumeroRacimo($i){
		$this->velocidadViento=$i;		
	}

	public function setNumeroHojas($i){
		$this->numerohojas=$i;		
	}

	public function setTamanoHojas($i){
		$this->tamanoHojas=$i;		
	}

	public function setTenerHongo($i){
		$this->tenerHongo=$i;		
	}

	public function setFechaSulfatado($i){
		$this->fechaSulfatado=$i;		
	}


	public function getPesoPesoPerdido(){
		return $this->pesoRacimoPerdido;
	}



	//metodo apra restarle al peso del racimo de la uva el tamanho del hongo

	/*public function restarTamanoHongoPesoUva($porcentajeAumentoHongo){

		//regla de 3 para restar e l valor la peso del racimo el procentaje de ceciemino de la hogo
		$resta = ($this->pesoRacimo*$porcentajeAumentoHongo)/1;

		//guardo el pso de uva perdidos
		$this->pesoRacimoPerdido = $this->pesoRacimoPerdido + $resta;


		$this->pesoRacimo = $this->pesoRacimo - $resta;


	}*/


	public function restarTamanoHongoPesoUva($porcentajeAumentoHongo){

		//regla de 3 para restar e l valor la peso del racimo el procentaje de ceciemino de la hogo
		$resta = $this->pesoRacimo*$porcentajeAumentoHongo;


		//guardo el pso de uva perdidos
		$this->pesoRacimoPerdido = $this->pesoRacimoPerdido + $resta;

	


		//revisar esta mierda
		//lo hago por los negativos
		if ($this->pesoRacimo >= $resta){
			$this->pesoRacimo = $this->pesoRacimo - $resta;
		}else{
			//$this->pesoRacimo = $resta -$this->pesoRacimo ;
			$this->pesoRacimo = 1;
		}

	}



	//funciones para calcular el crecimiento tanto de la hoja como del peso de la uva

	//meter tambien el parametro del tamaño de la hoja
	public function calCrecPesoRacimo($lluvia,$temperatura,$refLluvia,$refTemp,$crecimiento,$tamanoHoja){
		

		//cuand obtengo el porcentaje de crecieminto lo multiplico por la media de crecimiento por dia, proporcinona por el peso
		//ideal divido por los dias de madurez en vez de por el peso, y se lo sumo al pesototal

		if($lluvia == 0){
			$lluvia = $lluvia + 0.01;
		}


		if($temperatura == 0){
			$temperatura = $temperatura + 0.01;
		}

		$aumento = ($lluvia*$temperatura*$crecimiento)/($refLluvia*$refTemp);

		//sumo al peso del racimo que hay lo que aumenta
		$this->pesoRacimo = $this->pesoRacimo + ($this->pesoRacimo * $aumento);

		return $this->pesoRacimo;

	}


	public function calCrecimientoHoja($lluvia,$temperatura,$refLluvia,$refTemp,$crecimiento,$numeroHojas){
		if($lluvia == 0){
			$lluvia = $lluvia + 0.01;
		}


		if($temperatura == 0){
			$temperatura = $temperatura + 0.01;
		}

		if($this->inicializarArrayHojas == 0){
			$this->inicializarArrayHojas($numeroHojas);
			$inicializarArrayHojas = 1;
		}



		for ($i=0;$i<$numeroHojas;$i++){

			$aumento = ($lluvia*$temperatura*$crecimiento)/($refLluvia*$refTemp);
			$this->arrayHojas[$i] = $this->arrayHojas[$i]  + ( $this->arrayHojas[$i]*$aumento);
		}

		//de esta manera devuelvo  el totoal de tamano de hoja que hay hasta el momento
		//lo hago para poder pasarle datos al lotg en claseMundo
		return $this->calcularTotalTamanoHojas($numeroHojas);

	}

	public function calcularTotalTamanoHojas($numeroHojas){

		for ($i=0;$i<$numeroHojas;$i++){

			$this->totalTamanoHojas = $this->totalTamanoHojas + $this->arrayHojas[$i];
			
		}

		return $this->totalTamanoHojas;
	}



	public function inicializarArrayHojas($numeroHojas){
		for ($i = 0; $i <$numeroHojas;$i++){
			$this->arrayHojas[$i] = 0.01;
		}
	}
}







?>
