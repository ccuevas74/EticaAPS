<!DOCTYPE html>
<html>
<head>
    <title>APS | Backend</title>
</head>
<body>
    <!-- start header div -->
    <div id="header">
        <h3> Registrar Email </h3>
    </div>
    <!-- end header div -->  
      
    <!-- start wrap div -->  
    <div id="wrap">
      
        <!-- title and description -->   
        <p>Rellena todos los campos</p>
          
        <!-- start sign up form -->  
        <form action="" method="post">
            <label for="email">Email:</label>
            <input type="text" name="email" value="" />
              
            <input type="submit" class="submit_button" value="Sign up" />
        </form>
        <!-- end sign up form -->

        <!-- start PHP code -->
        <?php
        include 'db_connection.php';
        include 'createNewUser.php';
        include 'sendEmail.php';

        // 1. User Input Validation
        
        if(isset($_POST['email']) && !empty($_POST['email']))
        {
            $email = $_POST['email'];
            $flag = 0;

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                $msg = "Formato email inválido";
            else
            {
                // 2. Database Connection and Insert Account Query

                $user_hash = createUser($link,$email);
                
                $msg = 'Se ha creado tu cuenta, por favor comprueba el correo electrónico.'; 
                $flag = 1;           
            }  
            echo '<div class="statusmsg">'.$msg.'</div>';

            if($flag) // If connection with db and query ACK, then...
            {
                // 3. Sending Verification Email
                $emailSent = sendEmail($email,$user_hash);
                if($emailSent)
                    echo "Mensaje enviado con éxito!";
                else
                    exit;
            }
        } 
        ?>
        <!-- stop PHP Code -->
          
    </div>
    <!-- end wrap div -->
</body>
</html>
