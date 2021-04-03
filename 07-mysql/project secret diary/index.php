<?php
    session_start();
    $error = "";

    if(array_key_exists("logout", $_GET)){
        unset($_SESSION);
        setcookie("id", "", time() - 60*60);
        $_COOKIE["id"] = "";

        session_destroy();

    }else if((array_key_exists("id", $_SESSION) AND $_SESSION['id']) OR (array_key_exists("id", $_COOKIE) AND $_COOKIE['id'])){

        header("Location: login.php");

    }


    if(array_key_exists("submit", $_POST)){

        include('connection.php');

        if(!$_POST['email']){
            $error .= "An email address is required<br>";
        }

        if(!$_POST['password']){
            $error .= "A password address is required<br>";
        }

        if($error != ""){
            $error = "<p>There were error(s) in your form:</p>".$error;
        }else{
            //signup
            if($_POST['signUp'] == '1'){
                //checking email
                $query ="SELECT 'id' from users WHERE email= '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";

                $result = mysqli_query($link, $query);

                if(mysqli_num_rows($result) > 0){
                    $error = "<p>That email address has already been taken.</p>";
                }else{
                    //insert data 
                    $query = "INSERT INTO users(email,password) VALUES('".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."')";

                    if(!mysqli_query($link, $query)){
                        $error = "<p>Could not sign you up - please try again later.</p>";
                    }else{
                        $query = "UPDATE users SET password= '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";

                        $id = mysqli_insert_id($link);

                        mysqli_query($link, $query);

                        $_SESSION['id'] = $id;

                        if($_POST['stayLogin'] == '1'){
                            setcookie("id", $id, time() + 60*60*24*365);
                        }
                        header("Location: login.php");
                    }
                }
            }else{
                //login
                $query ="SELECT * from users WHERE email= '".mysqli_real_escape_string($link, $_POST['email'])."'";

                $result = mysqli_query($link, $query);

                $row = mysqli_fetch_array($result);

                if(isset($row)){
                    $hashedPassword = md5(md5($row['id']).$_POST['password']);
                    //echo $hashedPassword;
                    if($hashedPassword == $row['password']){

                        $_SESSION['id'] = $row['id'];

                        if(isset($_POST['stayLogin']) AND $_POST['stayLogin'] == '1'){
                            setcookie("id", $row['id'], time() + 60*60*24*365);
                        }
                        header("Location: login.php");
                    }else{
                        $error = "That email/password combination could not be found.";
                    }
                }else{
                    $error = "That email/password combination could not be found.";
                }

            }
        }
    }


?>

<?php include 'header.php' ?>

    <div class="container p-3 text-light" id="homePageContainer">
        <h1 class="text-center">Secret Diary</h1>
        <p class="text-center"><strong>Store your thoughts permanently and securely.</strong></p>
        <div id="error">
            <?php if($error!=""){
                echo '<div class="alert alert-danger" role="alert">
                '.$error.'
              </div>';
            } ?>
        </div>
        <form method="post" id="signUpForm">
            <p class="text-center">Interested? Sign UP Now</p>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="eg. name@example.com">
            </div>
            <div class="mb-2">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="1" id="stayLogin">
                <label class="form-check-label" for="stayLogin">
                    Stay Login
                </label>
            </div>    
            <div class="mb-3 text-center">
                <input type="hidden" name="signUp" value="1">
                <input type="submit" class="btn btn-success" name="submit" value="Sign Up!">
            </div>
            <div class="mb-3 text-center">
                <a class="link-light toggleForms">Log In</a>
            </div>
        </form>


        <form method="post" id="logInForm">
            <p class="text-center">Log in using your email and password.</p>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="eg. name@example.com">
            </div>
            <div class="mb-2">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="1" id="stayLogin">
                <label class="form-check-label" for="stayLogin">
                    Stay Login
                </label>
            </div>
            <input type="hidden" name="signUp" value="0">
            <div class="mb-3 text-center">
                <input type="submit" class="btn btn-success" name="submit" value="Log In!">
            </div>
            <div class="mb-3 text-center">
                <a class="link-light toggleForms">Sign Up</a>
            </div>
        </form>
    </div>

   <?php include 'footer.php' ?>




