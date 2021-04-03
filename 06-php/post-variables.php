<?php 
    //post 
    if($_POST){
        $family = array("Rob", "Kirstan", "Tommy", "Ralphie");

        $isKnown = false;

        foreach($family as $value){
            if($value==$_POST['name']){
                $isKnown=true;
            }
        }

        if($isKnown){
            echo "Hi there ".$_POST['name']."!";
        }else{
            echo "I don't know you.";
        }

    }
?>

<p>What is your name?</p>

<form action="" method="post">
    <input type="text" name="name">
    <input type="submit" value="Submit">
</form>