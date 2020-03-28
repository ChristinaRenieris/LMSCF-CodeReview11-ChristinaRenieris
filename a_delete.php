<?php 

require_once 'db_connect.php';

ob_start();
session_start();

if ( !isset($_SESSION['admin']) ) {
    header("Location: home.php");
}

if($_POST){
    $id = $_POST['animal_id'];

    $sql = "DELETE FROM animal WHERE animal_id = $id";

    var_dump($id);
    if(mysqli_query($conn, $sql)){
        header("Location: adminpanel.php");
    }else{
        echo $sql;
    }
}
?>