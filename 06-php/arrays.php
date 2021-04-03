<?php 
    //variable name
    $name = "Rob";
    echo "<p>My name is $name</p>";

    //concate two string
    $string1 = "<p>This is the first part";
    $string2 = "of a sentence</p>";
    echo $string1." ".$string2;

    //calculate number
    $myNumber = 45;
    $calc = $myNumber + 31 /97 + 4;
    echo "The result of the calculation is ".$calc;

    //boolean
    $myBool = false;
    echo "<p>This statement is true? ".$myBool."</p>";

    $variableName = "name";
    echo $$variableName;
?>