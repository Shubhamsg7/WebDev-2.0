<?php 
    
    $family = array("Rob", "Kirstan", "Tommy", "Ralphie");

    //for each loops
    foreach($family as $key => $value){
        $family[$key] = $value." Percival";
        echo "Array item ".$key." is ".$value."<br>";
    }

    //for loops
    for($i = 0; $i < sizeof($family); $i++){
        echo $family[$i]."<br>";
    }

    for($i=0; $i <= 10; $i++){
        echo $i."<br>";
    }


?>

