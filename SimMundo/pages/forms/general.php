<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | General Form Elements</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker-bs3.css">

    
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

      
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
           <?php
              include("../../Class/ClassDato.php");
              include("../../Class/ClassPaisano.php");
                 //inicio sesion para guaradar el bojeto de claseDato
              session_start();

              //uso esta variable de sesion para controlar que se haya metido los datos del formualrio
              //para luego comprobar en el ejecucionSimulacion si se metieron o no
              //y en el caso de no haberse metido no dejar dar al boton de simular.
              $_SESSION['introducidoDatos'] = 0;
      

             include("../../menuLateral.html");

          ?>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            General Form Elements
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
           
            <!-- right column -->
            <div class="col-md-8">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Formulario de parametrización</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                  <div class="box-body">

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Número de simulaciones: </label>
                      <div  class="col-sm-10">
                        <input type="text" class="form-control" name="numeroSimulaciones" placeholder="Numero de simulaciones" value="10">
                      </div>
                    </div>


                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Número de sulfatos: </label>
                      <div  class="col-sm-10">
                        <input id="numeroSulfatos" type="text" class="form-control" name="numeroFechasSulfatos" placeholder="Numero de sulfatos" value="2" onblur="generarDiasSulfato()">
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Date masks:</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name = "sulfatada0" value= "15/06/2015" >
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->



                  <div class="form-group">
                      <label>Date masks:</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name = "sulfatada1" value= "15/08/2015">
                      </div><!-- /.input group -->
                    </div><!-- /.form group -->



                   

                    <!-- espacio para poner los calendar que se generan   -->
                    <div  id="divControl">

                    </div>
                 

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Número de días de efecto: </label>
                      <div  class="col-sm-10">
                        <input type="text" class="form-control" name="diasEfectoSulfato" placeholder="Número de días de efecto:" value="30">
                      </div>
                    </div>

                    <!-- Date range -->
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Rango de crecimiento:</label>
                    <div class="col-sm-10">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right"  id="reservation" name = "rangoMesCrecimiento" value = "01/06/2015 - 30/09/2015">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  </div>


                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Número de cepas: </label>
                      <div  class="col-sm-10">
                        <input type="text" class="form-control" name="numeroCepas" placeholder="Numero de cepas" value="10">
                      </div>
                    </div>

                    <label><h4>Referencia de factores ambientales con respecto a la UVA.</h4></label>
                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Referencia de litros de lluvia</label>
                      <div  class="col-sm-10">
                        <input type="text" class="form-control" name="referenciaLluviaUva" placeholder="Lluvia" value="10">
                      </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Referencia temperatura</label>
                      <div  class="col-sm-10">
                        <input type="text" class="form-control" name="referenciaTemperaturaUva" placeholder="Temperatura" value="10">
                      </div>
                      
                    </div>
                    <label><h4>Porcentajes de crecimiento segun los factores ambientales de la UVA</h4></label>
                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Porcentaje de crecimiento de la UVA</label>
                      <div  class="col-sm-10">
                        <input type="text" class="form-control" name="porcentajeCrecimientoUva" placeholder="Porcentaje" value="0.4">
                      </div>
                    </div>

                    <label><h4>Referencia de factores ambientales con respecto a la HOJA.</h4></label>
                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Referencia de litros de lluvia</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="referenciaLluviaHoja" placeholder="Lluvia" value="16">
                      </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Referencia temperatura</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="referenciaTemperaturaHoja" placeholder="Temperatura" value="11">
                      </div>                      
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Numero de hojas de la cepa</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="numeroHojas" placeholder="Hojas" value="7">
                      </div>
                    </div>



                    <label><h4>Porcentajes de crecimiento segun los factores ambientales de la HOJA</h4></label>
                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Porcentaje de crecimiento de la HOJA</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="porcentajeCrecimientoHoja" placeholder="Porcentaje" value="0.4">
                      </div>
                    </div>


                    <label><h4>Referencia de factores ambientales con respecto al HONGO.</h4></label>
                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Referencia de litros de lluvia</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="referenciaLluviaHongo" placeholder="Lluvia" value="3">
                      </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Referencia temperatura</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="referenciaTemperaturaHongo" placeholder="Temperatura" value="11">
                      </div>
                      
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Referencia humedad inicio</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="referenciaHumedadHongo" placeholder="Humedad" value="60">
                      </div>                      
                    </div>


                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Porcentaje de probabilidad de crecimiento del hongo</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="porcentajeProbabilidadHumedadHongo" placeholder="Porcentaje crecimiento" value="0.2">
                      </div>                      
                    </div>

                    <label><h4>Porcentajes de crecimiento segun los factores ambientales del HONGO</h4></label>
                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Porcentaje de crecimiento del HONGO</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="porcentajeCrecimientoHongo" placeholder="Porcentaje" value="0.4">
                      </div>
                    </div>
                    <br>
                    <label><h4>Archivo de datos climáticos</h4></label>
                    <div class="form-group">  
                        <label for="exampleInputFile" class="col-sm-2 control-label">Archivo</label>
                        <div class="col-sm-10">
                          <input type="file" id="exampleInputFile" name="archivo" >
                          
                        </div>
                    </div>
                  </div>  
                  <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-primary" >Guardar datos</button>
                  </div> 

                </form>
              </div><!-- /.box -->
              <!-- general form elements disabled -->
             
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>

     
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>


    <?php

        ///recojo la varaible del numero de fechas de sulfatada que va hacerse.
      


        
        $clasePaisano = new ClassPaisano;
        $claseDato = new ClassDato;
  
      if(isset($_POST["submit"])){

       
         
        $_SESSION['introducidoDatos'] = 1;
        $claseDato->setNumeroCepas($_POST["numeroCepas"]);
        $claseDato->setNumeroSimulaciones($_POST["numeroSimulaciones"]);
        $claseDato->cortarFechasRango($_POST["rangoMesCrecimiento"]);

        //datos de uva
        $claseDato->setReferenciaLluviaUva($_POST["referenciaLluviaUva"]);
        $claseDato->setReferenciaTemperaturaUva($_POST["referenciaTemperaturaUva"]);
        $claseDato->setPorcentajeCrecimientoUva($_POST["porcentajeCrecimientoUva"]);

          //datos de hoja
        $claseDato->setReferenciaLluviaHoja($_POST["referenciaLluviaHoja"]);
        $claseDato->setReferenciaTemperaturaHoja($_POST["referenciaTemperaturaHoja"]);
        $claseDato->setPorcentajeCrecimientoHoja($_POST["porcentajeCrecimientoHoja"]);
        $claseDato->setNumeroHojas($_POST["numeroHojas"]);

          //datos de hongo
        $claseDato->setReferenciaLluviaHongo($_POST["referenciaLluviaHongo"]);
        $claseDato->setReferenciaTemperaturaHongo($_POST["referenciaTemperaturaHongo"]);
        $claseDato->setReferenciaHumedadHongo($_POST["referenciaHumedadHongo"]);
        $claseDato->setPorcentajeCrecimientoHongo($_POST["porcentajeCrecimientoHongo"]);
        $claseDato->setPorcentajeProbabilidadHumedadHongo($_POST["porcentajeProbabilidadHumedadHongo"]);


        $arrayFechasSulfato = array();
        /*$arrayFechasSulfato[0] = $_POST["fechaSulfato0"];
        $arrayFechasSulfato[1] = $_POST["fechaSulfato1"];
        $arrayFechasSulfato[2] = $_POST["fechaSulfato2"];*/


        //recojo el valor de cuantasfechas se van introducir y luego recorro todas $_POST dpara recvojer los valores
        if(isset($_POSt["sulfatada0"])){
          for ($i=1; $i< $_POST["numeroFechasSulfatos"] +1 ; $i++){
            $arrayFechasSulfato[$i] = $_POST["sulfatada".$i];
            $arrayFechasSulfato[$i];
          }  
        }
        
 
        //recojo los datos para la clase paisano
        $clasePaisano->setNumeroFechasSulfatos($_POST["numeroFechasSulfatos"]);
        $clasePaisano->setFechasSulfato($arrayFechasSulfato);
        $clasePaisano->setDuracionSulfato($_POST["diasEfectoSulfato"]);

        //Poner decente para comprobar tamaño y  esas cosas del archivo

        $dir_subida = '../../carpetaDatos/';
        $fichero_subido = $dir_subida . basename($_FILES["archivo"]['name']);

        
        move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido);
           


        //voy intuir que todos los datos tienen que ser metidos obligatoriament
        //de esta manera recojo en una varible que los datos han sido metidos 
        //para poder ejecuar la accion de simulacion en la otra ventana


        //cuando se mete un objeto en una variable de sesion hay que meterla con serialize y luego cuando se 
        //quieran quitar los datos de unserialize(que se usa en la ejecuconSimulacion.php)
        $_SESSION["claseDato"] = serialize($claseDato);
        $_SESSION["clasePaisano"] = serialize($clasePaisano);

      }



      ?>  
     <!-- jQuery 2.1.4 -->
   
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="../../plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="../../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="../../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->

    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Page script -->
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },

      function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>

     <script>
                    

                      //consultar a rodeiro si estaria bien, aunque creo k si
                      var cont = 0;
                    function generarDiasSulfato() {
                        


                        if(cont == 0){
                          cont = document.getElementById("numeroSulfatos").value;
                          cont = parseInt(cont);                  
                          var $padre = $("#fechasSulfatos");
                          var alias = "alias";
                          var fech = "dd/mm/yyyy";

                          for(var i=1 ;i < cont+1; i++){
                            $("#divControl").append('<div class="form-group" id="fechasSulfatos'+i+'"><label class="col-sm-2 control-label"> '+i+'ª sulfatada:</label><div class="col-sm-10"><div class="input-group"> <div class="input-group-addon"><i class="fa fa-calendar"></i></div> <input type="text" name="sulfatada'+i+'" class="form-control" data-inputmask="\''+alias+'\':\''+fech+'\'" data-mask>  </div></div></div>');
                          }

                          $(document).ready(function(){
                              $(":input").inputmask();
                           
                          });

                        }else{
                            
                            for (var j = 1; j < cont +1; j++) {
                              $("#fechasSulfatos"+j).remove();                         
                            };                            

                            cont = 0;
                            generarDiasSulfato();
                        }

                      
                    }
                        
                    </script>
  </body>
</html>
