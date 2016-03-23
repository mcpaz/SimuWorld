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

	public $probabilidadInfeccionCepa = 0.0;
	
	public $aumentoHongo = 0; //variable para pasar la cantidad que crece el hongo , par no solo pasar el total
	public $porcentajeTamanhoHongo = 0.1;//un valor inicial por darle uno
	public $inicioCrecimientoHongo = 0;//hay que tener en cuenta esta variable para ver si crcio o no elhongo
		// ya que una vez que crezca por las codiciones optimas puede seguir creciendo aunque estas no 
		//sean tan buenas.


	public $claseMundo ;

	/*public function __construct(&$objeto)
    {
        $this->claseMundo =&$objeto;

    } */

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



	public function getPorcentajeTamanhoHongo(){
		return $this->porcentajeTamanhoHongo;
	}

	//se hace este set para cuando se aplica el sulfato
	public function setPorcentajeTamanhoHongo($tam){
		$this->porcentajeTamanhoHongo = $tam;
	}

//esta funcion aa no me sirve porq con getPorcentajeTamanhoHongo ya hago return del porcenaje que va crecer el hongo
	// ya lo tratoen el metodo de cepa para restarele ese porcentaje
	/*public function getAumentoHongo(){
		return $this->aumentoHongo;
	}
	*/

	

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
		return $this->probabilidadInfeccionCepa;
	}


	public function setProbabilidadInfeccion($prob)
	{
		$this->probabilidadInfeccionCepa = $prob;
	}


	//calcula si infeccta o no a una cepa
	//REVISAR LO DE LA PROBABILIDAD
	//ME REFIERO AL IF PARA VERIFICAR QUE FUNCIONA BINE ASI
	public function getInfectarCepa(){

		$aleatorio=rand(0,100);

		$prob = $this->probabilidadInfeccionCepa * 100;

		if ($aleatorio < $prob){
			return 1; //1  esta infectado
		}
		else 
		{
			return 0; //0 no esta infectado

		}  
		 
	}

	//guarda si empieza o no el crecimeinto del hongo
	public function getInicioCrecimientoHongo(){
		return $this->inicioCrecimientoHongo;
	}

	public function setInicioCrecimientoHongo($dato){
		$this->inicioCrecimientoHongo = $dato;
	}


	public function calcularProbabilidadInfectar($humedad,$refHumedad,$refProbHumedad){
		if($humedad >= $refHumedad){
			//TOMO LA LLUVIA HUMEDAD COMO DETONANTE DEL CRECIEMIENTO DEL HONGO
			//preguntar ¿?
			//voy tomar como a partir de 70 la probabilidad de infectar es de 0.3, y asi hago regla de 3
			//$this->probabilidadInfeccionCepa = 0.4; // tomo como ejemplo 0.4 de probavilidad cuando empieza a crecer ppr estas condiciones
			//EN CASO DE ESTAR BIEN ESTO ACORDARSE DE PARAMETRIZAR

			/*echo "humedad: " . $humedad;
			echo "<br>";
			echo "refProbHumedad: " . $refProbHumedad;
			echo "<br>";
			echo "refHumedad: " . $refHumedad;
			echo "<br>";
			echo "calculo: " . ($humedad*$refProbHumedad)/$refHumedad;*/
			//esto esta bien ----> parametrizar
			$this->probabilidadInfeccionCepa = ($humedad*$refProbHumedad)/$refHumedad;
			
			$this->inicioCrecimientoHongo = 1;
		}
	}

	public function calcularCrecimientoHongo($lluvia,$temperatura,$refLluvia,$refTemp,$crecimiento){
		

		if($lluvia == 0){
			$lluvia = $lluvia + 0.01;
		}


		if($temperatura == 0){
			$temperatura = $temperatura + 0.01;
		}
		

		$referenciaLluviaHongo = $refLluvia; 
		$referenciaTemperaturaHongo = $refTemp;
		$porcentajeCrecimientoHongo = $crecimiento;

		
		$this->porcentajeTamanhoHongo = ($lluvia*$temperatura*$porcentajeCrecimientoHongo)/($referenciaLluviaHongo*$referenciaTemperaturaHongo);		


		
		//voy pasar el porcentaje de crecimeinto del hongo y no wel tamaho como antes
		//es mas dejo de calcularel tamaño de hongo xk no me vale apra nada
		//y paso a comtemplar el total de uva perdida
		return $this->porcentajeTamanhoHongo;

	}

//fin
}
?>
