<?php 
    //$salt = "iddjbnjbdbbhd";
    $row['id'] = 45;
    echo md5(md5($row['id'])."password");
?>