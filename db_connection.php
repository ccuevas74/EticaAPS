<?php
    /* - - - - - - - - - - - - - */
    /* 3. Database Connection */
    
    // Variables de la conexión a la base de datos
    $host = '127.0.0.1';
    $username = 'root';
    $password = '5552483790354';
    $db = 'validationemail';
    $port = "3307";
    $link = mysqli_connect($host,$username,$password,$db,$port);

    if(!$link)
    {
        echo "Error conectando a la base de datos";
        exit;
    }
?>