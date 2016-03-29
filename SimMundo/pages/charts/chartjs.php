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
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Line Chart</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                    <div id="chart1" style="height:600px; width:1200px;"></div>        
                </div>
              </div>

            </div>

          </div>

          <div class="row">    


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
                    <div id="chart2" style="height:600px; width:1200px;"></div>        
                </div>
              </div>

            </div>

          </div>

        </section><!-- /.content -->

        <!-- /.content-wrapper -->
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
      </div>
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
        var pesoCepasTotal =[];
        var pesoCepasTotalPerdido =[];
        var tamanoTotalHojas = [];

        var pesoCepasTotalPorDia = [];
        var pesoCepasTotalPorDiaPerdido = [];
        var tamanoHojasPorDia = [];


      </script>

      <?php      
      
        $i=0;
        $j=0;
        $z =0;
        $c = 0;       


        if (isset($_SESSION["temperatura"])){
          while($i < $_SESSION["periodo"]){     
            

              echo "<script>datosGraficaTempe[$i] = " .(float) $_SESSION['temperatura'][$i] . ";</script>";
              echo "<script>datosGraficaLluvia[$i] = " . (float) $_SESSION["lluvia"][$i] . ";</script>";
              echo "<script>datosGraficaHumedad[$i] = " . (float)$_SESSION["humedad"][$i] . ";</script>";
              echo "<script>datosGraficaFechaFichero[$i] = '" . $_SESSION["fechaFichero"][$i] . "';</script>";
            $i++;
           
          }    
        }


        if ($_SESSION["numeroSimulaciones"] > 1){
            while ( $j < $_SESSION["numeroSimulaciones"]) {
              echo "<script>pesoCepasTotal[$j] = " .(float) $_SESSION['pesoCepasTotal'][$j] . ";</script>";
              echo "<script>pesoCepasTotalPerdido[$j] = " .(float) $_SESSION['pesoCepasTotalPerdido'][$j] . ";</script>";
              echo "<script>tamanoTotalHojas[$j] = " .(float) $_SESSION['tamanoTotalHojas'][$j] . ";</script>";
              $j++;
            }
        }else {

            while($z<sizeof($_SESSION["periodo"])){   
          
                echo "<script>pesoCepasTotalPorDia[$z] = " . (float)$_SESSION["pesoCepasTotalPorDia"][$z] . ";</script>";
                echo "<script>pesoCepasTotalPorDiaPerdido[$z] = " .(float) $_SESSION["pesoCepasTotalPorDiaPerdido"][$z] . ";</script>";
                echo "<script>tamanoHojasPorDia[$z] = " .(float) $_SESSION["tamanoHojasPorDia"][$z] . ";</script>";
                $z++;         
            } 
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

    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="excanvas.js"></script><![endif]-->
<script language="javascript" type="text/javascript" src="../../jquery.jqplot.1.0.9.d96a669/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="../../jquery.jqplot.1.0.9.d96a669/jquery.jqplot.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../jquery.jqplot.1.0.9.d96a669/jquery.jqplot.css" />

<script type="text/javascript" src="../../jquery.jqplot.1.0.9.d96a669/jquery.jqplot.js"></script>
<script type="text/javascript" src="../../jquery.jqplot.1.0.9.d96a669/plugins/jqplot.cursor.js"></script>
<script type="text/javascript" src="../../jquery.jqplot.1.0.9.d96a669/plugins/jqplot.dateAxisRenderer.js"></script>
<script type="text/javascript" src="../../jquery.jqplot.1.0.9.d96a669/plugins/jqplot.logAxisRenderer.js"></script>
<script type="text/javascript" src="../../jquery.jqplot.1.0.9.d96a669/plugins/jqplot.canvasTextRenderer.js"></script>
<script type="text/javascript" src="../../jquery.jqplot.1.0.9.d96a669/plugins/jqplot.canvasAxisTickRenderer.js"></script>



    <!-- page script -->
    <script type="text/javascript">

       

          
          google.load('visualization', '1.1', {packages: ['line']});
          google.setOnLoadCallback(generarGraficas);     


          function generarGraficas(){
              
              //setTimeout(function(){  graficaPrueba();}, 0);         
              graficaDatosClimaticos();
          }


          function graficaDatosClimaticos(){

             /*$(document).ready(function(){
                goog = [  ["6/22/2009",425.32,324], ["6/8/2009",424.84,345], ["5/26/2009",417.23,887], ["5/11/2009",390,7667], 
                ["4/27/2009",393.69,4564], ["4/13/2009",392.24,4564], ["3/30/2009",369.78,4564], ["3/16/2009",330.16], ["3/2/2009",308.57], 
                ["2/17/2009",346.45], ["2/2/2009",371.28], ["1/20/2009",324.7], ["1/5/2009",315.07], ["12/22/2008",300.36], 
                ["12/8/2008",315.76], ["11/24/2008",292.96], ["11/10/2008",310.02], ["10/27/2008",359.36], ["10/13/2008",372.54],
                ["9/29/2008",386.91], ["9/15/2008",449.15], ["9/2/2008",444.25], ["8/25/2008",463.29],  ["8/11/2008",510.15], 
                ["7/28/2008",467.86], ["7/14/2008",481.32], ["6/30/2008",537], ["6/16/2008",546.43], ["6/2/2008",567], 
                ["5/19/2008",544.62], ["5/5/2008",573.2], ["4/21/2008",544.06], ["4/7/2008",457.45], ["3/24/2008",438.08], 
                ["3/10/2008",437.92], ["2/25/2008",471.18], ["2/11/2008",529.64], ["1/28/2008",515.9], ["1/14/2008",600.25], 
                ["12/31/2007",657], ["12/17/2007",696.69], ["12/3/2007",714.87], ["11/19/2007",676.7], ["11/5/2007",663.97], 
                ["10/22/2007",674.6], ["10/8/2007",637.39], ["9/24/2007",567.27], ["9/10/2007",528.75], ["8/27/2007",515.25] ];*/
              
                //goog = [[datosGraficaFechaFichero[0],datosGraficaTempe[0],datosGraficaLluvia[0],datosGraficaHumedad[0]]];
               

               var tempe = [];
               var lluvia = [];
               var humedad = [];


               for(var i= 0;i<periodo;i++){
              
                tempe[i] = [datosGraficaFechaFichero[i],datosGraficaTempe[i] ];
                lluvia[i] = [datosGraficaFechaFichero[i],datosGraficaLluvia[i] ];
                humedad[i] = [datosGraficaFechaFichero[i],datosGraficaHumedad[i] ];

              }


                var plot1 = $.jqplot('chart1', [tempe,lluvia,humedad], { 
                    title: 'Datos climáticos', 
                    series: [{ 
                        label: 'fdias', 
                        neighborThreshold: -1 
                    }], 
                    axes: { 
                        xaxis: { 
                            renderer:$.jqplot.DateAxisRenderer,
                            tickRenderer: $.jqplot.CanvasAxisTickRenderer,
                            tickOptions: {
                              angle: -30
                            } 
                        }, 
                        yaxis: {  
                            renderer: $.jqplot.LogAxisRenderer,
                            tickOptions:{ prefix: '$' } 
                        } 
                    }, 
                    cursor:{
                        show: true, 
                        zoom: true
                    }
                });
          

$(document).ready(function(){
  //var plot2 = $.jqplot ('chart1', [[3,7,9,1,5,3,8,2,5], [6,9,8,2,5,9,17,4,6]], {
    var plot2 = $.jqplot ('chart2', [pesoCepasTotal,pesoCepasTotalPerdido,tamanoTotalHojas], {
      // Give the plot a title.
      title: 'totales de cepa',
      // You can specify options for all axes on the plot at once with
      // the axesDefaults object.  Here, we're using a canvas renderer
      // to draw the axis label which allows rotated text.
      axesDefaults: {
        labelRenderer: $.jqplot.CanvasAxisLabelRenderer
      },
      // Likewise, seriesDefaults specifies default options for all
      // series in a plot.  Options specified in seriesDefaults or
      // axesDefaults can be overridden by individual series or
      // axes options.
      // Here we turn on smoothing for the line.
      seriesDefaults: {
          rendererOptions: {
              smooth: true
          }
      },
      // An axes object holds options for all axes.
      // Allowable axes are xaxis, x2axis, yaxis, y2axis, y3axis, ...
      // Up to 9 y axes are supported.
      axes: {
        // options for each axis are specified in seperate option objects.
        xaxis: {
          label: "X Axis",
          // Turn off "padding".  This will allow data point to lie on the
          // edges of the grid.  Default padding is 1.2 and will keep all
          // points inside the bounds of the grid.
          pad: 0
        },
        yaxis: {
          label: "Y Axis"
        }
      }
    });
});
           
          }

      </script>
  </body>
</html>
