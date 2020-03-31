<?php

    require_once 'db_connect.php';
    $output = '';

    if(!$conn){
        die("Connection failed: " .mysqli_connect_error() ."\n");
    }
    if( isset($_POST['query']) ){
        $search = mysqli_real_escape_string($conn, $_POST['query']);
        $result = $conn->query("
            SELECT * FROM `animal` 
            WHERE `name` LIKE '%".$search."%'
            OR `age` LIKE '%".$search."%'
            OR `description` LIKE '%".$search."%'
            OR `type` LIKE '%".$search."%'
            OR `breed` LIKE '%".$search."%'
            OR `image` LIKE '%".$search."%'
            OR `website` LIKE '%".$search."%'
            OR `hobbies` LIKE '%".$search."%'
            OR `date` LIKE '%".$search."%'
                    ");

        if(mysqli_num_rows($result) > 0 ){
            $output .= '<div class="h4 text-center p-3">Search Results</div>';
            while($row = mysqli_num_rows($result) > 0) {
                if ( $row['type'] == "small") {
                    $output .= '<div class="col-xl-3  col-lg-4 col-md-6 col-sm-12 mb-3 d-flex alight-items-stretch">
                                <div class="card w-100">
                                    <img class="card-img-top " src="'.$row["image"].'" alt="Animal">
                                    <div class="card-body">
                                        <h4 class="text-center">'.$row["name"].'</h4>   
                                            <ul class="list-unstyled">
                                                <li>Age : '.$row["age"].'</li>
                                                <li>Description : '.$row["description"].'</li>                                                    
                                                <li>Type : '.$row["type"].'</li>
                                                <li>Breed : '.$row["breed"].'</li>
                                                <li>Website : <a href="'.$row["website"].'">Small Cuties Website </a></li>
                                                <br>
                                                '.$Location.'
                                            </ul>
                                    </div>    
                                </div>
                            </div>';
                }
                elseif ( $row['type'] == "big") {
                    $output .= '<div class="col-xl-3  col-lg-4 col-md-6 col-sm-12 mb-3 d-flex alight-items-stretch">
                    <div class="card w-100">
                        <img class="card-img-top " src="'.$row["image"].'" alt="Animal">
                        <div class="card-body">
                            <h4 class="text-center">'.$row["name"].'</h4>   
                                <ul class="list-unstyled">
                                    <li>Age : '.$row["age"].'</li>
                                    <li>Description : '.$row["description"].'</li>                                                    
                                    <li>Type : '.$row["type"].'</li>
                                    <li>Breed : '.$row["breed"].'</li>
                                    <li>Hobbies : '.$row["hobbies"].'</li>
                                    <br>
                                    '.$Location.'
                            </div>    
                        </div>
                    </div>';
                }
                elseif ( $row['type'] == "senior") {
                    $output .= '<div class="col-xl-3  col-lg-4 col-md-6 col-sm-12 mb-3 d-flex alight-items-stretch">
                            <div class="card w-100">
                                <img class="card-img-top " src="'.$row["image"].'" alt="Animal">
                                <div class="card-body">
                                    <h4 class="text-center">'.$row["name"].'</h4>   
                                        <ul class="list-unstyled">
                                            <li>Age : '.$row["age"].'</li>
                                            <li>Description : '.$row["description"].'</li>                                                    
                                            <li>Type : '.$row["type"].'</li>
                                            <li>Breed : '.$row["breed"].'</li>
                                            <li>Hobbies : '.$row["hobbies"].'</li>
                                            <li>Ready for adoption at : '.$row["date"].'</li>
                                            <br>
                                            '.$Location.'
                                        </ul>
                                    </div>    
                                </div>
                            </div>';             
                } 
            }
            echo $output;
            }else{
                echo "Data Not Found!";
            }
        
    }
?> 