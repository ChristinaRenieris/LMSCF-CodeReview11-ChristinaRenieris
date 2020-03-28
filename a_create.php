<?php

    require_once 'db_connect.php';

    ob_start();
    session_start();
    
    if ( !isset($_SESSION['admin']) ) {
        header("Location: home.php");
    }

    if($_POST){
        $id= intval($_POST['id']);
        $name = $_POST['name'];
        $age = $_POST['age'];
        $description = $_POST['description'];
        $type = ($_POST['type']);
        $breed = ($_POST['breed']);
        $image = ($_POST['image']);
        $website = $_POST['website'];
        $hobbies = $_POST['hobbies'];
        $date = $_POST['date'];

      
        $sql = "INSERT INTO `animal`(`name`, `age`, `description`, `type`, `breed`, `image`, `website`, `hobbies`, `date`) VALUES ('$name', '$age', '$description', '$type', '$breed', '$image', '$website','$hobbies', '$date')";

        if ( mysqli_query($conn, $sql) ) {
            header("Location: adminpanel.php");
        } 
        else {
            var_dump($sql);
            echo "error";
        }

    }
?>