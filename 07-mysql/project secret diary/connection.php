<?php
    //connect database
    $link = mysqli_connect("localhost","root","","secret_diary");
    if(mysqli_connect_error()){
        die ("There was an error connecting to the dababase");
    }
?>