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
</head>
<body>
    <nav id="main-nav" class="autofix">
        <div id="nav-wrap">
            <ul>
            
            <li id="inicio"><a href="">
                <img src="./images/home2.png"></a>
            </li>
            
            <li>
                <a href="#">Placas</a>
                <ul>
                <a href="addplaca"><li>Añadir</li></a>
                <a href="delplaca"><li>Eliminar</li></a>   
                </ul>
            </li>
                
            <li id="cierre">
                <a href="#" >
                <?php
                     $name=explode("@",$_SESSION['username']);

                     echo ($name[0]);
                ?>
                </a>
                <ul>
                <a href=""><li>Ajustes</li></a>
                <a href="logout"><li>Salir</li></a>
                </ul>
            </li>
            
            </ul>
        </div>
    </nav>
    <div>
    
    </div>
</body>
</html>