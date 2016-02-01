

<?php
include ("ClassMundo.php");
include ("ClassCepa.php");
include ("ClassEnfermedad.php");
include ("ClassPaisano.php");
include ("ClassFichero.php");
include ("ClassDato.php");


//inicializo las clases
$classDato = new ClassDato;
$fichero = new ClassFichero;
$paisano = new ClassPaisano;

$cepa = new ClassCepa($mundo);
$hongo = new ClassEnfermedad($mundo);
$mundo = new ClassMundo($paisano,$fichero,$classDato,$hongo);




$periodo = (int)$fichero->getPeriodo();



// var varjs="'.$variable_php.'";
//https://google-developers.appspot.com/chart/interactive/docs/gallery/linechart
//http://www.highcharts.com/demo/line-basic
//file:///home/willy/Descargas/Highstock-2.1.9/index.htm
//http://www.chartjs.org/docs/#getting-started-include-chart.js


include("menuParametrizacion.php");


  
//REFATORIZAR EL CODIGO Y HACER UNA FUNCION EPEFCIFICA PRA LA FECHA QUE NO VAYA INCLUIDA EN LAS OTRAS PARA NO DEPENDER DUNA DE LA OTRA 
//ME REFIERO A LAS DE LLUVIAmEDIA Y TEMEPRATURAmEDIA, QUE SI NO LAS EJECUTA ANTES NO ME COJE BIEN LA FECHA.
$i=24;
$contSulfato = 0 ;

if(isset($_POST["submit"])){
  $numeroCepas = $_POST["numeroCepas"];

  //datos de uva
  $classDato->setReferenciaLluviaUva($_POST["referenciaLluviaUva"]);
  $classDato->setReferenciaTemperaturaUva($_POST["referenciaTemperaturaUva"]);
  $classDato->setPorcentajeCrecimientoUva($_POST["porcentajeCrecimientoLluviaUva"]);

    //datos de hoja
  $classDato->setReferenciaLluviaHoja($_POST["referenciaLluviaHoja"]);
  $classDato->setReferenciaTemperaturaHoja($_POST["referenciaTemperaturaHoja"]);
  $classDato->setPorcentajeCrecimientoHoja($_POST["porcentajeCrecimientoLluviaHoja"]);

    //datos de hongo
  $classDato->setReferenciaLluviaHongo($_POST["referenciaLluviaHongo"]);
  $classDato->setReferenciaTemperaturaHongo($_POST["referenciaTemperaturaHongo"]);
  $classDato->setPorcentajeCrecimientoHongo($_POST["porcentajeCrecimientoLluviaHongo"]);




  $duracionSulfato = 0; //lo que dura el sulfato haciendo efecto
  $rangoTiempoSulfato = 0;
  while($i!=$periodo+24){
    
      //$fecha = $mundo->getFechaActual($i+1870-25);
      $lluvia = $mundo->getLluviaMediaFichero($i+1870-25);
      $temperatura = $mundo->getTemperaturaMediaFichero($i);
      $fecha = $mundo->getFechaActual($i);
      echo "Fecha: " . $fecha ;
      echo "<br>Datos respectivos: <br>";

      
      echo "<br>Lluvia media: " .$lluvia;
      echo "<br>temperatura media: " .$temperatura;



      //algo improvisado para simular que el paisano sulfato cada 15 dias
      //IMPORTATNEEEEEEEE
      //me acabao de dar cuenta que si sulfato cada 15 dias seguramente no se reproduzca nunnca el hongo
      //ya que siempre lo elimino y el sulfatado durara para dias
      

      //NI IDEA COMO SOLUCIONA ESTO, PENSAR MEJOR
      //EL PROBLEMA ES ALTERNAR LA DURACION DEL SULFATO CON EL TIEMPO EL RANGO DE TIEMPO CADA CUANT OSE SULFATA
      if($rangoTiempoSulfato < $paisano->getRangoTiempoSulfato()){
        $paisano->setSulfatar(0);
        $rangoTiempoSulfato++;
        $duracionSulfato = 0;
      }else
      {   
       
        if( $duracionSulfato < $paisano->getDuracionSulfato()){
          $paisano->setSulfatar(1);
          $duracionSulfato++;
        }else
        {
          $paisano->setSulfatar(0);
          $hongo->calcularCrecimientoHongo();
          $mundo->getInfectarCepa();
        }

      }






      $sulfato = $paisano->getSulfatar();
      echo "<br>Sulfatado del paisano: ".$sulfato;
       echo "<br>";
      //supngo que metere este metodo dentro de la estrucutra anterior de if else
      //ya que si se sulfata no merece la pena calcular el crecimiento 
      //$hongo->calcularCrecimientoHongo();

      
      echo "infectar cepa: " . $mundo->getInfectarCepa();
      //DUDAAAAAAAAAAAA
      //ES EL HONGO EL QUE AVISA DE QUE CRECE O ES EL MUNDO?
      $tamanhoHongo = $hongo->getTamanhoHongo();
      echo "Tamaño hongo: ". $tamanhoHongo;
      echo "<br>----------------------------------------------<br>";
    
    
      $mundo->guardarLog($fecha ,$lluvia,$tamanhoHongo);
    $i++;
    
  }


}


$numeroCepas = 55;



?>  


<!--
<div class="table-responsive" align = "center"> 
  <table class = "table">
    <?php 
      $j=0;
      for ($i=0; $i < $numeroCepas; $i++,$j++) { 
        if($j == 0){
          echo "<tr>"; 
               
        }
          echo '<td> 
                <img src="img/cepaInicial.jpeg" width="80" height="80">
                </td>';
        if($j == 10){
          echo "</tr>";
         
          $j=0;

        }

      }
    ?>


  </table>
</div>

-->


</body>
</html>

