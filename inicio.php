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

    <div>
    
    </div>
</body>
</html>