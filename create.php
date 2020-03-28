<?php

    ob_start();
    session_start();
    if ( !isset($_SESSION['admin']) ) {
        header("Location: home.php");
        
        var_dump($_SESSION);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <title>Crud | Create Animal</title>
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

            <div class="h2 p-2 text-white">Create Animal Here</div>
            <hr/>

            <form action="a_create.php" method="POST">

                <label>Name :</label> <br>
                <input class="form-control" type="text" name="name"> <br>

                <label>Age :</label> <br>
                <input class="form-control" type="text" name="age"> <br>

                <label>Description :</label> <br>
                <input class="form-control" type="text" name="description"> <br>

                <label for="type">Choose a type:</label>
                    <select name="type">
                        <option value="small">small</option>
                        <option value="big">big</option>
                        <option value="senior">senior</option>
                    </select> <br>

                <label>Breed :</label> <br>
                <input class="form-control" type="text" name="breed"> <br>
                
                <label>Image :</label> <br>
                <input class="form-control" type="text" name="image"> <br>
                
                <label>Website :</label> <br>
                        <input class="form-control" type="text" name="website"> <br>

                <label>Hobbies :</label> <br>
                        <input class="form-control" type="text" name="hobbies"> <br>
                
                <label>Ready for adoption at :</label> <br>
                       <input class="form-control" type="date" name="date"> <br>
                
                <br><br>
                <button type="submit" class="btn btn-secondary" name="submit">Create</button>
            
            </form>
        </div>
    </div>
</body>
</html>