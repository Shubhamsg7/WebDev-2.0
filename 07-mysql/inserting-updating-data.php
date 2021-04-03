<?php
    //connect database
    $link = mysqli_connect("localhost","root","","webdev2");
    if(mysqli_connect_error()){
        die ("There was an error connecting to the dababase");
    }

    //insert data in database
    //$query = "INSERT INTO users(email,password) VALUES('example2@example.com','asdfgh123')";

    //update data in database
    $query = "UPDATE users SET email = 'example2@gmail.com' WHERE id = 2 LIMIT 1";

    mysqli_query($link, $query);

    //retrieving data from database
    $query = "SELECT * FROM users";
    if($result = mysqli_query($link, $query)){
        $row = mysqli_fetch_array($result);
        echo "Your email is ".$row['email']." and your password is ".$row['password'];
    }
?>