<?php

/**
* 
*/
class ClassDato
{
	
	
	//datos de referencia uva
	public $referenciaLluviaUva;
	public $referenciaTemperaturaUva;
	public $porcentajeCrecimientoLluviaUva;
	
	//datos de referencia hoja
	public $referenciaLluviaHoja;
	public $referenciaTemperaturaHoja;
	public $porcentajeCrecimientoLluviaHoja;
	

	//datos de referencia hongo
	public $referenciaLluviaHongo;
	public $referenciaTemperaturaHongo;
	public $porcentajeCrecimientoLluviaHongo;
	


	public function __construct()
	{
		/*
		$this->crecimientoUva = $uva;
		$this->crecimientoHongo = $hongo;
		$this->crecimientoHoja = $hoja;
	
	
		*/
	}


	//datos de referencia uva
	public function getReferenciaLluviaUva(){
		return $this->referenciaLluviaUva;
	}

	public function setReferenciaLluviaUva($ref){
		$this->referenciaLluviaUva = $ref;
	}


	public function getReferenciaTemperaturaUva(){
		return $this->referenciaTemperaturaUva;
	}

	public function setReferenciaTemperaturaUva($ref){
		$this->referenciaTemperaturaUva = $ref;
	}

	public function getPorcentajeCrecimientoUva(){
		return $this->porcentajeCrecimientoLluviaUva;
	}

	public function setPorcentajeCrecimientoUva($ref){
		$this->porcentajeCrecimientoLluviaUva = $ref;
	}



//datos de referencia hoja
	public function getReferenciaLluviaHoja(){
		return $this->referenciaLluviaHoja;
	}

	public function setReferenciaLluviaHoja($ref){
		$this->referenciaLluviaHoja = $ref;
	}


	public function getReferenciaTemperaturaHoja(){
		return $this->referenciaTemperaturaHoja;
	}

	public function setReferenciaTemperaturaHoja($ref){
		$this->referenciaTemperaturaHoja = $ref;
	}

	public function getPorcentajeCrecimientoHoja(){
		return $this->porcentajeCrecimientoLluviaHoja;
	}

	public function setPorcentajeCrecimientoHoja($ref){
		$this->porcentajeCrecimientoLluviaHoja = $ref;
	}


//datos de referencia hongo
	public function getReferenciaLluviaHongo(){
		return $this->referenciaLluviaHongo;
	}

	public function setReferenciaLluviaHongo($ref){
		$this->referenciaLluviaHongo = $ref;
	}


	public function getReferenciaTemperaturaHongo(){
		return $this->referenciaTemperaturaHongo;
	}

	public function setReferenciaTemperaturaHongo($ref){
		$this->referenciaTemperaturaHongo = $ref;
	}

	public function getPorcentajeCrecimientoHongo(){
		return $this->porcentajeCrecimientoLluviaHongo;
	}

	public function setPorcentajeCrecimientoHongo($ref){
		$this->porcentajeCrecimientoLluviaHongo = $ref;
	}










}


?>