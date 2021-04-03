<?php 
    //get 
    if($_GET){
        $i = 2;
        $isPrime = true;
        while($i < $_GET['number']){
            if($_GET['number'] % $i == 0){
                //number is not prime
                $isPrime = false;
            }
            $i++;
        }
        if($isPrime){
            echo "<p>".$i." is a prime number!</p>";
        }else{
            echo "<p>".$i." is not prime number!</p>";
        }
    } else if ($_GET){
        //user has submitted something which is not a positive whole number
        echo "<p>Please enter a positve whole number.</p>";
    }
?>

<p>Please enter a whole number</p>

<form action="">
    <input type="text" name="number">
    <input type="submit" value="Go!">
</form>