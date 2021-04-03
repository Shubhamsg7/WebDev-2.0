<?php 
    //send email
    $emailTo = "rob@example.com";
    $subject = "I hope this Works!";
    $body= "I think you're great";
    $headers="From: rob@example.com";
    
    if(mail($emailTo, $subject, $body, $headers)){
        echo "The email was sent successfully";
    }else{
        echo "The email could not be sent.";
    }
?>