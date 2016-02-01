

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
//https://google-developers.appspot.com/chart/interactive/docs/gallery/linechart
//http://www.highcharts.com/demo/line-basic
//file:///home/willy/Descargas/Highstock-2.1.9/index.htm
//http://www.chartjs.org/docs/#getting-started-include-chart.js
?>


<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script  Language="Javascript" src="Chart.js-master/Chart.js"></script>

<script type="text/javascript">
 var datosGraficaTempe = [];
		var datosGraficaLluvia = [];
</script>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">
 
    google.load('visualization', '1.1', {packages: ['line']});
    google.setOnLoadCallback(drawChart);

    function drawChart() {
      var i = 0;
      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Day');
      data.addColumn('number', 'Guardians of the Galaxy');
      data.addColumn('number', 'The Avengers');
      //data.addColumn('number', 'Transformers: Age of Extinction');
      data.addRows([
	      for (i = 0; i < datosGraficaTempe.length ; i++) {
	        
	        [i,  datosGraficaTempe[i], datosGraficaLluvia[i]],
	      };
      		[2000,0,0]
      ]);

      var options = {
        chart: {
          title: 'Box Office Earnings in First Two Weeks of Opening',
          subtitle: 'in millions of dollars (USD)'
        },
        width: 900,
        height: 500
      };

      var chart = new google.charts.Line(document.getElementById('linechart_material'));

      chart.draw(data, options);
    }
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
		echo '<script>datosGraficaTempe['.$j.'] = "'.$mundo->getTemperaturaMedia($i) .'";</script>';
		echo '<script>datosGraficaLluvia['.$j.'] = "'.$mundo->getLluviaMedia($i+1870-25) .'";</script>';
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
document.writeln(datosGraficaTempe);
</script>

 <div id="linechart_material"></div>




</body>
</html>

