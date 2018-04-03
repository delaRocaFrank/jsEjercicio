<?php
session_start();
if(empty($_SESSION['username'])){
    header("location:login");
}else{
    echo $_SESSION['username'];
}



?>
<html>
<title>Placa</title>
<link rel="stylesheet" href="es1.css">
<body>
    <nav id="main-nav" class="autofix">
        <div id="nav-wrap">
            <ul>
            
            <li id="inicio"><a href="inicio"><img src="./images/home2.png"></a></li>
            <li>
                <a href="#">Placas</a>
                <ul>
                <a href="addplaca"><li>Añadir</li></a>
                <a href="delplaca"><li>Eliminar</li></a>   
                </ul>
            <li id="cierre"><a href="logout" ><img src="./images/logout.png"></a></li>
            </ul>
        </div>
    </nav>

    <div class="wrapper">
        <form class="form-horizontal tasi-form" id="signupForm" action="prueba2" method="POST">
            <div class="form-group">
                        <div>
                            <h2>Tipo de Vehículo</h2>
                            <div>
                                <select name="tPlaca" class="form-control">
                                <option value="P" selected="">P</option>
                                <option value="C">C</option>
                                <option value="M">M</option>
                                <option value="A">A</option>
                                <option value="U">U</option>
                                <option value="CD">CD</option>
                                <option value="MI">MI</option>
                                <option value="DIS">DIS</option>
                                <option value="O">O</option>
                                <option value="CC">CC</option>
                                <option value="E">E</option>
                                <option value="EXT">EXT</option>
                                <option value="TC">TC</option>
                                <option value="TRC">TRC</option>
                                </select>
                            </div>
                        </div>
                      
            </div>
                
            <div>
                <div class="form-group">
                    <h2>Número de Placa</h2>
                    <div>
                        <input type="text" name="placa" id="placa" class="form-control"
                         placeholder="123ABC" maxlength="6"
                         required
                         pattern="[0-9][0-9][0-9][A-z][A-z][A-z]">
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn" value="Enviar">
                </div>
            </div>
        </form>
    </div>

</body>
</html>