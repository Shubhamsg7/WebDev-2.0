<?php
    //connect database
    mysqli_connect("localhost","root","","webdev2");
    if(mysqli_connect_error()){
        echo "There was an error connecting to the dababase";
    }else{
        echo "Database connection successful!";
    }

    
?>