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
	private $numerohojas = 7;//lo tomo como ejemplo desde el principio despues del deshoje
	private $tamanoHojas;
	private $numRacimos;
	private $pesoRacimo = 0.1;

	private $tenerHongo = 0; //guarda si tiene o no hongo
	private $fechaSulfatado;


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



	//metodo apra restarle al peso del racimo de la uva el tamanho del hongo

	public function restarTamanoHongoPesoUva($tamanhoHongo){

		$this->pesoRacimo = $this->pesoRacimo - $tamanhoHongo;
	}



	//funciones para calcular el crecimiento tanto de la hoja como del peso de la uva

	public function calCrecPesoRacimo($lluvia,$temperatura,$refLluvia,$refTemp,$crecimiento){
		

		if($lluvia == 0){
			$lluvia = $lluvia + 0.01;
		}


		if($temperatura == 0){
			$temperatura = $temperatura + 0.01;
		}



		$referenciaLluviaUva = $refLluvia;
		$referenciaTemperaturaUva = $refTemp;
		$porcentajeCrecimientoUva = $crecimiento;
		
		$aumento = ($lluvia*$temperatura*$porcentajeCrecimientoUva)/($referenciaLluviaUva*$referenciaTemperaturaUva);
		
		//sumo al peso del racimo que hay lo que aumenta
		$this->pesoRacimo = $this->pesoRacimo + $aumento;
		//voy decir que este crecimeinto realmente es el aumento de peso de la uva(racimo)
		return $this->pesoRacimo;

	}


	public function calCrecimientoHoja($lluvia,$temperatura,$refLluvia,$refTemp,$crecimiento){
		if($lluvia == 0){
			$lluvia = $lluvia + 0.01;
		}


		if($temperatura == 0){
			$temperatura = $temperatura + 0.01;
		}



		$referenciaLluviaUva = $refLluvia;
		$referenciaTemperaturaUva = $refTemp;
		$porcentajeCrecimientoUva = $crecimiento;
		
		$aumento = ($lluvia*$temperatura*$porcentajeCrecimientoUva)/($referenciaLluviaUva*$referenciaTemperaturaUva);

		//sumo al peso del racimo que hay lo que aumenta
		$this->tamanoHojas = $this->tamanoHojas + $aumento;
		//voy decir que este crecimeinto realmente es el aumento de peso de la uva(racimo)
		return $this->tamanoHojas;
	}



}







?>
