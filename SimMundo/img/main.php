<!DOCTYPE>
<html>
 
<head>
   
</head>
 
<body>
<div align="right">
	<form  method ="post" action = "" >	
		<div>
			<div> <input type= "text" name="numeroCepas" placeholder="Numero de cepas" ></div>
			<div> <input type= "text" name="crecimientoUva" placeholder="crecimientoUva" ></div>
			<div> <input type= "text" name="crecimientoHoja" placeholder="crecimientoHoja" ></div>
			<div> <input type= "text" name="crecimientoHongo" placeholder="crecimientoHongo" ></div>
			<div> <input type= "submit" name="submit"value="guardar"></div>
		</div>
	</form>
</div>

<?php  


	if(isset($_POST["submit"])){
		$numeroCepas = $_POST["numeroCepas"];
	}

?>
<div>
	<table>
	    <tr align="center">
	    	<?php 
	    		for ($i=0; $i < $numeroCepas; $i++) { 
	    			# code...
	    		

	    	?>
	    	
	        <td width="50px" height="50px"><img src="cepaInicial.jpeg" width="50px" height="50px"></td>
	       
	        <?php 
	    		
	    			
	    		}

	    	?>
	    </tr>


	</table>



</div>





</body>
</html>








