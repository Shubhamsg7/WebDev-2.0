<?php
    //connect database
    $link = mysqli_connect("localhost","root","","webdev2");
    if(mysqli_connect_error()){
        die ("There was an error connecting to the dababase");
    }

    //retrieving data from database
    $query = "SELECT * FROM users";
    if($result = mysqli_query($link, $query)){
        $row = mysqli_fetch_array($result);
        echo "Your email is ".$row['email']." and your password is ".$row['password'];
    }
?>