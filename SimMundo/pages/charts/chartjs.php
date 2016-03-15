<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | ChartJS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
           <?php

            include("../../menuLateral.html");
            session_start();
          ?>
        </section>
        <!-- /.sidebar -->
      </aside>



<!--  aqui empieza el codigo de las graficas  -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Gráficas.
            
          </h1>
          
        </section>


        <!-- codigo mio para la creacion de las graficas -->
     
      
        <!-- Main content -->
        <section class="content">


          <div class="row">
            <div class="col-md-12">
              <!-- AREA CHART -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Area Chart</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <div id="graficaDatosClimaticos"></div>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
          </div>

            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Area Chart</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <div id="graficaCepaHongo"></div>
                  </div>
                </div><!-- /.box-body -->                
              </div><!-- /.box -->
          </div>


            <div class="col-md-12">                     
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Line Chart</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="lineChart" style="height:250px"></canvas>
                  </div>
                </div>
              </div>   
            </div><!-- /.col (LEFT) -->
          </div><!-- /.row -->



        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
     
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="../../plugins/chartjs/Chart.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>

     <script type="text/javascript">

      //defino las varaibles para las graficas de los datos climaticos

        var periodo = <?php echo $_SESSION["periodo"] ?>;
        var numeroSimulaciones = <?php echo $_SESSION["numeroSimulaciones"] ?>;

        var datosGraficaTempe = [];
        var datosGraficaLluvia = [];
        var datosGraficaHumedad =[];
        var datosGraficaFechaFichero = [];

        //datos de la cepa y hongo
        var datosGraficaPesoCepasTotal =[];
        var datosGraficaTamanoHongo =[];
        var datosGraficaTamanoHoja = [];




      </script>

      <?php      
      
        $i=0;
        $j=0;
     



        while($i<$_SESSION["periodo"]){     
          

            echo "<script>datosGraficaTempe[$i] = " .(float) $_SESSION['temperatura'][$i] . ";</script>";
            echo "<script>datosGraficaLluvia[$i] = " . (float)$_SESSION["lluvia"][$i] . ";</script>";
            echo "<script>datosGraficaHumedad[$i] = " . (float)$_SESSION["humedad"][$i] . ";</script>";
            echo "<script>datosGraficaFechaFichero[$i] = '" . $_SESSION["fechaFichero"][$i] . "';</script>";
          $i++;
         
        }    

        while ( $j < $_SESSION["numeroSimulaciones"]) {
          echo "<script>datosGraficaPesoCepasTotal[$j] = " .(float) $_SESSION['pesoCepasTotal'][$j] . ";</script>";
          echo "<script>datosGraficaTamanoHongo[$j] = " .(float) $_SESSION['tamanoHongo'][$j] . ";</script>";
          echo "<script>datosGraficaTamanoHoja[$j] = " .(float) $_SESSION['tamanoHojas'][$j] . ";</script>";
          $j++;
        }



          
      ?>  
      <script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="../../plugins/chartjs/Chart.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- page script -->
    <script type="text/javascript">

       

          
          google.load('visualization', '1.1', {packages: ['line']});
          //google.setOnLoadCallback(graficaDatosClimaticos);
          google.setOnLoadCallback(generarGraficas);
         


          function generarGraficas(){
            graficaDatosClimaticos();
        setTimeout(function(){  graficaCepaHongo();}, 0);
          
            
          }


          function graficaDatosClimaticos() {
            var i = 0;
            var data = new google.visualization.DataTable();


            var cadenaPartida = [];
      

            data.addColumn('date', 'meses');
            data.addColumn('number', 'temperatura');
            data.addColumn('number', 'lluvia');
            data.addColumn('number', 'humedad');
            
            //data.addColumn('number', 'Transformers: Age of Extinction');

            for (var i =0; i < periodo; i++) {
             /*fecha = datosGraficaFechaFichero[i].split("-");
              fecha = fecha[2] + '-' + fecha[1] + '-' +fecha[0];*/

              /*cadenaPartida = datosGraficaFechaFichero[i].replace("/","-");   
              document.writeln(cadenaPartida[0],cadenaPartida[1],cadenaPartida[2]);    */   

              cadenaPartida = datosGraficaFechaFichero[i].split("/");    
              //cadena = cadenaPartida[0].remove("0"); 
              
              data.addRows([  [ new Date(datosGraficaFechaFichero[i],"dd/mm/yyyy"), datosGraficaTempe[i], datosGraficaLluvia[i],datosGraficaHumedad[i] ]  ]);
               
            };


  
            var options = {
              chart: {
                title: 'Gráfica de datos climaticos.'
              },
              width: 800,
              height: 450 ,
            
              
            };

            var chart = new google.charts.Line(document.getElementById('graficaDatosClimaticos'));

            chart.draw(data, options);
          }


  

          function graficaCepaHongo() {
            var i = 0;
            var data = new google.visualization.DataTable();
            data.addColumn('number', 'Numero de simulaciones');
            data.addColumn('number', 'CEPA');
            data.addColumn('number', 'HONGO');
            data.addColumn('number', 'HOJA');

            
            //data.addColumn('number', 'Transformers: Age of Extinction');

       

            for (var i =0; i < numeroSimulaciones; i++) {
              data.addRows([  [i, datosGraficaPesoCepasTotal[i], datosGraficaTamanoHongo[i] , datosGraficaTamanoHoja[i]]  ]);
            };


  
            var options = {
              chart: {
                title: 'Gráfica de crecimiento'
              },
              width: 800,
              height: 450
              
            };
            var chart = new google.charts.Line(document.getElementById('graficaCepaHongo'));

            chart.draw(data, options);
          }
       </script>


       <script>
       $(function () {
 
        // This will get the first returned node in the jQuery collection.
 

        var areaChartData = {
          labels: ["January", "February", "March", "April", "May", "June", "July"],
          datasets: [
            {
              label: "Electronics",
              fillColor: "rgba(210, 214, 222, 1)",
              strokeColor: "rgba(210, 100, 222, 1)",
              pointColor: "rgba(100, 214, 100, 1)",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: datosGraficaTempe
            },
            {
              label: "Digital Goods",
              fillColor: "rgba(60,141,188,0.9)",
              strokeColor: "rgba(60,141,188,0.8)",
              pointColor: "#3b8bba",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: datosGraficaHumedad
            },

            {
              label: "Digitdrh",
              fillColor: "rgba(60,141,188,0.5)",
              strokeColor: "rgba(30,170,150,0.4)",
              pointColor: "#3b8bba",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#ffa",
              pointHighlightStroke: "rgba(60,197,188,1)",
              data: datosGraficaLluvia
            }
          ]
        };

        var areaChartOptions = {
          //Boolean - If we should show the scale at all
          showScale: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: false,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - Whether the line is curved between points
          bezierCurve: true,
          //Number - Tension of the bezier curve between points
          bezierCurveTension: 0.3,
          //Boolean - Whether to show a dot for each point
          pointDot: false,
          //Number - Radius of each point dot in pixels
          pointDotRadius: 4,
          //Number - Pixel width of point dot stroke
          pointDotStrokeWidth: 1,
          //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
          pointHitDetectionRadius: 20,
          //Boolean - Whether to show a stroke for datasets
          datasetStroke: true,
          //Number - Pixel width of dataset stroke
          datasetStrokeWidth: 2,
          //Boolean - Whether to fill the dataset with a color
          datasetFill: true,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: true,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true
        };

        //Create the line chart


        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas);
        var lineChartOptions = areaChartOptions;
        lineChartOptions.datasetFill = false;
        lineChart.Line(areaChartData, lineChartOptions);


          });
       
        </script>
  </body>
</html>
