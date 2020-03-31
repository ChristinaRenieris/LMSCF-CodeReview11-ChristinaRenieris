<?php

    ob_start();
    session_start();

    if( isset($_SESSION['user'])!="" ){
        header("Location: home.php");
    }

    include_once "db_connect.php";

    $error = false;
    $nameError = "";
    $emailError = "";
    $passError = "";

    if( isset($_POST['btn-signup']) ){
        $name = trim($_POST['name']);
        $name = strip_tags($name);
        $name = htmlspecialchars($name);

        $email = trim($_POST['email']);
        $email = strip_tags($email);
        $email = htmlspecialchars($email);

        $password = trim($_POST['password']);
        $password = strip_tags($password);
        $password = htmlspecialchars($password);

        if(empty($name) ){
            $error = true;
            $nameError = "Please enter your User name";
        }elseif(strlen($name) < 3){
            $error = true;
            $nameError = "Name must have at least 3 characters.";
        }elseif(!preg_match("/^[a-zA-Z ]+$/",$name) ){
            $error = true;
            $nameError = "Name must contain letters and space.";
        }

        if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ){
            $error = true;
            $emailError = "Please enter a valid email.";
        }else{
            $query = "SELECT email FROM user WHERE email = '$email'";
            $result = mysqli_query($conn, $query);
            $count = mysqli_num_rows($result);

            if($count!= 0){
                $error = true;
                $emailError = "Provided email already in use";
            }
        }
        
        if(empty($password) ){
            $error = true;
            $passError = "Please enter password.";
        }else if(strlen($password) < 6 ){
            $error = true;
            $passError = "Password must have at least 6 characters!";
        }

        $pass = hash('sha256', $password);

        if( !$error) {
            
            $query = "INSERT INTO `user`(`name`, `email`, `password`) VALUES ('$name', '$email', '$pass')";
            $res = mysqli_query($conn, $query);

            if($res) {
                $errTyp = "success";
                $errMSG = "Successfully registered, you may now login";
                unset($name);
                unset($email);
                unset($password);
            }else{
                $errTyp = "danger";
                $errMSG = "Something went wrong, try again later ...";
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
        <title>Registration</title>
    </head>
    <body>
        <div class="container d-flex justify-content-center pt-5">

            <div id="formBox" class="text-center text-white p-5 w-50">

                <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                    <div class="h2 p-2">Sign up</div>
                    <hr/>

                    <?php 
                        if( isset($errMSG) ){
                    ?>
                            <div class="alert alert-<?php echo $errTyp; ?>">
                                <?= $errMSG ;?>
                            </div>
                    <?php 
                        }
                    ?>

                    <label for="name"><b>Name</b></label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your Name" maxlenght="20" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>">
                        <span class="text-danger"> 
                            <?php echo $nameError; ?>                
                        </span><br>

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
                        <button type="submit" class="btn btn-secondary" name="btn-signup">Sign-Up</button>
                    </div>
                        <hr/>
                        <a class="text-white" href="index.php">Log in Here...</a>
                </form>
            </div>
        </div>
    </body>
</html>
<?php ob_end_flush(); ?>