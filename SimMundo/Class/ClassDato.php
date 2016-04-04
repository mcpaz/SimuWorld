<?php

/**
* 
*/



class ClassDato  
{
	
	public $numeroCepas; // numero de cepass que se quiere que se simule
	public $numeroSimulaciones; // numero de veces a simular
    
    public $mesCrecimiento;
    public $fechaInicio;
    public $fechaFin; 

	//datos de referencia uva
	public $referenciaLluviaUva;
	public $referenciaTemperaturaUva;
	public $porcentajeCrecimientoLluviaUva;
	public $pesoMedioCepa;
	
	//datos de referencia hoja
	public $referenciaLluviaHoja;
	public $referenciaTemperaturaHoja;
	public $porcentajeCrecimientoLluviaHoja;
	public $numeroHojas;

	

	//datos de referencia hongo
	public $referenciaLluviaHongo;
	public $referenciaTemperaturaHongo;
	public $referenciaHumedadHongo;
	public $porcentajeCrecimientoLluviaHongo;
	public $porcentajeProbabilidadHumedadHongo;




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


	public function getNumeroHojas(){
    	return $this->numeroHojas;
    }

    public function setNumeroHojas($num){
    	$this->numeroHojas = $num;
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


	public function getReferenciaHumedadHongo(){
		return $this->referenciaHumedadHongo;
	}

	public function setReferenciaHumedadHongo($ref){
		$this->referenciaHumedadHongo = $ref;
	}


	public function setPorcentajeProbabilidadHumedadHongo($ref){
    	$this->porcentajeProbabilidadHumedadHongo = $ref;
    }


    public function getPorcentajeProbabilidadHumedadHongo(){
    	return $this->porcentajeProbabilidadHumedadHongo;
    }

	//metodos para la cantidad de cepas que se van simular

	public function getNumeroCepas(){
		return $this->numeroCepas;
	}

	public function setNumeroCepas($num){

		$this->numeroCepas = $num;
	}

	//metodos para el numero de veces que se va simular

	public function getNumeroSimulaciones(){
		return $this->numeroSimulaciones;
	}

	public function setNumeroSimulaciones($num){

		$this->numeroSimulaciones = $num;
	}
    
    
    //guardo el mes en que va empezar el crecimiento de la uva
    
    public function getFechaInicio(){
        return $this->fechaInicio;
    }
    
    
    public function getFechaFin(){
        return $this->fechaFin;
    }
    
    //funcion para recoger las fechas quie vienen juntas como un string y hay que separlas
    public function cortarFechasRango($fec){
       
       $fecha = explode("-",$fec);
       $this->fechaInicio = str_replace('/','-',$fecha[0]);
       $this->fechaFin =str_replace('/','-',$fecha[1]);       
       
    }



    public  function setPesoMedioCepa($peso){
		$this->pesoMedioCepa = $peso;

	}


	public  function getPesoMedioCepa(){
		return $this->pesoMedioCepa;

	}

    
    
//fin de la clase    
}


?>