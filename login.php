<?php
require_once 'config.php';
session_start();
$username = $password = "";
$username_err = $password_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT correo,password FROM Usuario WHERE correo = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
					
                    if(mysqli_stmt_fetch($stmt)){
                       
                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the username to the session */
							
                            
                            $_SESSION['username'] = $username;      
                            header("location: inicio");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'Contraseña incorrecta.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'Correo no registrado';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="es.css">
    <style type="text/css">
        }
    </style>
</head>
<body>
    /*Facebook login*/
<script>
var finished_rendering = function() {
  console.log("finished rendering plugins");
  var spinner = document.getElementById("spinner");
  spinner.removeAttribute("style");
  spinner.removeChild(spinner.childNodes[0]);
}
FB.Event.subscribe('xfbml.render', finished_rendering);
</script>
<div id="spinner"
    style="
        background: #4267b2;
        border-radius: 5px;
        color: white;
        height: 40px;
        text-align: center;
        width: 250px;">
    Loading
    <div
    class="fb-login-button"
    data-max-rows="1"
    data-size="large"
    data-button-type="continue_with"
    data-use-continue-as="true"
    ></div>
</div>

    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="/login" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>" >
                <input placeholder="Email" id="usuario" type="email" name="username"class="form-control" 
                value="<?php echo $username; ?>"
                required
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
                title="Direccion de correo incorrecta."
                >
                <span class="help-block"><?php echo $username_err; ?></span>    
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <input placeholder="Contraseña" id="contraseña" type="password" name="password" class="form-control"
                required>
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" value="Login">
            </div>
        </form>
            <p>¿No tienes una cuenta? <a href="register">Registrate aquí.</a>.</p>
        
    </div> 
    <footer>
        Derechos Reservados &copy; 2018
    </footer> 

</body>
</html>
