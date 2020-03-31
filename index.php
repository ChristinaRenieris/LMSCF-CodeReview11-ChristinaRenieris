<?php
ob_start();
session_start();
require_once 'db_connect.php';

if ( isset($_SESSION['user' ])!="" ) {
 header("Location: home.php");
 exit;
}

$error = false;

if( isset($_POST['btn-login']) ) {

 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $password = trim($_POST[ 'password']);
 $password = strip_tags($password);
 $password = htmlspecialchars($password);


 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

    if (empty($password)){
        $error = true;
        $passError = "Please enter your password." ;
    }

 // if there's no error, continue to login
    if (!$error) {
    
        $pass = hash( 'sha256', $password);

        $res = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email'" );
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $count = mysqli_num_rows($res); 
    
        //(had session troubles after login) so i was testing
        // if( $count == 1 && $row['password'] == $pass ) {
        //     if($row['role'] == 'admin'){
        //         $_SESSION['id'] = $row['user_id'];
        //         $_SESSION['role'] = $row['role'];
        //     }
        //     elseif($row['role'] == 'user'){
        //         $_SESSION['id'] = $row['user_id'];
        //         $_SESSION['role'] = $row['role'];
        //     }
        //     header("Location: home.php");

        if( $count == 1 && $row['password'] == $pass ) {
            if($row['role'] == 'admin'){
                $_SESSION['admin'] = $row['user_id'];
            }
            elseif($row['role'] == 'user'){
                $_SESSION['user'] = $row['user_id'];
            }
            header("Location: home.php");

        }else {
            $errMSG = "Incorrect Credentials, Try again..." ;
        }
    
    }

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
        <style>
            #formBox{
                background-color: #4d0066;
            }
            body{
                background-color: #e6ffff;!important
            }
        </style>
        <title>Login</title>
    </head>
    <body>
        <div class="container d-flex justify-content-center pt-5">

            <div id="formBox" class="text-center text-white p-5 w-50">

                <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                    <div class="h2 p-2">Log In</div>
                    <hr/>

                    <?php 
                        if( isset($errMSG) ){
                            echo $errMSG ;
                        }
                    ?>

                    <label for="email"><b>Email</b></label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your Email" maxlenght="50" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" />
                        <span class="text-danger">
                            <?php echo $emailError; ?>
                        </span>
                        <div id="validation"></div>
                        <br>


                    <label for="password"><b>Password</b></label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your Password" maxlenght="15" />
                        <span class="text-danger">
                            <?php echo $passError; ?>                
                        </span><br>
                        
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-secondary" name="btn-login">Log-In</button>
                    </div>
                        <hr/>
                        <a class="text-white" href="registration.php">Not registered yet? Sign Up Here...</a>
                </form>
            </div>
        </div>
    </body>
</html>
<?php ob_end_flush(); ?>