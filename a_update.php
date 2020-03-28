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


      
            $sql = "UPDATE `animal` SET `name`='$name' ,`age`='$age' ,`description`='$description' , `type`='$type' , `breed`='$breed', `image`='$image', `website`='$website', `hobbies`='$hobbies', `date`='$date'  WHERE `animal_id`='$id' ";

        if($conn->query($sql)===TRUE) {
            header("Location: adminpanel.php");
        } else {
            
            var_dump($sql);
            echo "error..." . $conn->connect_error;
        }

    }
?>