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
	private $pesoRacimo = 10;//peso en gramos

	private $tenerHongo; //guarda si tiene o no hongo
	private $fechaSulfatado;


	public $claseMundo ;


	public function __construct(&$objeto)
    {
        $this->claseMundo =&$objeto;
    } 

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


	public function calCrecPesoRacimo(){
		//aproximacion
		//si por 7 numeros hojas que tiene el racimo
		//voy suponer que cada racimo crece un % y pista
		//de claseMundos que si temperatura 20 crece 0.01 de su peso actual
		//y el resto pues regla de tres(ajjaja)
		//SUGERENCIA !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! CREAR UNA CLASE DATOS PARA 
		//ALAMACENAR TODOS ESTES TIPOS DE DATOS PARA SU FACIL MODIFICAION
		


	}



}







?>
