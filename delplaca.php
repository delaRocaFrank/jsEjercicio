<?php
require_once 'config.php';
session_start();
if(empty($_SESSION['username'])){
    header("location:login");
}


?>

<html>
<title>Placa</title>
<link rel="stylesheet" href="es1.css">
<head>
<?php 
    include('header.html');
?>
</head>
<body>
<div class="wrapper">
        <form class="form-horizontal tasi-form" id="signupForm" action="delplaca-form" method="POST">
            <div class="form-group">
                        <div>
                            <h2>Placa del Vehículo</h2>
                            <div>
                                    <select name="placa" class="form-control">
                                    <?php
                                        $sql = "SELECT placa FROM placas WHERE correo = ?";
        
                                        if($stmt = mysqli_prepare($conn, $sql)){

                                        $param_username =  $_SESSION['username'];
                                        if ($resultado = $conn->query("SELECT placa FROM placas WHERE correo = '".$param_username."'")) {
                                        
                                        while($row = $resultado->fetch_assoc()){
                                            echo "<option value=\"".$row['placa']."\">".$row['placa']."</option>\n\t\t\t\t\t\t\t\t\t";
                                        }
                                        }
                                        
                                        
                                        
                                        else{
                                            echo "fail";
                                            }

                                        }
                                    ?>
</select>
                                </div>
                            </div>  
                      
                        </div>

                <div class="form-group">
                    <input type="submit" class="btn" value="Eliminar">
                </div>
            </div>
        </form>
    </div>


</body>
</html>