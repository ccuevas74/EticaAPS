<?php
    function createUser($link,$email)
    {
        $hash = mysqli_escape_string($link,md5(rand(0,1000))); 
        $valid_email = mysqli_escape_string($link,$email);

        $verify_user_query = mysqli_query($link,"SELECT * FROM users WHERE email = '$valid_email'");

        if(mysqli_num_rows($verify_user_query) > 0)
        {
            echo "El email introducido ya está registrado, por favor revise su correo.";
            exit;
        }
        else
        {
            $insert_data = "INSERT INTO users (email, hash) VALUES('$valid_email','$hash')";

            $execute = mysqli_query($link,$insert_data);
            if(!$execute)
            {
                echo "Error haciendo la query a la BBDD";
                exit;
            }
            else
                return $hash;
        }
    }
?>