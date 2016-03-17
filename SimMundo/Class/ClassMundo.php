
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
    public $totalTamanoTotalHongo;//variablepara guardar el total del crecimiento del hongo por iteracion
    public $totalTamanoTotalHoja;
    

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


	public function calcularTotalTamanoHongo($arrayEnfermedades){


		for ($i=0; $i < sizeof($arrayEnfermedades); $i++) { 

			$this->totalTamanoTotalHongo=$this->totalTamanoTotalHongo +  $arrayEnfermedades[$i]->getTamanhoHongo();

		}

		return $this->totalTamanoTotalHongo;

	}


		public function calcularTotalTamanoHojas($arrayCepas,$numeroHojas){


		for ($i=0; $i < sizeof($arrayCepas); $i++) { 

			$this->totalTamanoTotalHoja = $this->totalTamanoTotalHoja +  $arrayCepas[$i]->calcularTotalTamanoHojas($numeroHojas);

		}

		return $this->totalTamanoTotalHoja;

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

  		$refLluviaHoja = $this->getReferenciaLluviaHoja();
  		$refTemperaturaHoja= $this->getReferenciaTemperaturaHoja();
  		$porcentajeCreHoja = $this->getPorcentajeCrecimientoHoja();
  		$numeroHojas = $this->getNumeroHojas();


  		$refLluviaHongo = $this->getReferenciaLluviaHongo();
  		$refTemperaturaHongo = $this->getReferenciaTemperaturaHongo();
  		$refHumedadHongo = $this->getReferenciaHumedadHongo();
  		$porcentajeCreHongo = $this->getPorcentajeCrecimientoHongo();
  		$procentajeProbabilidadHumedad = $this->getPorcentajeProbabilidadHumedadHongo();

  		 

		$contador = 0;//2ª variable de control para que no este siempre calculando si infeta o no
		

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

         
                
               /* echo "t: " . $temperatura;
                echo "<br> ";
        		echo "h: " .$humedad;
        		echo "<br> ";
        		echo "ll: " .$lluvia;
				echo "<br> ";echo "<br> ";*/

                //GUARDO LOS DATOS EN SESION DE ARRAY PAR LUEGO PASARLOS AL JAVASCRIPT
                //QUE CREA LAS GRAFICAS
                $_SESSION["temperatura"][$k] = $temperatura;
                $_SESSION["lluvia"][$k]= $lluvia;
                $_SESSION["humedad"][$k] = $humedad;
                $_SESSION["fechaFichero"][$k] = $fechaLog;


                if($fechaInicialCrecimiento <= $fechaFicheroActual && $fechaFinCrecimiento >= $fechaFicheroActual ){
           

                    

                    for ($j =0; $j  < $numCepas; $j ++) { 
                        $pesoUva = $arrayCepas[$j]->calCrecPesoRacimo($lluvia,$temperatura,$refLluviaUva,$refTemperaturaUva,$porcentajeCreUva);
          
                        //echo "<br>peso uva:" .$arrayCepas[$j]->calCrecPesoRacimo($lluvia,$temperatura,$refLluviaUva,$refTemperaturaUva,$porcentajeCreUva);
                        $tamanoHoja = $arrayCepas[$j]->calCrecimientoHoja($lluvia,$temperatura,$refLluviaHoja,$refTemperaturaHoja,$porcentajeCreHoja,$numeroHojas);
                        //echo "<br>tamaño de hoja:" .$arrayCepas[$j]->calCrecimientoHoja($lluvia,$temperatura,$refLluviaHoja,$refTemperaturaHoja,$porcentajeCreHoja);
                        
                        //mientras esto sea 0 es que n[0],cadenaPartida[1],cadenaPartida[2]o hay condiciones optimas para que crezca el hongo
                        //y entonces se calcula su probabilidad pasandole la humedad para ver si se puede desarrolar o no

                        $fechaSulfatoIni = date_create(str_replace("/","-",$arrayFechasSulfato[$contFechaSulfato]));                    
	                    $fechaSulfatoFin = date_create(str_replace("/","-",$arrayFechasSulfato[$contFechaSulfato]));
					 	date_add($fechaSulfatoFin, date_interval_create_from_date_string( (string)$tiempoDuracionSulfato. 'days'));

	                   
                        if( $fechaSulfatoIni <= $fechaFicheroActual && $fechaSulfatoFin >= $fechaFicheroActual){                    	

                        	if($fechaSulfatoFin == $fechaFicheroActual){

                        		if($contFechaSulfato < $numeroSulfatos -1){  
                        			$contFechaSulfato++;   
                        		} else{
                        			$contFechaSulfato = 0;                  
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
	                                $contador++;
	                            }
	                        }else{
	                            $infectar = -1;//se hace para darle un valor y asi se registra un -1 como queno ha crecido el hongo
	                        }

	                        //esta condicion me sirve para calcular solo el crecimiento de hongo de solo aquellas cepas
	                        // que han sido infectadas y ademas para restar al peso total del racimo el tamano del hongo
	                       
	                        if($arrayCepas[$j]->getTenerHongo() == 1){	                  
	                        	
	                            $tamanhoHongo = $arrayEnfermedades[$j]->calcularCrecimientoHongo($lluvia,$temperatura,$refLluviaHongo,$refTemperaturaHongo,$porcentajeCreHongo);
	                            //echo "<br>peso uva actual " .$j .":" . $arrayCepas[$j]->getPesoRacimo();
	                            //se le pasa al metodo de rstar al peso de la uva el crecimiento del hongo solo el aumejto de esa iteraccion del hongo en ese momento

	                            //cambiar de valores discretos a porcentajes
	                            $arrayCepas[$j]->restarTamanoHongoPesoUva($arrayEnfermedades[$j]->getAumentoHongo());
								//echo "<br>peso uva despues de la resta :" . $arrayCepas[$j]->getPesoRacimo();
	                            //echo "<br>Tamanho del hongo:" . $tamanhoHongo;
	                        }else{
	                            $tamanhoHongo = 0;
	                        }	                    
                        }


                        //guardar los datos en e LOG
                        $this->guardarLog($fechaLog,$humedad,$lluvia,$temperatura,$pesoUva,$tamanoHoja, $infectar,$tamanhoHongo);

                        //calculo el peso de la cepas por dia y los meto en un array solo si el numero de simualciones es inferios a 2
                        if($numeroSimulaciones == 1){
                            
                            $arrayPesoCepasPorDia[$j] = $this->calcularTamanoTotalTodasCepasPorDia($arrayCepas);  
      
                        }
                        
                    //fin fbucle numCepas
                    }

                $this->guardarLogSeparador();
                //fin de la condicion de fechas
                }
            //fin de bucle de periodo	
            }
          
          //hago esto porque asi guardo eltotal por cada iteracion
          /*$arrayPesoCepasTotal[$z] = $this->calcularTamanoTotalTodasCepas($arrayCepas);
          $arrayTamanoHongo[$z] = $this->calcularTotalTamanoHongo($arrayEnfermedades);*/
          $_SESSION["pesoCepasTotal"][$z] = $this->calcularTamanoTotalTodasCepas($arrayCepas);
          $_SESSION["tamanoHongo"][$z] = $this->calcularTotalTamanoHongo($arrayEnfermedades);
          $_SESSION["tamanoHojas"][$z] =$this->calcularTotalTamanoHojas($arrayCepas,$numeroHojas);

         
          $this->totalPesoUva = 0; //hay que volver inicializarla a 0 para que no acumule los valores
          $this->totalTamanoTotalHongo = 0;
          $this->totalTamanoTotalHoja = 0;
          echo "<br>---------------------------------------------------------------FIN DE ITERACION";
        //fin bucle numeroSimulaciones
        }

      	
        /*for ($i=0; $i < sizeof($arrayPesoCepasTotal); $i++) { 
        	echo "<br>Total de la cepa " . $i . ": " .$arrayPesoCepasTotal[$i];
        	echo "<br>Total de la hongo " . $i . ": " .$arrayTamanoHongo[$i];
        }*/


		for ($i=0; $i <$numCepas; $i++) { 
        	echo "<br>Total de la cepa " . $i . ": " .$_SESSION["pesoCepasTotal"][$i];
        	echo "<br>Total de la hongo " . $i . ": " .$_SESSION["tamanoHongo"][$i];
        	echo "<br>Total de la hoja " . $i . ": " .$_SESSION["tamanoHojas"][$i];
        	echo"<br>";
        }


        /*for ($i=0; $i < sizeof($_SESSION["fechaFichero"]) ; $i++) { 
        	echo "<br>";
        	print_r($_SESSION["fechaFichero"][$i]);
        }*/
	}




//fin
}
?>
