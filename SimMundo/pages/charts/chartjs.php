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
      <script type="text/javascript">

      //defino las varaibles para las graficas de los datos climaticos

        var periodo = <?php echo $_SESSION["periodo"] ?>;
        var numeroSimulaciones = <?php echo $_SESSION["numeroSimulaciones"] ?>;

        var datosGraficaTempe = [];
        var datosGraficaLluvia = [];
        var datosGraficaHumedad =[];

        //datos de la cepa y hongo
        var datosGraficapesoCepasTotal =[];
        var datosGraficatamanoHongo =[];
      </script>

      <?php      
      
        $i=0;
        $j=0;
     
        while($i<$_SESSION["periodo"]){     
          

            echo "<script>datosGraficaTempe[$i] = " .(float) $_SESSION['temperatura'][$i] . ";</script>";
            echo "<script>datosGraficaLluvia[$i] = " . (float)$_SESSION["lluvia"][$i] . ";</script>";
            echo "<script>datosGraficaHumedad[$i] = " . (float)$_SESSION["humedad"][$i] . ";</script>";    
          $i++;
        }    

        while ( $j < $_SESSION["numeroSimulaciones"]) {
          echo "<script>datosGraficapesoCepasTotal[$j] = " .(float) $_SESSION['pesoCepasTotal'][$j] . ";</script>";
          echo "<script>datosGraficatamanoHongo[$j] = " .(float) $_SESSION['tamanoHongo'][$j] . ";</script>";
          $j++;
        }



          
      ?>  
      <script type="text/javascript" src="https://www.google.com/jsapi"></script>

      <script type="text/javascript">

          



       
          google.load('visualization', '1.1', {packages: ['line']});
          //google.setOnLoadCallback(graficaDatosClimaticos);
          google.setOnLoadCallback(generarGraficas);
         

         /*function sleep(milliseconds) {
            var start = new Date().getTime();
            for (var i = 0; i < 1e7; i++) {
              if ((new Date().getTime() - start) > milliseconds){
                break;
              }
            }
          }*/

          function generarGraficas(){
            graficaDatosClimaticos();
            alert();
            graficaCepaHongo();
            alert();
          }


          function graficaDatosClimaticos() {
            var i = 0;
            var data = new google.visualization.DataTable();
            data.addColumn('number', 'day');
            data.addColumn('number', 'temperatura');
            data.addColumn('number', 'lluvia');
            data.addColumn('number', 'humedad');
            
            //data.addColumn('number', 'Transformers: Age of Extinction');

       

            for (var i =0; i < numeroSimulaciones; i++) {
              data.addRows([  [i, datosGraficaTempe[i], datosGraficaLluvia[i],datosGraficaHumedad[i] ]  ]);
            };


  
            var options = {
              chart: {
                title: 'Box Office Earnings in First Two Weeks of Opening',
                subtitle: 'in millions of mierdaaaaaaaa (USD)'
              },
              width: 900,
              height: 500
              
            };
            var chart = new google.charts.Line(document.getElementById('graficaDatosClimaticos'));

            chart.draw(data, options);
          }




          function graficaCepaHongo() {
            var i = 0;
            var data = new google.visualization.DataTable();
            data.addColumn('number', 'Day');
            data.addColumn('number', 'CEPA');
            data.addColumn('number', 'HONGO');

            
            //data.addColumn('number', 'Transformers: Age of Extinction');

       

            for (var i =0; i < numeroSimulaciones; i++) {
              data.addRows([  [i, datosGraficapesoCepasTotal[i], datosGraficatamanoHongo[i] ]  ]);
            };


  
            var options = {
              chart: {
                title: 'Box Office Earnings in First Two Weeks of Opening',
                subtitle: 'in millions of dollars (USD)'
              },
              width: 900,
              height: 500
              
            };
            var chart = new google.charts.Line(document.getElementById('graficaCepaHongo'));

            chart.draw(data, options);
          }
       </script>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <!-- AREA CHART -->
              <div class="box box-primary">
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


              <div class="box box-primary">
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
    <!-- page script -->

  </body>
</html>
