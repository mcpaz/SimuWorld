<?php


/**para poder probar las expresiones regulares
* http://www.freeformatter.com/regex-tester.html
*/
class ClassFichero
{
	
	public $temperaturaMedia;	
	public $lluviaMedia;
	public $numeroLineas;


	public $archivo;//done cargo y guardo el archivo
	public $fechaActual; //guardo la fecha del archivo por donde pasa
	public $periodo; //periodo en dias que durar el ciclo


	public $periodoInicial;
	public $periodoFin;



	function __construct()
	{
		$this->cargarArchivo();
		$this->calcularPeriodo();
		$this->numeroLineas = count($this->archivo);
	
		# code...
	}
	//abro el fichero.


	public function getNumeroLineas(){
		

		
		return $this->numeroLineas;
	}
	public function cargarArchivo(){
		$this->archivo = file("historico.txt");
		//$this->archivo = $arch;
		
		return $this->archivo;
	}


	public function getFechaActual(){
		return $this->fechaActual;
	}
	

	public function getTemperaturaMedia ($l){
		
		$linea = $this->archivo[$l];
    	//$linea = $this->$parseaTexto($linea);
    	$this->obtenerInformacionTemperaturaMedia($linea,$l);

		return $this->temperaturaMedia;
	}

	public function getLluviaMedia($l){
		$linea = $this->archivo[$l];
    	//$linea = $this->$parseaTexto($linea);
    	$this->obtenerInformacionLluviaMedia($linea,$l);

		return $this->lluviaMedia;
	}



	public function getPeriodo(){//se guarda el valor en la funcion de obtenerInformacionPeriodo()
		return $this->periodo;
	}

	public function calcularPeriodo(){//devuelve el total de dias que transcurre en el fichero			
		foreach ($this->archivo as $linea) {
			//$linea = $this->parseaTexto($linea);		
	    	if($this->obtenerInformacionPeriodo($linea)){	    	
	    		break;
	    	}
		}
	}


	public function parseaTexto($string) { //no funciona, si paso una cadena normal entre "" si funciona, pasado por parametro no
										//y haciendo una echo de la variable si enseña la cadena de texto que se le pasa.
		$string = trim($string); 
		$string = str_replace( array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'), array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'), $string );
		$string = str_replace( array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'), array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'), $string );
		$string = str_replace( array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'), array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'), $string );
		$string = str_replace( array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'), array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'), $string );
		$string = str_replace( array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'), array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'), $string );
		$string = str_replace( array('ñ', 'Ñ', 'ç', 'Ç'), array('n', 'N', 'c', 'C'), $string );
		//Esta parte se encarga de eliminar cualquier caracter extraño 
	
      
    	return $string; 
    } 



	public function obtenerInformacionPeriodo($l){//con esta funcion busco el periodo de tiempo.

		$re1='(Per)';	# Word 1
		$re2 = ('.');
		$re3 = ('odo');
		$re4='(.)';	# Any Single Character 1
		$re5 = "((?:(?:[0-2]?[0-9]{1})|(?:[3][01]{1}))[-:\\/.](?:[0]?[1-9]|[1][012])[-:\\/.](?:(?:[1]{1}[0-9]{1}[0-9]{1}[0-9]{1})|(?:[2]{1}[0-9]{3})))(?![0-9])";
		$re6 = "-{1}";
		$re7 = "((?:(?:[0-2]?[0-9]{1})|(?:[3][01]{1}))[-:\\/.](?:[0]?[1-9]|[1][012])[-:\\/.](?:(?:[1]{1}[0-9]{1}[0-9]{1}[0-9]{1})|(?:[2]{1}[0-9]{3})))(?![0-9])";

		
		if ($c=preg_match_all ("/".$re1.$re2.$re3.$re4.$re5.$re6.$re7."/is", $l, $matches))
		{
			$ddmmyyyy1=$matches[3][0];
			$ddmmyyyy2=$matches[4][0];	
			$this->calcularPeriodoFechas($ddmmyyyy1,$ddmmyyyy2);
			return true;
		
		}
	}

	public function calcularPeriodoFechas($f1,$f2){//calcual la difencia entre fechas

		$ddmmyyyy1 = str_replace('/','-',$f1);
		$ddmmyyyy2 = str_replace('/','-',$f2);
		$datetime1 = new DateTime($ddmmyyyy1);
		$datetime2 = new DateTime($ddmmyyyy2);

		$this->periodoInicial = $datetime1;
		$this->periodoFin = $datetime2;

		

		$interval = $datetime1->diff($datetime2);
	
		$this->periodo = $interval->format('%a');

	}

	//DOS GETTERS PARA DEVOLVER LAS FECHAS DE INICIO Y FIN

	public function getPeriodoInicial(){
		return $this->periodoInicial;
	}

	public function getPeriodoFin(){
		return $this->periodoFin;
	}


	public function obtenerInformacionTemperaturaMedia($l,$p){//le pasamos la cadena y el numero de la linea(este por el ajuste que digo luego)
	
	
		//expresion regular que obtiene los datos del fichero
		$re1='.*?';	# Non-greedy match on filler
		$re2='((?:(?:[0-2]?\\d{1})|(?:[3][01]{1}))[-:\\/.](?:[0]?[1-9]|[1][012])[-:\\/.](?:(?:[1]{1}\\d{1}\\d{1}\\d{1})|(?:[2]{1}\\d{3})))(?![\\d])';	# DDMMYYYY 1
		$re3='.*?';	# Non-greedy match on filler
		$re4='((?:[a-z][a-z]+))';	# Word 1
		$re5='.*?';	# Non-greedy match on filler
		$re6='((?:[a-z][a-z]+))';	# Word 2
		$re7='.*?';	# Non-greedy match on filler
		$re8='(-?[0-9]+(?!\))([,\.][0-9]*)?)';	# Float 1
		
		//funcion que aplica el la expresion regular
		if ($c=preg_match_all ("/".$re1.$re2.$re3.$re4.$re5.$re6.$re7.$re8."/is", $l, $matches))
		{
			if($p != 19){//el 19 es un ajuste mientras no solvento el problema de coger dos
				//fechas del tipo 01/4/2015-23/10/2015 !!!!!!!!!!!!!!!!SOLVENTAARRRRRRRRR


			    $ddmmyyyy1=$matches[1][0];
			    $word1=$matches[2][0];
			    $word2=$matches[3][0];
			    $float1=$matches[4][0];
		
			   
			    /*echo "<br>";
			    echo  "mierda". $p. " " . $ddmmyyyy1;
			    echo "<br>";
			    echo $word1;
			    echo "<br>";
			    echo $word2;
		        echo "<br>";
			    echo $float1;*/
			    $this->temperaturaMedia = str_replace(',', '.', $float1);
			    $this->fechaActual = $ddmmyyyy1;


			}
		}else{
			/*echo "<br>";
			echo "no se encontro nada.";*/
		}
	}

	public function obtenerInformacionLluviaMedia($l,$p){//le pasamos la cadena y el numero de la linea(este por el ajuste que digo luego)
	
	
		//expresion regular que obtiene los datos del fichero
		$re1='.*?';	# Non-greedy match on filler
		$re2='((?:(?:[0-2]?\\d{1})|(?:[3][01]{1}))[-:\\/.](?:[0]?[1-9]|[1][012])[-:\\/.](?:(?:[1]{1}\\d{1}\\d{1}\\d{1})|(?:[2]{1}\\d{3})))(?![\\d])';	# DDMMYYYY 1
		$re3='.*?';	# Non-greedy match on filler
	    $re4='(Chuvia)';	# Word 1
	    $re5='.*?';	# Non-greedy match on filler
	    $re6='(\\(L\\/m2\\))';	# Round Braces 1
		$re7='.*?';	# Non-greedy match on filler
		$re8='(-?[0-9]+(?!\))([,\.][0-9]*)?)';	# Float 1

		//funcion que aplica el la expresion regular

		if ($c=preg_match_all ("/".$re1.$re2.$re3.$re4.$re5.$re6.$re7.$re8."/is", $l, $matches))
		{
			if($p != 19){//el 19 es un ajuste mientras no solvento el problema de coger dos
				//fechas del tipo 01/4/2015-23/10/2015 !!!!!!!!!!!!!!!!SOLVENTAARRRRRRRRR


			    $ddmmyyyy1=$matches[1][0];
			    $word1=$matches[2][0];
			    $word2=$matches[3][0];
			    $float1=$matches[4][0];
			
			    $this->lluviaMedia = $float1;
			    $this->fechaActual = $ddmmyyyy1;
			    
			}
		}else{
			/*echo "<br>";
			echo "no se encontro nada.";*/
		}
	}


}

//$mierda = new ClassFichero;
/*
$i = 1;
while($i!=3000){
	echo "dia: " . $i . ": " . $mierda->getLluviaMedia($i+1870);
	echo "<br>";
	$i++;
}

*/


 ?>
