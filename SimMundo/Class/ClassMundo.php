
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

    public $totalPesoUva = 0; //variablepara guardar el total del crecimiento de la uva en peso por iteracion
    public $totalPesoUvaPerdido= 0;
    public $totalTamanoTotalHoja= 0;

    public $totalPesoUvaPorDia = 0; //variablepara guardar el total del crecimiento de la uva por dia de peso por dia en casda iteracion
    public $totalPesoUvaPorDiaPerdido = 0;
    public $totalTamanoTotalHojaPorDia = 0;

    

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



    public function guardarClasePaisano(&$paisano){
    	$this->clasePaisano = &$paisano;
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


	public function getReferenciaHumedadHongo(){
		return $this->claseDato->getReferenciaHumedadHongo();
	}

	public function getPorcentajeCrecimientoHongo(){
		return $this->claseDato->getPorcentajeCrecimientoHongo();
	}


	public function getPorcentajeProbabilidadHumedadHongo(){
		return $this->claseDato->getPorcentajeProbabilidadHumedadHongo();
	}


	public function getNumeroCepas(){
		return $this->claseDato->getNumeroCepas();
	}

	public function getNumeroSimulaciones(){
		return $this->claseDato->getNumeroSimulaciones();
	}


	public function getNumeroHojas(){
		return $this->claseDato->getNumeroHojas();
	}


	public function getPesoMedioCepa(){
		return $this->claseDato->getPesoMedioCepa();
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


	public function calcularTamanoTotalTodasCepasPerdido($arrayCepas){//tamano es peso, esto decuelve el peso total de todas las cepas instanciadas


		for ($i=0; $i < sizeof($arrayCepas); $i++) { 

			$this->totalPesoUvaPerdido=$this->totalPesoUvaPerdido +  $arrayCepas[$i]->getPesoPesoPerdido();
		}

		return $this->totalPesoUvaPerdido;

	}


	public function calcularTamanoTotalTodasCepasPorDia($arrayCepas){//tamano es peso, esto decuelve el peso total de todas las cepas instanciadas por cada dia


		for ($i=0; $i < sizeof($arrayCepas); $i++) { 

			$this->totalPesoUvaPorDia=$this->totalPesoUvaPorDia +  $arrayCepas[$i]->getPesoRacimo();
		}

		return $this->totalPesoUvaPorDia;

	}


	public function calcularTamanoTotalTodasCepasPorDiaPerdido($arrayCepas){//tamano es peso, esto decuelve el peso total de todas las cepas instanciadas por cada dia


		for ($i=0; $i < sizeof($arrayCepas); $i++) { 

			$this->totalPesoUvaPorDiaPerdido=$this->totalPesoUvaPorDiaPerdido +  $arrayCepas[$i]->getPesoPesoPerdido();
		}
		return $this->totalPesoUvaPorDiaPerdido;

	}



	/*public function calcularTotalTamanoHongo($arrayEnfermedades){


		for ($i=0; $i < sizeof($arrayEnfermedades); $i++) { 

			$this->totalTamanoTotalHongo=$this->totalTamanoTotalHongo +  $arrayEnfermedades[$i]->getPorcentajeTamanhoHongo();

		}

		return $this->totalTamanoTotalHongo;

	}*/


		public function calcularTotalTamanoHojasPorDia($arrayCepas,$numeroHojas){


		for ($i=0; $i < sizeof($arrayCepas); $i++) { 

			$this->totalTamanoTotalHojaPorDia = $this->totalTamanoTotalHojaPorDia +  $arrayCepas[$i]->calcularTotalTamanoHojas($numeroHojas);

		}
		
		return $this->totalTamanoTotalHojaPorDia;

	}
    
    
    public function getFechaIniCrecimiento(){
        return $this->claseDato->getFechaInicio();
    }

    
    public function getFechaFinCrecimiento(){
        return $this->claseDato->getFechaFin();
    }


	public function mainWorld(){


		$this->cabeceraLog();

         //recojo los fechas de crecimiento de la cepa que viene de claseDato
        $fechaInicialCrecimiento = date_create($this->getFechaIniCrecimiento());
        $fechaFinCrecimiento = date_create($this->getFechaFinCrecimiento());
	
		//$fechaInicialCrecimiento = new DateTime($this->getFechaIniCrecimiento());
		//$fechaFinCrecimiento =  new DateTime($this->getFechaFinCrecimiento());

		//fechas del pasiano apra el sulfato
        $arrayFechasSulfato = $this->clasePaisano->getFechasSulfato();
        $tiempoDuracionSulfato = $this->clasePaisano->getDuracionSulfato();
        $numeroSulfatos = $this->clasePaisano->getNumeroFechasSulfatos();


		$numCepas = $this->getNumeroCepas();

        $numeroSimulaciones = $this->getNumeroSimulaciones();
        //guardo en sesion tambien el numero de simulaciones porque me hace falta pra un bucle de carga de datos
        //en la venta de graficas
        $_SESSION["numeroSimulaciones"] = $numeroSimulaciones;

		$arrayCepas = array();		
        $arrayPesoCepasTotal = array();
        $arrayTamanoHongo = array();


        $lineaTemperatura = $this->claseFichero->getLineaTemperaturaMedia();
        $lineaLluvia = $this->claseFichero->getLineaLluviaMedia();
        $lineaHumedad = $this->claseFichero->getLineaHumedad();
        

		$refLluviaUva = $this->getReferenciaLluviaUva();
  		$refTemperaturaUva = $this->getReferenciaTemperaturaUva();
  		$porcentajeCreUva = $this->getPorcentajeCrecimientoUva();
  		$pesoMedioCepa = $this->getPesoMedioCepa();

  		$refLluviaHoja = $this->getReferenciaLluviaHoja();
  		$refTemperaturaHoja= $this->getReferenciaTemperaturaHoja();
  		$porcentajeCreHoja = $this->getPorcentajeCrecimientoHoja();
  		$numeroHojas = $this->getNumeroHojas();


  		$refLluviaHongo = $this->getReferenciaLluviaHongo();
  		$refTemperaturaHongo = $this->getReferenciaTemperaturaHongo();
  		$refHumedadHongo = $this->getReferenciaHumedadHongo();
  		$porcentajeCreHongo = $this->getPorcentajeCrecimientoHongo();
  		$procentajeProbabilidadHumedad = $this->getPorcentajeProbabilidadHumedadHongo();


		$contFechaSulfato = 0;//variable apra controlar el array de las fechas de las veces que se echa el sulfato


        for($z=0;$z <  $numeroSimulaciones; $z++ ){//numeo de simulaciones
            //inicializo las cepas
            for ($ii=0; $ii < $numCepas; $ii++) { 
                $arrayCepas[$ii] = new ClassCepa;
                $arrayEnfermedades[$ii] = new ClassEnfermedad;
            }
            
  
  
            for ($i=0,$k=0; $i < $this->getPeriodoFichero(); $i++,$k++) { 
                
                
                $tamanhoHongo = 0; //tamano inicila del hongo en mi vatiable local deste metodo
                
                $temperatura = $this->getTemperaturaMediaFichero($i+$lineaTemperatura);
                $humedad = $this->gethumedadMediaFichero($i+$lineaHumedad);
                $lluvia = $this->getLluviaMediaFichero($i+ $lineaLluvia);
                $fechaLog = $this->getFechaActual($i); //esta asignacion para guardar la fecha en tipo string
                $fechaFicheroActual = date_create(str_replace("/", "-",$this->getFechaActual($i)));//cojo la fecha que viene del fichero de datos climaticos y la paso a date para poder comparalar con otra fecha

                //transformo la fecha para el javascript de las graficas
                $fechaLog = explode("/",$fechaLog);
                $fechaLog =  $fechaLog[2]."/". $fechaLog[1]."/". $fechaLog[0]; 
               

                //GUARDO LOS DATOS EN SESION DE ARRAY PAR LUEGO PASARLOS AL JAVASCRIPT
                //QUE CREA LAS GRAFICAS
                $_SESSION["temperatura"][$k] = $temperatura;
                $_SESSION["lluvia"][$k]= $lluvia;
                $_SESSION["humedad"][$k] = $humedad;
                $_SESSION["fechaFichero"][$k] = $fechaLog;


                if($fechaInicialCrecimiento <= $fechaFicheroActual && $fechaFinCrecimiento >= $fechaFicheroActual ){
           

                    

                    for ($j =0; $j  < $numCepas; $j ++) { 
                    	$tamanoHoja = $arrayCepas[$j]->calCrecimientoHoja($lluvia,$temperatura,$refLluviaHoja,$refTemperaturaHoja,$porcentajeCreHoja,$numeroHojas);
                        $pesoUva = $arrayCepas[$j]->calCrecPesoRacimo($lluvia,$temperatura,$refLluviaUva,$refTemperaturaUva,$porcentajeCreUva,$tamanoHoja);


                        //echo "<br>peso uva:" .$arrayCepas[$j]->calCrecPesoRacimo($lluvia,$temperatura,$refLluviaUva,$refTemperaturaUva,$porcentajeCreUva);
                        
                        //echo "<br>tamaño de hoja:" .$arrayCepas[$j]->calCrecimientoHoja($lluvia,$temperatura,$refLluviaHoja,$refTemperaturaHoja,$porcentajeCreHoja);
                        
                        //mientras esto sea 0 es que n[0],cadenaPartida[1],cadenaPartida[2]o hay condiciones optimas para que crezca el hongo
                        //y entonces se calcula su probabilidad pasandole la humedad para ver si se puede desarrolar o no

                        $fechaSulfatoIni = date_create(str_replace("/","-",$arrayFechasSulfato[$contFechaSulfato]));                    
	                    $fechaSulfatoFin = date_create(str_replace("/","-",$arrayFechasSulfato[$contFechaSulfato]));
					 	date_add($fechaSulfatoFin, date_interval_create_from_date_string( (string)$tiempoDuracionSulfato. 'days'));


						 //esta condicion sirve para controlar las diferentes fechas de las sulfatadas
						  //los dos primeros ifs podian ir junto pero los pongo por separado pro que se puede dar que la segunda condicion
						  //no se de porque la ultima sulfatada sumandole el efecto del sulfato exceda el rango donde crece la cepa
						  ///por eso lo hago por separado
                        if( $fechaSulfatoIni <= $fechaFicheroActual ){     
                 			$arrayEnfermedades[$j]->setPorcentajeTamanhoHongo(0);
	                        $arrayEnfermedades[$j]->setInicioCrecimientoHongo(0);
	                
                        	if(  $fechaSulfatoFin >= $fechaFicheroActual){

	                        	if($fechaSulfatoFin == $fechaFicheroActual){

	                        		if($contFechaSulfato < $numeroSulfatos -1 ){  

	                        			$contFechaSulfato++;   

	                        		} else{
	                        			$contFechaSulfato = 0; 
	                        		}                       		
	                        		                    
	                        	}
							}
                        	$infectar = -1;
                        }else{

                        	if($arrayEnfermedades[$j]->getInicioCrecimientoHongo() == 0){					

                            	$arrayEnfermedades[$j]->calcularProbabilidadInfectar($humedad,$refHumedadHongo,$procentajeProbabilidadHumedad);

                        	}
                        	
                 			//aqui ya es optimo porque es igual 1 entonces se el hongo se pone a infectar a la cepa
	                        if($arrayEnfermedades[$j]->getInicioCrecimientoHongo() == 1){

	                        	if( $arrayCepas[$j]->getTenerHongo() == 0 ){
	                            	//echo "<br>empieza la infeccion " . $j;

	                                $infectar = $arrayEnfermedades[$j]->getInfectarCepa();
	                                
	                                //echo "<br>esta infectado? : ". $infectar;
	                                $arrayCepas[$j]->setTenerHongo($infectar);
	                                //echo "<br>esta infectado desde cepa: " . $arrayCepas[$j]->getTenerHongo();
	                             
	                            }
	                        }else{
	                            $infectar = -1;//se hace para darle un valor y asi se registra un -1 como queno ha crecido el hongo
	                        }

	                        //esta condicion me sirve para calcular solo el crecimiento de hongo de solo aquellas cepas
	                        // que han sido infectadas y ademas para restar al peso total del racimo el tamano del hongo
	                       
	                        if($arrayCepas[$j]->getTenerHongo() == 1){	                  

	                            $arrayEnfermedades[$j]->calcularCrecimientoHongo($lluvia,$temperatura,$refLluviaHongo,$refTemperaturaHongo,$porcentajeCreHongo);
	                            //echo "<br>peso uva actual " .$j .":" . $arrayCepas[$j]->getPesoRacimo();
	
	                            //se le pasa al metodo de rstar al peso de la uva el crecimiento del hongo solo el aumejto de esa iteraccion del hongo en ese momento

	                            //cambiar de valores discretos a porcentajes
	                            $arrayCepas[$j]->restarTamanoHongoPesoUva($arrayEnfermedades[$j]->getPorcentajeTamanhoHongo());
								//echo "<br>peso uva despues de la resta :" . $arrayCepas[$j]->getPesoRacimo();
	                            //echo "<br>Tamanho del hongo:" . $tamanhoHongo;
	                        }	                    
                        }


                        //guardar los datos en e LOG
                        

                        //calculo el peso de la cepas por dia y los meto en un array solo si el numero de simualciones es inferios a 2
                        

                        $this->guardarLog($fechaLog,$humedad,$lluvia,$temperatura,$pesoUva,$tamanoHoja, $infectar,$arrayCepas[$j]->getPesoPesoPerdido());
                        
                    //fin fbucle numCepas
                    }


                   // if($numeroSimulaciones == 1){
    
            		$_SESSION["pesoCepasTotalPorDia"][$i]  = $this->calcularTamanoTotalTodasCepasPorDia($arrayCepas);	
					$_SESSION["pesoCepasTotalPorDiaPerdido"][$i]  = $this->calcularTamanoTotalTodasCepasPorDiaPerdido($arrayCepas);
					$_SESSION["tamanoHojasPorDia"][$i] = $this->calcularTotalTamanoHojasPorDia($arrayCepas,$numeroHojas);


					if( $fechaFinCrecimiento == $fechaFicheroActual){
						$ultimopPesoCepasTotalPorDia = $_SESSION["pesoCepasTotalPorDia"][$i];
						$ultimopPesoCepasTotalPorDiaPerdido = $_SESSION["pesoCepasTotalPorDiaPerdido"][$i];
						$ulimoTamanoHojasPorDia = $_SESSION["tamanoHojasPorDia"][$i];
					}

                    //} 

                	$this->guardarLogSeparador();
                //fin de la condicion de fechas
                }else{
                	
                	$_SESSION["pesoCepasTotalPorDia"][$i]  = 0;	
					$_SESSION["pesoCepasTotalPorDiaPerdido"][$i]  = 0 ;
					$_SESSION["tamanoHojasPorDia"][$i] = 0;
                }
            //fin de bucle de periodo	
            }

		   

		    if ($numeroSimulaciones > 1) {
		      	$_SESSION["pesoCepasTotal"][$z] = $ultimopPesoCepasTotalPorDia ;
			    $_SESSION["pesoCepasTotalPerdido"][$z] = $ultimopPesoCepasTotalPorDiaPerdido;
			    $_SESSION["tamanoTotalHojas"][$z] = $ulimoTamanoHojasPorDia;

		    }
	     	
	     	 $contFechaSulfato = 0; //varaible para que la siguiente iteracion el array de fechas empiece de nuevo en 0

	     	 //inicializar las varaible de sumatorio a 0 si no se acumula
		    $this->totalPesoUvaPorDia = 0;
			$this->totalPesoUvaPorDiaPerdido = 0;
			$this->totalTamanoTotalHojaPorDia = 0;
		    echo "<br>---------------------------------------------------------------FIN DE ITERACION";
          
        //fin bucle numeroSimulaciones
        }

        
		for ($i=0; $i <$numeroSimulaciones; $i++) { 
        	echo "<br>Total de la cepa " . $i . ": " .$_SESSION["pesoCepasTotal"][$i];
        	echo "<br>Total perdido " . $i . ": " .$_SESSION["pesoCepasTotalPerdido"][$i];
        	echo "<br>Total de la hoja " . $i . ": " .$_SESSION["tamanoTotalHojas"][$i];
        	echo"<br>";
        }
		
		
        for ($i=0; $i <$this->getPeriodoFichero(); $i++) { 
        	echo "<br>peso cepa " . $i . ": " .$_SESSION["pesoCepasTotalPorDia"][$i];
        	echo "<br>peso perdido " . $i . ": " .$_SESSION["pesoCepasTotalPorDiaPerdido"][$i];
        	echo "<br> hoja " . $i . ": " . $_SESSION["tamanoHojasPorDia"][$i];
        	echo"<br>";
        }
		

    //fin mainWOrld
	}




//fin
}
?>
