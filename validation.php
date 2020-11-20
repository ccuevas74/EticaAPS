<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>validation</title>
    <link rel="icon" href="https://i1.sndcdn.com/avatars-hRCsgCWNy7pgX1cg-drI9DA-t500x500.jpg">
</head>
<body id="miBody">

<h1>Pagina de validacion</h1>

<?php

    if(isset($_GET['username']) && isset($_GET['validationId']) && isset($_GET['flag'])){
        $user = $_GET['username'];
        $validationId = $_GET['validationId'];
        $flag = $_GET['flag'];
        $errorMsg = "Error al consultar base de datos";


        $mysqli = new mysqli('127.0.0.1','root','','aps');
        
        if($mysqli->connect_errno){
            echo ("No hay conexion");
        }
        
        $comando = "SELECT * FROM usuarios WHERE username='$user';";
        if(!$resultado = $mysqli->query($comando)){
            echo ("Error");
        }
        else{
            if($flag == 'true'){
                if($resultado->num_rows!=0){
                    echo ("Usuario ya suscrito");
                }
                else{
                    $comando = "SELECT * FROM pendientes WHERE username='$user';";
                    if(!$resultado = $mysqli->query($comando)){
                        echo ($errorMsg);
                    }
                    else{
                        if($resultado->num_rows === 0){
                            echo("Usuario sin esperar validacion");
                        }
                        else{
                            $comando = "SELECT * FROM pendientes WHERE username='$user' AND semilla='$validationId'";
                            if(!$resultado = $mysqli->query($comando)){
                                echo ($errorMsg);
                            }
                            else{
                                if($resultado->num_rows === 1){
                                    $comando = "INSERT INTO usuarios (username) VALUES ('$user');";
                                    if(!$resultado = $mysqli->query($comando)){
                                        echo ($errorMsg);
                                    }
                                    else{
                                        echo ("Usuario validado correctamente");
                                    }
                                }
                                else{
                                    echo ("Enlace caducado");
                                }
                            }
                        }
                    }
                }
            }
            else{
                echo ("Borrar usuario ");

            }
    }
    }
    else{
        echo ("Pagina no existe");
    }


?>


</body>
</html>

