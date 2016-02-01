<?php




class ClassEnfermedad{

	//varialbe que recoje del mundo
	public $temperatura;
	public $lluvia; //cantidad de lluvia  que cae 
	public $humedad; 
	public $tipoTierra; // tipo de tierra que es determiante en la produccion y calidad del vino
					  // por si queremos meter tambien este tipo de variable.
	public $phTierra;
	public $sulfato;//guarda si el paisano ha sulfatado o no.
	
	private $fechaSulfatado;

	public $expansion;
	public $crecimiento;

	public $probabilidadInfeccion;
	

	public $tamanoHongo = 1;//un valor inicial por darle uno
	public $crecioHongo = 0;//hay que tener en cuenta esta variable para ver si crcio o no elhongo
		// ya que una vez que crezca por las codiciones optimas puede seguir creciendo aunque estas no 
		//sean tan buenas.


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


	public function getTamanhoHongo(){
		return $this->tamanoHongo;
	}
	//getters especificos de cepa

	

	public function getHongo(){
		return $this->hongo;		
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

	public function setHongo($i){
		$this->hongo=$i;		
	}




	//metodos de crecimento


	public function setFechaSulfatado(){
		//$this->sulfato = $this->claseMundo->getSulfate();
	}


	public function calcularExpansion(){
		//toDo
	
	}
	


	public function getProbabilidadInfeccion()
	{
		return $this->probabilidadInfeccion;
	}


	public function setProbabilidadInfeccion($prob)
	{
		$this->probabilidadInfeccion = $prob;
	}


	//calcula si infeccta o no a una cepa
	public function infecctarCepa(){
		$aleatorio=rand(0,100);
		if ($aleatorio > 70) echo 'alta calidad'; //dando un 30% de probabilidad de escoger alta calidad
		else if ($aleatorio >50) echo 'media calidad'; //dando un 20% de probabilidad de escoger media calidad 
		        else echo 'mala calidad'; //dando un 50% de probabilidad de escoger mala calidad  
	}




	public function calcularCrecimientoHongo(){
		
		$referenciaLluviaHongo= $this->claseMundo->getReferenciaLluviaHongo();
		$referenciaTemperaturaHongo= $this->claseMundo->getReferenciaTemperaturaHongo();
		$porcentajeCrecimientoHongo = $this->claseMundo->getPorcentajeCrecimientoHongo();

		//esto es simplemente una regla de tres compuesta.


		/*echo "ref lluvia: " . $referenciaLluviaHongo;
		echo "ref tempe: " . $referenciaTemperaturaHongo;
		echo "porcentaje: " . $porcentajeCrecimientoHongo;
		echo "lluvia media: " .$this->claseMundo->getLluviaMedia();
		echo "temp media: " .$this->claseMundo->getTemperaturaMedia();
		echo "aumento total: " . $aumentoHongoTotal;
		echo "<br> tamano de hongo: " . $this->tamanoHongo;*/

		//ejemplo de en que momento puede crecer un hongo
		if($this->claseMundo->getLluviaMedia() > 10 || $this->claseMundo->getTemperaturaMedia() > 10){
			$this->crecioHongo = 1;
		}

		if ($this->crecioHongo == 1){
			$aumentoHongoTotal = ($this->claseMundo->getLluviaMedia()*$this->claseMundo->getTemperaturaMedia()*$porcentajeCrecimientoHongo)/($referenciaLluviaHongo*$referenciaTemperaturaHongo);
			$this->tamanoHongo = $this->tamanoHongo + $aumentoHongoTotal;
		}

		
	}
}
?>
