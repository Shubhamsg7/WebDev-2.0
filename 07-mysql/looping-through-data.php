<?php
    //connect database
    $link = mysqli_connect("localhost","root","","webdev2");
    if(mysqli_connect_error()){
        die ("There was an error connecting to the dababase");
    }

    if(array_key_exists('email', $_POST) OR array_key_exists('password', $_POST)){
        //field required
        if($_POST['email'] == ''){
            echo "<p>Email address is required.</p>";
        }else if($_POST['password'] == ''){
            echo "<p>Password is required.</p>";
        }else{
            //checking email
            $query ="SELECT 'id' from users WHERE email= '".mysqli_real_escape_string($link, $_POST['email'])."'";

            $result = mysqli_query($link, $query);

            if(mysqli_num_rows($result) > 0){
                echo "<p>That email address has already been taken.</p>";
            }else{
                //insert data 
                $query = "INSERT INTO users(email,password) VALUES('".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."')";

                if(mysqli_query($link, $query)){
                    $_SESSION['email'] = $_POST['email'];
                    header("Location: session.php");
                }else{
                    echo "<p>There was a problem signing you up - Please try again later</p>";
                }
            }
        }
    }

?>

<!--signup form-->
<form method="post">
    <input type="email" name="email" placeholder="Email address">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Submit">
</form>