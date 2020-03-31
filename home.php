<?php 
    ob_start();
    session_start();

    require_once 'db_connect.php';

    if ( !($_SESSION['user']) && !($_SESSION['admin']) ){
        header("Location: index.php");
        exit;
    }

    //checking session (had session troubles)
    // var_dump($_SESSION['user']);
    // echo "<br>";
    // var_dump($_SESSION);

    if ( isset($_SESSION['user']) ) {
        $res = mysqli_query($conn, "SELECT * FROM `user` WHERE user_id = ".$_SESSION['user']);
        $userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
    }
    elseif( isset($_SESSION['admin']) ) {
        $resAdmin = mysqli_query($conn, "SELECT * FROM `user` WHERE user_id = ".$_SESSION['admin']);
        $adminRow = mysqli_fetch_array($resAdmin, MYSQLI_ASSOC);
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <style>
            .navbar,
            #footer{
                background-color: #4d0066;
            }
            body{
                background-color: #e6ffff;!important
            }
            .card-img-top{
                height: 20em;
            }
        </style>
        <title>
            <?php 
                if ( isset($_SESSION['user']) ) {
                    echo $userRow['name']; 
                }
                elseif ( isset($_SESSION['admin']) ) {
                    echo $adminRow['name'];
                }
            ?>
          Home
        </title>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm">

            <!-- Links -->
            <ul class="navbar-nav col-8">
                <li class="col-4">
                    <div class="text-white font-weight-bold">
                        <p>Hello
                            <?php 
                                if ( isset($_SESSION['user']) ) {
                                    echo $userRow['name']; 
                                }
                                elseif ( isset($_SESSION['admin']) ) {
                                    echo $adminRow['name'];
                                }
                            ?>!
                        </p>
                    </div>
                </li>
                <li class="nav-item col-2">
                    <a class="nav-link text-white" href="home.php">All Animals</a>
                </li>
                <li class="nav-item col-2">
                    <a class="nav-link text-white" href="general.php">Younger Animals</a>
                </li>
                <li class="nav-item col-2">
                    <a class="nav-link text-white" href="senior.php">Senior Animals</a>
                </li>

                <?php
                    if ( isset($_SESSION['admin']) ) {
                        echo '<li class="nav-item col-2">
                                <a class="nav-link text-white" href="adminpanel.php">Admin Panel</a>
                              </li>';
                    }
                ?>    
            </ul>

            <form class="form-inline my-2 my-lg-0 col-4">
                <input class="form-control mr-sm-2" type="text" name="search_animals" id="search_animals" placeholder="Search Animals" aria-label="Search">
                <a class="btn btn-outline-secondary my-2 my-sm-0" href="logout.php?logout">Log Out</a>
            </form>

        </nav>
        <div class="container-fluid">
            <div  id="result" class="row mt-5">
                <?php
                    $sql = "SELECT * FROM `animal`";
                    $result = mysqli_query($conn, $sql);

                    $sqL = "SELECT * FROM `location`";
                    $resultL = mysqli_query($conn, $sqL);

                    if ($result->num_rows == 0) {
                        echo "No result";
                    }
                    else {
                        $rows = $result->fetch_all(MYSQLI_ASSOC);
                        $rowsL = $resultL->fetch_all(MYSQLI_ASSOC);

                        foreach ($rows as $key =>$value) {
                            foreach ( $rowsL as $key=>$valueL) {
                                $Location = '   <li>Location : '.$valueL["name"].'</li>
                                                <li>City : '.$valueL["city"].'</li>
                                                <li>ZIP-code : '.$valueL["ZIP_code"].'</li>
                                                <li>Address : '.$valueL["address"].'</li>
                                            ';
                            }
                            //checking if my var works
                            // var_dump($Location);

                            if ( $value['type'] == "small") {
                                echo '<div class="col-xl-3  col-lg-4 col-md-6 col-sm-12 mb-3 d-flex alight-items-stretch">
                                            <div class="card w-100">
                                                <img class="card-img-top " src="'.$value["image"].'" alt="Animal">
                                                <div class="card-body">
                                                    <h4 class="text-center">'.$value["name"].'</h4>   
                                                        <ul class="list-unstyled">
                                                            <li>Age : '.$value["age"].'</li>
                                                            <li>Description : '.$value["description"].'</li>                                                    
                                                            <li>Type : '.$value["type"].'</li>
                                                            <li>Breed : '.$value["breed"].'</li>
                                                            <li>Website : <a href="'.$value["website"].'">Small Cuties Website </a></li>
                                                            <br>
                                                            '.$Location.'
                                                        </ul>
                                                </div>    
                                            </div>
                                      </div>';   
                            }
                            elseif ( $value['type'] == "big") {
                                echo '<div class="col-xl-3  col-lg-4 col-md-6 col-sm-12 mb-3 d-flex alight-items-stretch">
                                        <div class="card w-100">
                                            <img class="card-img-top " src="'.$value["image"].'" alt="Animal">
                                            <div class="card-body">
                                                <h4 class="text-center">'.$value["name"].'</h4>   
                                                    <ul class="list-unstyled">
                                                        <li>Age : '.$value["age"].'</li>
                                                        <li>Description : '.$value["description"].'</li>                                                    
                                                        <li>Type : '.$value["type"].'</li>
                                                        <li>Breed : '.$value["breed"].'</li>
                                                        <li>Hobbies : '.$value["hobbies"].'</li>
                                                        <br>
                                                        '.$Location.'
                                                </div>    
                                            </div>
                                        </div>';

                            }   
                            elseif ( $value['type'] == "senior") {
                                echo '<div class="col-xl-3  col-lg-4 col-md-6 col-sm-12 mb-3 d-flex alight-items-stretch">
                                        <div class="card w-100">
                                            <img class="card-img-top " src="'.$value["image"].'" alt="Animal">
                                            <div class="card-body">
                                                <h4 class="text-center">'.$value["name"].'</h4>   
                                                    <ul class="list-unstyled">
                                                        <li>Age : '.$value["age"].'</li>
                                                        <li>Description : '.$value["description"].'</li>                                                    
                                                        <li>Type : '.$value["type"].'</li>
                                                        <li>Breed : '.$value["breed"].'</li>
                                                        <li>Hobbies : '.$value["hobbies"].'</li>
                                                        <li>Ready for adoption at : '.$value["date"].'</li>
                                                        <br>
                                                        '.$Location.'
                                                    </ul>
                                                </div>    
                                            </div>
                                        </div>';             
                            }   
                        } 
                    }
                ?>
            </div>
        </div>
        <footer class="page-footer font-small blue">

        <!-- Copyright -->
        <div id="footer" class="footer-copyright text-center py-3 text-white">© 2020 Copyright:
        <a href="home.php" class="text-secondary"> Animal Garden GmbH</a>
        </div>
        <!-- Copyright -->

        </footer>
        <script>
            $(document).ready(function(){
              
                $('#search_animals').keyup(function(){
                    load_data();

                        function load_data(query){
                            $.ajax({
                                url:"fetch.php",
                                method:"POST",
                                data:{query:query},
                                success:function(data)
                                {
                                    $('#result').html(data);
                                }
                            });
                            var search = $(this).val();
                            if(search != '')
                            {
                                load_data(search);
                            }
                            else
                            {
                                load_data();
                            }
                        };
                });
            });
        
        
        </script>
    </body>
</html>