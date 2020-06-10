<html>
<head><title>Opiniones</title></head>
<body>
<h1>Opiniones de nuestros clientes</h1><br>
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
	
	 $query="SELECT comida,servicio,producto,instalaciones,observaciones FROM $tabla;";
	 $querycomida="SELECT avg( total ) FROM (SELECT sum( comida ) AS total FROM $tabla GROUP BY codigo) AS tabla";
	 $queryservicio="SELECT avg( total ) FROM (SELECT sum( servicio ) AS total FROM $tabla GROUP BY codigo) AS tabla";
	 $queryproducto="SELECT avg( total ) FROM (SELECT sum( producto ) AS total FROM $tabla GROUP BY codigo) AS tabla";
	 $queryinstalaciones="SELECT avg( total ) FROM (SELECT sum( instalaciones ) AS total FROM $tabla GROUP BY codigo) AS tabla";
	 $result=mysqli_query($link, $query);
	 $resultcomida=mysqli_query($link, $querycomida);
	 $resultservicio=mysqli_query($link, $queryservicio);
	 $resultproducto=mysqli_query($link, $queryproducto);
	 $resultinstalaciones=mysqli_query($link, $queryinstalaciones);
	  $row1=mysqli_fetch_array($resultcomida);
	  $row2=mysqli_fetch_array($resultservicio);
	  $row3=mysqli_fetch_array($resultproducto);
	  $row4=mysqli_fetch_array($resultinstalaciones);
	 
	 
	 ?>
	 
	 <table border=2>
	 <tr>
	   <td>Calidad de comida</td>
	   <td>Calidad de servicio</td>
	   <td>Calidad de producto</td>
	   <td>Calidad de instalaciones</td>
	   <td>Observaciones</td>
	   </tr>
	 
	 <?php
   while($opinion = mysqli_fetch_array($result))
   {
       echo "<tr>";          
	   echo "<td>"; 
       echo $opinion["comida"];
	   echo "</td>";
       echo "<td>";
	   echo $opinion["servicio"];
       echo "</td>";	
       echo "<td>"; 
       echo $opinion["producto"];
	   echo "</td>";
	   echo "<td>"; 
       echo $opinion["instalaciones"];
	   echo "</td>";
       echo "<td>"; 
       echo $opinion["observaciones"];
	   echo "</td>";	   
	   echo "</tr>";
                       } 
	 
	?>
      </table>	
	  <br>
	  <table border=1>
	   <tr>
	   <td>Calidad media de comida</td>
	   <td>Calidad media de servicio</td>
	   <td>Calidad media de producto</td>
	   <td>Calidad media de instalaciones</td>
	   </tr>
	  <?php

	   echo "<tr>";          
	   echo "<td>"; 
       echo round($row1["avg( total )"],2);
	   echo "</td>";
       echo "<td>";
	   echo round($row2["avg( total )"],2);
       echo "</td>";	
       echo "<td>"; 
       echo round($row3["avg( total )"],2);
	   echo "</td>";
	   echo "<td>"; 
       echo round($row4["avg( total )"],2);
	   echo "</td>";	   
	   echo "</tr>";	
	   
   mysqli_free_result($result);
   mysqli_free_result($resultcomida);
   mysqli_free_result($resultservicio);
   mysqli_free_result($resultproducto);
   mysqli_free_result($resultinstalaciones);
   mysqli_close($link); 					   
 
   ?>
   </table>
  
</body>
</html>