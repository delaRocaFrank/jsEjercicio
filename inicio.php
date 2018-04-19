<?php
require_once 'config.php';
session_start();
if(empty($_SESSION['username'])){
    header("location:login");
}



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="es1.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
   <?php 
    include('header.html');
    ?>
</head>
<body> 

    <div id="sticky">
    <table>
    <tr>
    <th> Placa </th>
    <th> ID </th>
    <th> Fecha </th>
    <th> Lugar </th>
    <th> Monto </th>
    <th> Descuento </th>
    <th> Motivo </th>
    </tr>    
    <?php

    //llenar el array con los datos de las multas.
    
    $sql = "SELECT placa FROM placas WHERE correo = ?";
        
    if($stmt = mysqli_prepare($conn, $sql)){

    $param_username =  $_SESSION['username'];
    if ($resultado = $conn->query("SELECT placa FROM placas WHERE correo = '".$param_username."'")) {

    while($row = $resultado->fetch_assoc()){

                $datos=array();
                $placa=explode(" ",$row['placa']);

                 $url = "https://consultas.munimixco.gob.gt/vista/emixtra.php?tPlaca=".$placa[0]."&placa=".$placa[1];
                 
                 $ch = curl_init();
                 $timeout = 5;
                 curl_setopt($ch, CURLOPT_URL, $url);
                 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                 curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                 $html = curl_exec($ch);
                 curl_close($ch);
                 
                 # Create a DOM parser object
                 $dom = new DOMDocument();
                 
                 # Parse the HTML from Google.
                 # The @ before the method call suppresses any warnings that
                 # loadHTML might throw because of invalid HTML in the page.
                 @$dom->loadHTML($html);
                
                 $flag=99;
                 foreach($dom->getElementsByTagName('h6') as $link) {
                     if(($link->textContent == "Total" or $flag==14)) $flag=0;
                     if(($link->textContent == "Totales")) $flag=99;
                     
                         
                     if($flag!=99)
                     {
                         if($flag==1 or $flag==2 or $flag==3
                         or $flag==4 or $flag==5 or $flag==13)
                         {
                                 array_push($datos,$link->textContent);                                
                         }	
                     
                   
                         
                         }
                     $flag+=1;
                 } 
                 $datos=array(1,2,2,3,1,1,12,1,32,32,1,321,32,132,13,21,32,132,13,21,32,13,21,32,132,13,21,321,32,13,213,21,321,32,132,13,21,32,132,1,2,2,3,1,1,12,1,32,32,1,321,32,132,13,21,32,132,13,21,32,13,21,32,132,13,21,321,32,13,213,21,321,32,132,13,21,32,132,1,2,2,3,1,1,12,1,32,32,1,321,32,132,13,21,32,132,13,21,32,13,21,32,132,13,21,321,32,13,213,21,321,32,132,13,21,32,132,1,2,2,3,1,1,12,1,32,32,1,321,32,132,13,21,32,132,13,21,32,13,21,32,132,13,21,321,32,13,213,21,321,32,132,13,21,32,132,1,2,2,3,1,1,12,1,32,32,1,321,32,132,13,21,32,132,13,21,32,13,21,32,132,13,21,321,32,13,213,21,321,32,132,13,21,32,132,1,2,2,3,1,1,12,1,32,32,1,321,32,132,13,21,32,132,13,21,32,13,21,32,132,13,21,321,32,13,213,21,321,32,132,13,21,32,132,1,2,2,3,1,1,12,1,32,32,1,321,32,132,13,21,32,132,13,21,32,13,21,32,132,13,21,321,32,13,213,21,321,32,132,13,21,32,132,1,2,2,3,1,1,12,1,32,32,1,321,32,132,13,21,32,132,13,21,32,13,21,32,132,13,21,321,32,13,213,21,321,32,132,13,21,32,132,1,2,2,3,1,1,12,1,32,32,1,321,32,132,13,21,32,132,13,21,32,13,21,32,132,13,21,321,32,13,213,21,321,32,132,13,21,32,132,1,2,2,3,1,1,12,1,32,32,1,321,32,132,13,21,32,132,13,21,32,13,21,32,132,13,21,321,32,13,213,21,321,32,132,13,21,32,132,1,2,2,3,1,1,12,1,32,32,1,321,32,132,13,21,32,132,13,21,32,13,21,32,132,13,21,321,32,13,213,21,321,32,132,13,21,32,132,1,2,2,3,1,1,12,1,32,32,1,321,32,132,13,21,32,132,13,21,32,13,21,32,132,13,21,321,32,13,213,21,321,32,132,13,21,32,132,1);
                 $flag=0;
                 foreach($datos as $dato){
                     if($flag==0){
                        echo "<tr>";
                        echo "<td>".$row['placa']." </td>";

                     }
                     echo "<td> ".$dato."</td>";
                     $flag+=1;
                     
                     if($flag==6){
                         echo "</tr>";
                         $flag=0;
                     }
             
                 
                 }
       
    }
    }

    else{
        echo "fail";
        }

    }
    //display de los datos de las multas
    
   
   
    ?>
        
    </table>
    </div>
</body>
</html>