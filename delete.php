<?php 
    require_once 'db_connect.php';

    ob_start();
    session_start();

    if ( !isset($_SESSION['admin']) ) {
        header("Location: home.php");
    }

    if($_GET['id']){
        $id = $_GET['id'];
        // var_dump($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <title>CRUD | Delete Animal</title>
    <style>
        body{
                background-color: #e6ffff;!important
            }
        .p-5{
            background-color: #4d0066;
        }
    </style>
</head>
<body>
    
    <div class="container-fluid text-center text-white p-5 ">
        <h3>Do you really want to delete</h3><br>
        <form action="a_delete.php" method="POST">
            <input type="hidden" name="animal_id" value="<?= $id?>" />

            <button class="btn btn-danger" type="submit">Yes, delete it!</button>
            
            <a class="btn btn-info" href="adminpanel.php">No, go back!</a>
        
        </form>
    </div>
</body>
</html>


<?php
}
?>