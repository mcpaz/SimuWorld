

<?php
include ("ClassMundo.php");
include ("ClassCepa.php");
include ("ClassEnfermedad.php");
include ("ClassPaisano.php");
include ("ClassFichero.php");


//inicializo las clases
$fichero = new ClassFichero;
$paisano = new ClassPaisano;
$mundo = new ClassMundo($paisano,$fichero);
$cepa = new ClassCepa($mundo);
$hongo = new ClassEnfermedad($mundo);





$periodo = (int)$fichero->getPeriodo();



// var varjs="'.$variable_php.'";

?>


<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script  Language="Javascript" src="Chart.js-master/Chart.js"></script>

<script type="text/javascript">

var datosGrafica = [];


</script>




</head>
<body>


<div>
<!-- empiezo a recojer datos desde php y lo meto a la vez dentro de una variable javascript para los datos de la grafica    -->
<?php

$i=1;
$j=0;
while($i!=$periodo+24){
	echo $mundo->getTemperaturaMedia($i)  ." , " . $mundo->getFechaActual($i). "	|	".$mundo->getLluviaMedia($i+1870-25) . " ," . $mundo->getFechaActual($i);   
	echo "<br>";
	if($i>23){
		echo '<script>datosGrafica['.$j.'] = "'.$mundo->getTemperaturaMedia($i) .'";</script>';
		$j++;
	}
	

	   echo "<br>";     
	$i++;
}



// var varjs="'.$variable_php.'";

?></div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<script type="text/javascript">
document.writeln(datosGrafica);
</script>

<canvas id="myChart" width="800" height="800"></canvas>

<script type="text/javascript">


var data = {
    labels: ["Enero","febrero","Marzo","Abril","Mayo","junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
          
            	data: datosGrafica
            
           
        },
        {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 86, 27, 90]
        }
    ]
};




var ctx = document.getElementById("myChart").getContext("2d");
var myLineChart = new Chart(ctx).Line(data);


</script>

</body>
</html>

