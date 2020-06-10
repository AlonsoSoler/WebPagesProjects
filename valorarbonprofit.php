<html>
<head>
</head>
<body>
<h1>Valore nuestro servicio</h1>
<form action="" method="post">
<table>
   <tr>
      <td><th>Calidad de la comida</th></td>
      <td> <input type="radio" name="a" value="1" required>1</td>
	  <td> <input type="radio" name="a" value="2">2</td>
	  <td> <input type="radio" name="a" value="3">3</td>
	  <td> <input type="radio" name="a" value="4">4</td>
	  <td> <input type="radio" name="a" value="5">5</td>
	  <td> <input type="radio" name="a" value="6">6</td>
	  <td> <input type="radio" name="a" value="7">7</td>
	  <td> <input type="radio" name="a" value="8">8</td>
	  <td> <input type="radio" name="a" value="9">9</td>
	  <td> <input type="radio" name="a" value="10">10</td>
	</tr>
	<tr>  
	  <td><th>Calidad del servicio</th></td>
      <td> <input type="radio" name="b" value="1" required>1</td>
	  <td> <input type="radio" name="b" value="2">2</td>
	  <td> <input type="radio" name="b" value="3">3</td>
	  <td> <input type="radio" name="b" value="4">4</td>
	  <td> <input type="radio" name="b" value="5">5</td>
	  <td> <input type="radio" name="b" value="6">6</td>
	  <td> <input type="radio" name="b" value="7">7</td>
	  <td> <input type="radio" name="b" value="8">8</td>
	  <td> <input type="radio" name="b" value="9">9</td>
	  <td> <input type="radio" name="b" value="10">10</td>
	 </tr> 
	 <tr>
	  <td><th>Calidad del producto</th></td>
      <td> <input type="radio" name="c" value="1" required>1</td>
	  <td> <input type="radio" name="c" value="2">2</td>
	  <td> <input type="radio" name="c" value="3">3</td>
	  <td> <input type="radio" name="c" value="4">4</td>
	  <td> <input type="radio" name="c" value="5">5</td>
	  <td> <input type="radio" name="c" value="6">6</td>
	  <td> <input type="radio" name="c" value="7">7</td>
	  <td> <input type="radio" name="c" value="8">8</td>
	  <td> <input type="radio" name="c" value="9">9</td>
	  <td> <input type="radio" name="c" value="10">10</td>
	 </tr>
     <tr>	 
	   <td><th>Calidad de las instalaciones</th></td>
      <td> <input type="radio" name="d" value="1" required>1</td>
	  <td> <input type="radio" name="d" value="2">2</td>
	  <td> <input type="radio" name="d" value="3">3</td>
	  <td> <input type="radio" name="d" value="4">4</td>
	  <td> <input type="radio" name="d" value="5">5</td>
	  <td> <input type="radio" name="d" value="6">6</td>
	  <td> <input type="radio" name="d" value="7">7</td>
	  <td> <input type="radio" name="d" value="8">8</td>
	  <td> <input type="radio" name="d" value="9">9</td>
	  <td> <input type="radio" name="d" value="10">10</td>
	</tr>  
 </table>
 <br>
	 <table>
	  <tr>
	   Observaciones <br>
	   <textarea id="observaciones" name="observaciones" cols="80" rows="8"></textarea>
	   </tr>
	   </table>
       <input type="submit" name="enviar" value="Enviar formulario">     
   </table>
   
   <?php
 $host="localhost";
$puerto="3307";
$usuario="root";
$contrasena="usbw";
$baseDeDatos ="bon_profit";
$tabla="valoracion";
function Conectarse()    
{     
	global $host, $puerto, $usuario, $contrasena, $baseDeDatos, $tabla; 
	
   $link = mysqli_connect($host.":".$puerto, $usuario, $contrasena);    
    mysqli_select_db($link,$baseDeDatos); 
    return $link;
}	
	$link=Conectarse();
   if (isset($_POST['enviar']))
   {
         $comida=$_POST['a'];
	    
			
		 $servicio=$_POST['b'];
		
			
		 $producto=$_POST['c'];
		 
			
         $instalaciones=$_POST['d'];
	     
			
		 $observaciones=$_POST['observaciones'];
		 
		 
		 $queryInsert = "INSERT INTO $tabla (comida, servicio, producto, instalaciones, observaciones) VALUES ('$comida','$servicio','$producto','$instalaciones','$observaciones');";
		 $resultInsert = mysqli_query($link, $queryInsert);
			}	
   
   mysqli_close($link); 
  
   ?>
</form> 

</body>
<br>
 <p><a href="opinionbonprofit.php">Ver opiniones</a></p>
</html>