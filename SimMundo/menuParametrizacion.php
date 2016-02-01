<html>
<head>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>

<!--  interfaz  -->



<div class="container">
  <form class="form-horizontal" role="form" method = "post" action="">
    <div class="form-group">
      <label  class="col-lg-2 control-label">Número de cepas: </label>
      <div class="col-lg-2">
        <input type="text" class="form-control" name="numeroCepas" placeholder="Numero de cepas">
      </div>
    </div>
    <br> <br>
    <!--Cantidades de referencia de factores ambientales -->

    <label><h4>Referencia de factores ambientales con respecto a la UVA.</h4></label>
    <div class="form-group">
      <label  class="col-lg-2 control-label">Referencia de litros de lluvia</label>
      <div class="col-lg-2">
        <input type="text" class="form-control" name="referenciaLluviaUva" placeholder="Lluvia" >
      </div>
    </div>
    <div class="form-group">
      <label  class="col-lg-2 control-label">Referencia temperatura</label>
      <div class="col-lg-2">
        <input type="text" class="form-control" name="referenciaTemperaturaUva" placeholder="Temperatura" >
      </div>
      
    </div>
    <label><h4>Porcentajes de crecimiento segun los factores ambientales de la UVA</h4></label>
    <div class="form-group">
      <label  class="col-lg-2 control-label">Porcentaje de crecimiento de la UVA</label>
      <div class="col-lg-2">
        <input type="text" class="form-control" name="porcentajeCrecimientoLluviaUva" placeholder="Porcentaje">
      </div>
    </div>

    <br><br>
   

   <label><h4>Referencia de factores ambientales con respecto a la HOJA.</h4></label>
    <div class="form-group">
      <label  class="col-lg-2 control-label">Referencia de litros de lluvia</label>
      <div class="col-lg-2">
        <input type="text" class="form-control" name="referenciaLluviaHoja" placeholder="Lluvia">
      </div>
    </div>
    <div class="form-group">
      <label  class="col-lg-2 control-label">Referencia temperatura</label>
      <div class="col-lg-2">
        <input type="text" class="form-control" name="referenciaTemperaturaHoja" placeholder="Temperatura">
      </div>
      
    </div>
    <label><h4>Porcentajes de crecimiento segun los factores ambientales de la HOJA</h4></label>
    <div class="form-group">
      <label  class="col-lg-2 control-label">Porcentaje de crecimiento de la HOJA</label>
      <div class="col-lg-2">
        <input type="text" class="form-control" name="porcentajeCrecimientoLluviaHoja" placeholder="Porcentaje">
      </div>
    </div>

    <br><br>


    <label><h4>Referencia de factores ambientales con respecto a la HONGO.</h4></label>
    <div class="form-group">
      <label  class="col-lg-2 control-label">Referencia de litros de lluvia</label>
      <div class="col-lg-2">
        <input type="text" class="form-control" name="referenciaLluviaHongo" placeholder="Lluvia" value="3">
      </div>
    </div>
    <div class="form-group">
      <label  class="col-lg-2 control-label">Referencia temperatura</label>
      <div class="col-lg-2">
        <input type="text" class="form-control" name="referenciaTemperaturaHongo" placeholder="Temperatura" value="11">
      </div>
      
    </div>
    <label><h4>Porcentajes de crecimiento segun los factores ambientales de la HONGO</h4></label>
    <div class="form-group">
      <label  class="col-lg-2 control-label">Porcentaje de crecimiento de la HONGO</label>
      <div class="col-lg-2">
        <input type="text" class="form-control" name="porcentajeCrecimientoLluviaHongo" placeholder="Porcentaje" value="0.4">
      </div>
    </div>

    <br><br>
 



    <input type="submit"  name="submit" value="Guardar">
  </form>
</div>

</body>
</html>