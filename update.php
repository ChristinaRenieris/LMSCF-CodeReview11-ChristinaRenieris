<?php

require_once 'db_connect.php';

ob_start();
session_start();

if ( !isset($_SESSION['admin']) ) {
    header("Location: home.php");
}

if($_GET['id']){
    $id = $_GET['id'];

    $sql = "SELECT * FROM `animal` WHERE animal_id= $id";
    $result = mysqli_query($conn, $sql);

    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Crud | Update Animal</title>
    <style>
        #formBox{
                background-color: #4d0066;
            }
            body{
                background-color: #e6ffff;!important
            }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center mt-5">

        <div id="formBox" class="text-center text-white p-5 w-50">

            <div class="h2 p-2 text-white">Submit Changes Here</div>
            <hr/>

            <form action="a_update.php" method="POST">

                <input type="hidden" name="id" value="<?= $row['animal_id']?>">

                <label>Name :</label> <br>
                <input class="form-control" type="text" name="name" value="<?= $row['name'] ?>"> <br>

                <label>Age :</label> <br>
                <input class="form-control" type="text" name="age" value="<?= $row['age'] ?>"> <br>

                <label>Description :</label> <br>
                <input class="form-control" type="text" name="description" value="<?= $row['description'] ?>"> <br>

                <label for="type">Choose a type:</label>
                    <select name="type">
                        <option value="small">small</option>
                        <option value="big">big</option>
                        <option value="senior">senior</option>
                    </select> <br>

                <label>Breed :</label> <br>
                <input class="form-control" type="text" name="breed" value="<?= $row['breed'] ?>"> <br>
                
                <label>Image :</label> <br>
                <input class="form-control" type="text" name="image" value="<?= $row['image'] ?>"> <br>
                
                <?php
                    if ( $row['type'] == "small" ) {
                       echo '<label>Website :</label> <br>
                        <input class="form-control" type="text" name="website" value=" '.$row['website'].'"> <br>';
                    }
                ?>

                <?php
                    if ( $row['type'] !== "small" ) {
                       echo '<label>Hobbies :</label> <br>
                        <input class="form-control" type="text" name="hobbies" value="'.$row['hobbies'].'"> <br>';
                    }
                ?>
                
                <?php
                    if ( $row['type'] == "senior" ) {
                       echo '<label>Ready for adoption at :</label> <br>
                       <input class="form-control" type="date" name="date" value="'.$row['date'].'"> <br>';
                    }
                ?>
                
                <br><br>
                <button type="submit" class="btn btn-secondary" name="submit">Update <?= $row['name']?></button>
            
            </form>
        </div>
    </div>
</body>
</html>