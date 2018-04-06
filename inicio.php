<?php
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
    <th> Total </th>
    <th> Motivo </th>
    </tr>    
    <?php
    $datos = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,0,1,2,3,4,5,6,7,8,9,10,11,12,13);
    
    
    for($a=0;$a<30;$a++){
    $flag=0;
    foreach($datos as $dato){
        if($flag==0){
            echo "<tr>";
            echo "<td> </td>";
        }
        echo "<td> ".$dato."-".$flag."</td>";
        $flag+=1;
        if($flag==7){
            echo "</tr>";
            $flag=0;
        }

    }
}
    ?>
        
    </table>
    </div>
</body>
</html>