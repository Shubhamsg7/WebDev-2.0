<?php
session_start();

if($_SESSION['email']){
    echo "You are logged in";
}else{
    header("Location: looping-through-data.php");
}

?>