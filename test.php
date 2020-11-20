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
    if(isset($_GET['username'])){
        echo("Bien");
    }
    else{
        echo("Mal");
    }

?>


</body>
</html>

