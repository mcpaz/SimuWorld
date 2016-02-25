
<?php

include ("ClassEnfermedad.php");
include ("ClassPaisano.php");
include ("ClassFichero.php");
include ("ClassDato.php");
include ("ClassCepa.php");







class ClassMundo 
{
   
	public $temperaturaMedia;
	public $lluviaMedia; //cantidad de lluvia  que cae 
	public $humedadMedia;
	public $fechaActual;

    public $totalPesoUva; //variablepara guardar el total del crecimiento de la uva en peso por iteracion
    public $totalPesoUvaPorDia; //variablepara guardar el total del crecimiento de la uva por dia de peso por dia en casda iteracion
    

	public $tipoTierra; // tipo de tierra que es determiante en la produccion y calidad del vino
					  // por si queremos meter tambien este tipo de variable.
	public $phTierra;
	public $sulfato;//guarda si el paisano ha sulfatado o no.
	public $velocidadViento;//puede influir en la expansion del hongo


	public $infectarCepa = 0; // recibe si el hongo infecta o no a la cepa desde la funcion 
							//getInfeccionHongo() de la clase hongo
	public $inicioCrecimeintoHongo;
	public $hongoCrecio = 0; // variable de control de la condicion de infectcion de cepa(de moment no la uso)


	//instancio las diferentes clases
	public $clasePaisano ;
	public $claseFichero;
	public $claseDato;
	public $claseEnfermedad;


	public $arrayPesoCepasPorDia;
	




	public $worldLog = "../../worldLog.txt";


	public function __construct()
    {
       /* $this->clasePaisano =&$pai;
        $this->claseFichero = &$fic;
        $this->claseDato = &$dato;
        $this->claseEnfermedad = &$hongo;
        $this->cabeceraLog();*/

    } 


    public function guardarClaseDato(&$dato){
    	$this->claseDato = &$dato;
    }

    public function getClaseDato(){
    	return $this->claseDato;
    }

    public function guardarClaseFichero(&$dato){
    	$this->claseFichero = &$dato;
    }

    public function getClaseFichero(){
    	return $this->claseFichero;
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


	public function getHumedadMediaFichero($linea){	
		
		$this->humedadMedia= $this->claseFichero->getHumedadMedia($linea);

		return $this->humedadMedia;		
	}


	//segundo getLLuvia k implemento pero sin parametro apra la classEnfermedad o para la que haga falta
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

	public function getSulfatado(){
		
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


	public function getNumeroCepas(){
		return $this->claseDato->getNumeroCepas();
	}

	public function getNumeroSimulaciones(){
		return $this->claseDato->getNumeroSimulaciones();
	}


	public function cabeceraLog(){
		$periodoInicial =  $this->claseFichero->getPeriodoInicial();
		$periodoFin = $this->claseFichero->getPeriodoFin();
		file_put_contents($this->worldLog, "Perido: " .date_format($periodoInicial, 'd-m-Y')." - ".date_format($periodoFin, 'd-m-Y')."\n", FILE_APPEND | LOCK_EX);
		file_put_contents($this->worldLog, "-------------------------------------------" ."\n", FILE_APPEND | LOCK_EX);
		
	}

	public function guardarLog ($fecha,$humedad,$lluvia,$temperatura,$pesoUva,$tamanoHoja,$infectar,$tamanhoHongo){

		// Escribir los contenidos en el fichero,
		// usando la bandera FILE_APPEND para añadir el contenido al final del fichero
		// y la bandera LOCK_EX para evitar que cualquiera escriba en el fichero al mismo tiempo
		file_put_contents($this->worldLog, "Fecha: " .$fecha."\n", FILE_APPEND | LOCK_EX);
		file_put_contents($this->worldLog, "Humedad media por dia: " .$humedad."\n", FILE_APPEND | LOCK_EX);
		file_put_contents($this->worldLog, "Lluvia media por dia: " .$lluvia."\n", FILE_APPEND | LOCK_EX);
		file_put_contents($this->worldLog, "Temperatura media por dia: " .$temperatura."\n", FILE_APPEND | LOCK_EX);
		file_put_contents($this->worldLog, "peso de la uva: " .$pesoUva."\n", FILE_APPEND | LOCK_EX);
		file_put_contents($this->worldLog, "tamano de la hoja: " .$tamanoHoja."\n", FILE_APPEND | LOCK_EX);
		file_put_contents($this->worldLog, "Infeccion: " .$infectar."\n", FILE_APPEND | LOCK_EX);
		file_put_contents($this->worldLog, "Tamano hongo: " .$tamanhoHongo."\n", FILE_APPEND | LOCK_EX);

		file_put_contents($this->worldLog, "-------------------------------------------" ."\n", FILE_APPEND | LOCK_EX);

	}

	//para separa en el log entre cada dia que pasa
	public function guardarLogSeparador (){

		file_put_contents($this->worldLog, "################################################" ."\n", FILE_APPEND | LOCK_EX);

	}

	
	public function getPeriodoFichero(){
		 $periodo= (int)$this->claseFichero->getPeriodo();
		 return $periodo;
	}

	public function calcularTamanoTotalTodasCepas($arrayCepas){//tamano es peso, esto decuelve el peso total de todas las cepas instanciadas


		for ($i=0; $i < sizeof($arrayCepas); $i++) { 

			$this->totalPesoUva=$this->totalPesoUva +  $arrayCepas[$i]->getPesoRacimo();
		}

		return $this->totalPesoUva;

	}


	public function calcularTamanoTotalTodasCepasPorDia($arrayCepas){//tamano es peso, esto decuelve el peso total de todas las cepas instanciadas por cada dia


		for ($i=0; $i < sizeof($arrayCepas); $i++) { 

			$this->totalPesoUvaPorDia=$this->totalPesoUvaPorDia +  $arrayCepas[$i]->getPesoRacimo();
		}
		return $this->totalPesoUvaPorDia;

	}
    
    
    public function getFechaIniCrecimiento(){
        return $this->claseDato->getFechaInicio();
    }

    
    public function getFechaFinCrecimiento(){
        return $this->claseDato->getFechaFin();
    }


	public function mainWorld(){


		$this->cabeceraLog();

        $fechaInicialCrecimiento = $this->getFechaIniCrecimiento();
        $fechaFinCrecimiento = $this->getFechaFinCrecimiento();

		$numCepas = $this->getNumeroCepas();
        $numeroSimulaciones = $this->getNumeroSimulaciones();

		$arrayCepas = array();		
        $arrayPesoCepasTotal = array();

		$refLluviaUva = $this->getReferenciaLluviaUva();
  		$refTemperaturaUva = $this->getReferenciaTemperaturaUva();
  		$porcentajeCreUva = $this->getPorcentajeCrecimientoUva();

  		$refLluviaHoja = $this->getReferenciaLluviaHoja();
  		$refTemperaturaHoja= $this->getReferenciaTemperaturaHoja();
  		$porcentajeCreHoja = $this->getPorcentajeCrecimientoHoja();

  		$refLluviaHongo = $this->getReferenciaLluviaHongo();
  		$refTemperaturaHongo = $this->getReferenciaTemperaturaHongo();
  		$porcentajeCreHongo = $this->getPorcentajeCrecimientoHongo();

  		 

		$contador = 0;//2ª variable de control para que no este siempre calculando si infeta o no

		/*while($i!=$periodo+24){
    $i=24;
      //$fecha = $mundo->getFechaActual($i+1870-25);
      $lluvia = $mundo->getLluviaMediaFichero($i+1870-25);
      $temperatura = $mundo->getTemperaturaMediaFichero($i);*/



        for($z=0;$z <  $numeroSimulaciones; $z++ ){
            //inicializo las cepas
            for ($ii=0; $ii < $numCepas; $ii++) { 
                $arrayCepas[$ii] = new ClassCepa;
                $arrayEnfermedades[$ii] = new ClassEnfermedad;
            }
            
  
            //DUDADAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
            //CUANTEAS VECES TNEGO QUE CALCULAR SI SE INFECTA O NO LA CEPA?
            //PORQUE SI CALCULO DE CADA VEZ AL FINAL ES MUY POSIBLE QUE TODAS LAS CEPAS ACABEN INFECTADAS
            for ($i=24,$k=0; $i < $this->getPeriodoFichero() + 24 ; $i++,$k++) { 
                
                
                $tamanhoHongo = 0; //tamano inicila del hongo en mi vatiable local deste metodo
                
                $temperatura = $this->getTemperaturaMediaFichero($i);
                $humedad = $this->gethumedadMediaFichero($i+640-25);
                $lluvia = $this->getLluviaMediaFichero($i+1870-25);

                $fechaFicheroActual = $this->getFechaActual($i);//cojo la fecha que viene del fichero de datos climaticos
                          
              
                /*echo "<br> Fecha1: " . $fecha ;
                echo "<br> lluvia:  " . $lluvia ;
                echo "<br> temperatura:  " . $temperatura ;
                echo "<br> humedad:  " . $humedad ;

                */
        
                //GUARDO LOS DATOS EN SESION DE ARRAY PAR LUEGO PASARLOS AL JAVASCRIPT
                //QUE CREA LAS GRAFICAS
                $_SESSION["temperatura"][$k] = $temperatura;
                $_SESSION["lluvia"][$k]= $lluvia;
                $_SESSION["humedad"][$k] = $humedad;

                $fechaFicheroActual = date_create($fechaFicheroActual);
                $fechaInicialCrecimiento = date_create($fechaInicialCrecimiento);
                
                
                print_r($fechaFicheroActual);
                                
                print_r($fechaInicialCrecimiento);
                if ($fechaFicheroActual > $fechaInicialCrecimiento){
                    echo "mierda";
                }
                die();
            
                if($fechaFicheroActual > $fechaInicialCrecimiento && $fechaFicheroActual < $fechaFinCrecimiento ){
                    echo "si";
                    for ($j =0; $j  < $numCepas; $j ++) { 
                        $pesoUva = $arrayCepas[$j]->calCrecPesoRacimo($lluvia,$temperatura,$refLluviaUva,$refTemperaturaUva,$porcentajeCreUva);
                        
                        //echo "<br>peso uva:" .$arrayCepas[$j]->calCrecPesoRacimo($lluvia,$temperatura,$refLluviaUva,$refTemperaturaUva,$porcentajeCreUva);
                        $tamanoHoja = $arrayCepas[$j]->calCrecimientoHoja($lluvia,$temperatura,$refLluviaHoja,$refTemperaturaHoja,$porcentajeCreHoja);
                        //echo "<br>tamaño de hoja:" .$arrayCepas[$j]->calCrecimientoHoja($lluvia,$temperatura,$refLluviaHoja,$refTemperaturaHoja,$porcentajeCreHoja);
                        
                        //mientras esto sea 0 es que no hay condiciones optimas para que crezca el hongo
                        //y entonces se calcula su probabilidad pasandole la humedad para ver si se puede desarrolar o no
                        if($arrayEnfermedades[$j]->getInicioCrecimientoHongo() == 0){					
                            $arrayEnfermedades[$j]->calcularProbabilidadInfectar($humedad);
                        }

                        //aqui ya es optimo xk es igual 1 entonces se el hongo se pone a infectar a la cepa
                        if($arrayEnfermedades[$j]->getInicioCrecimientoHongo() == 1){
                            if($contador < $numCepas ){
                                $infectar = $arrayEnfermedades[$j]->getInfectarCepa();
                                //echo "<br>esta infectado: ". $infectar;
                                $arrayCepas[$j]->setTenerHongo($infectar);
                                //echo "<br>esta infectado desde cepa: " . $arrayCepas[$j]->getTenerHongo();
                                $contador++;
                            }
                        }else{
                            $infectar = -1;
                        }

                        //esta condicion me sirve para calcular solo el crecimiento de hongo de solo aquellas cepas
                        // que han sido infectadas
                        if($arrayCepas[$j]->getTenerHongo() == 1){
                            $tamanhoHongo = $arrayEnfermedades[$j]->calcularCrecimientoHongo($lluvia,$temperatura,$refLluviaHongo,$refTemperaturaHongo,$porcentajeCreHongo);
                            //echo "<br>Tamanho del hongo:" . $tamanhoHongo;
                        }else{
                            $tamanhoHongo = 0;
                        }
                        //guardar los datos en e LOG
                        $this->guardarLog($fecha,$humedad,$lluvia,$temperatura,$pesoUva,$tamanoHoja, $infectar,$tamanhoHongo);

                        //calculo el peso de la cepas por dia y los meto en un array solo si el numero de simualciones es inferios a 2
                        if($numeroSimulaciones >1){
                            
                            $arrayPesoCepasPorDia[$j] = $this->calcularTamanoTotalTodasCepasPorDia($arrayCepas);  
                            
                        }
                        
                    //fin fbucle numCepas
                    }

                $this->guardarLogSeparador();
                //fin de la condicion de fechas
                }else {
                    echo "no";
                }
                   
            //fin de bucle de periodo	
            }
          
          //hago esto porque asi guardo eltotal por cada iteracion
          $arrayPesoCepasTotal[$z] = $this->calcularTamanoTotalTodasCepas($arrayCepas);
          $this->totalPesoUva = 0; //hay que volver inicializarla a 0 para que no acumule los valores
          
        //fin bucle numeroSimulaciones
        }
		
	}




//fin
}
?>
