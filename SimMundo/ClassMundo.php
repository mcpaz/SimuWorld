
<?php
class ClassMundo
{
   
	public $temperaturaMedia;
	public $lluviaMedia; //cantidad de lluvia  que cae 
	public $fechaActual;



	public $humedad; 
	public $tipoTierra; // tipo de tierra que es determiante en la produccion y calidad del vino
					  // por si queremos meter tambien este tipo de variable.
	public $phTierra;
	public $sulfato;//guarda si el paisano ha sulfatado o no.
	public $velocidadViento;//puede influir en la expansion del hongo


	//instancio las diferentes clases
	public $clasePaisano ;
	public $claseFichero;
	public $claseDato;


	public $worldLog = "worldLog.txt";



	


	public function __construct(&$pai,&$fic,&$dato)
    {
        $this->clasePaisano =&$pai;
        $this->claseFichero = &$fic;
        $this->claseDato = &$dato;
       

    } 

	public function getTemperaturaMediaFichero($linea){	
		
		$this->temperaturaMedia= $this->claseFichero->getTemperaturaMedia($linea);

		return $this->temperaturaMedia;		
	}

	//este getLluvia saca el valo desde el fichero
	public function getLluviaMediaFichero($linea){
		$this->lluviaMedia = $this->claseFichero->getLluviaMedia($linea);

		return $this->lluviaMedia;		
	}


	//segundo getLLuvia k implemento pero sin parametro apra la classEnfermedad
	//ya que saca el valor de la classMundo

	public function getLluviaMedia(){


		return $this->lluviaMedia;		
	}


	//segundo getTemperaturaMedia k implemento pero sin parametro apra la classEnfermedad
	//ya que saca el valor de la classMundo

	public function getTemperaturaMedia(){	


		return $this->temperaturaMedia;		
	}


	public function getFechaActual($linea){
		$this->fechaActual = $this->claseFichero->getFechaActual($linea);
		
		return $this->fechaActual;
	}

	public function gethumedad(){
		return $this->humedad;		
	}


	public function getPhTierra(){
		return $this->phTierra;		
	}

	public function getSulfate(){
		
		return $this->clasePaisano->getSulfatar();		
	}

	public function getVelocidadViento(){
		return $this->velocidadViento;		
	}


	//setters

	public function setTemperaturaMedia($t){
		$this->temperaturaMedia = $t;		
	}

	public function setLluviaMedia($l){
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

	public function setVelocidadViento($v){
		$this->velocidadViento = $v;		
	}


	//getters y setters de los datos de la clase ClassDato.

	//uva
	public function getReferenciaLluviaUva(){
		return $this->claseDato->getReferenciaLluviaUva();
	}

	public function getReferenciaTemperaturaUva(){
		return $this->claseDato->getReferenciaTemperaturaUva();
	}

	public function getPorcentajeCrecimientoUva(){
		return $this->claseDato->getPorcentajeCrecimientoUva();
	}

	//hoja
	public function getReferenciaLluviaHoja(){
		return $this->claseDato->getReferenciaLluviaHoja();
	}

	public function getReferenciaTemperaturaHoja(){
		return $this->claseDato->getReferenciaTemperaturaHoja();
	}

	public function getPorcentajeCrecimientoHoja(){
		return $this->claseDato->getPorcentajeCrecimientoHoja();
	}

	//hongo

	public function getReferenciaLluviaHongo(){
		return $this->claseDato->getReferenciaLluviaHongo();
	}

	public function getReferenciaTemperaturaHongo(){
		return $this->claseDato->getReferenciaTemperaturaHongo();
	}

	public function getPorcentajeCrecimientoHongo(){
		return $this->claseDato->getPorcentajeCrecimientoHongo();
	}




	public function guardarLog ($fecha,$lluvia,$tamanhoHongo){
		// Escribir los contenidos en el fichero,
		// usando la bandera FILE_APPEND para añadir el contenido al final del fichero
		// y la bandera LOCK_EX para evitar que cualquiera escriba en el fichero al mismo tiempo
		file_put_contents($this->worldLog, "Fecha: " .$fecha."\n", FILE_APPEND | LOCK_EX);
		file_put_contents($this->worldLog, "lluvia media por dia: " .$lluvia."\n", FILE_APPEND | LOCK_EX);
		file_put_contents($this->worldLog, "Tamanho de hongo: " .$tamanhoHongo."\n", FILE_APPEND | LOCK_EX);

		file_put_contents($this->worldLog, "-------------------------------------------" ."\n", FILE_APPEND | LOCK_EX);

	}






}
?>
