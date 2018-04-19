<?php
require_once 'config.php';
session_start();
if(empty($_SESSION['username'])){
    header("location:login");
}
$table_name= "";
$sql ="DELETE FROM `placas` WHERE `placas`.`correo` = ? AND `placas`.`placa` = ?";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_correo, $param_placa);
            
            // Set parameters
            $param_correo=$_SESSION["username"];
            $param_placa=$_POST["placa"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: delplaca");
            } else{
                echo "Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }else{
            echo "Something went wrong. Please try again later 2.";
        }
           


?>