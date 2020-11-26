<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Validation Page</title>
    <link rel="icon" href="https://i1.sndcdn.com/avatars-hRCsgCWNy7pgX1cg-drI9DA-t500x500.jpg">
</head>
<body id="miBody">

<h1>Pagina de validacion</h1>

<?php

     /* - - - - - - - - - - - - - */
     /* 5. Account Activation */
    if(isset($_GET['hash']) && isset($_GET['flag'])){
        $validationId = $_GET['hash'];
        $flag = $_GET['flag'];
        $errorMsg = "Error al consultar base de datos";


        $mysqli = new mysqli('127.0.0.1','root','5552483790354','validationemail','3307');                                                                                                                  
        
        if($mysqli->connect_errno){
            echo ("No hay conexion");   
        }
        
        $comando = "SELECT * FROM users WHERE hash='$validationId'";
        if(!$resultado = $mysqli->query($comando)){
            echo ("Error: ".$mysqli->connect_errno);
        }
        else{
            if($flag == 'true'){
                if($resultado->num_rows!=1){
                    echo ("Link desconocido");
                }
                else{
                    $comando = "UPDATE users SET active='1' WHERE hash='$validationId'";
                    if(!$resultado = $mysqli->query($comando)){
                        echo ($errorMsg);
                    }
                    else{
                            echo ("Validacion completada");
                    }
                }
            }
            else{
                $comando = "DELETE FROM users WHERE hash='$validationId'";
                if(!$resultado = $mysqli->query($comando)){
                    echo ($errorMsg);
                }
                else{
                        echo ("Usuario dado de baja con éxito");
                }
            }
        }
    }
    else{
        echo ("Pagina no existe");
    }


?>


</body>
</html>

