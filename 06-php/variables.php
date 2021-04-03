<?php 
    //arrays
    $myArray = array("Rob","Kristan","Tommy","Rolphie");
    print_r($myArray);
    echo $myArray[3];

    //break line
    echo "<br><br>";

    $anotherArray[0] = "pizza";
    $anotherArray[1] = "yoghurt";
    $anotherArray[5] = "coffee";
    $anotherArray["myFavouriteFood"] = "ice cream";
    print_r($anotherArray);

    //break line
    echo "<br><br>";

    $thirdArray = array(
        "France" => "French",
        "USA" => "English",
        "Germany" => "German"
    );
    print_r($thirdArray);
    echo sizeof($thirdArray);


?>