<?php 
    if($_POST){
        $error = "";
        $successMessage="";
        //validate email
        if(!$_POST["email"]){
            $error .= "An email address is required.<br>";
        }
        //validate subject
        if(!$_POST["subject"]){
            $error .= "An subject field is required.<br>";
        }
        //validate content
        if(!$_POST["content"]){
            $error .= "An content field is required.<br>";
        }

        //validate email
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            $error .= "This email address is invalid.<br>";
        }

        //error msg
        if($error != ""){
            $error = '<div class="alert alert-danger" role="alert"><p><strong>There was error(s) in your form:</strong></p>'.$error.'</div>';
        }else{
            //mail send 
            $emailTo = "me@example.com";
            $subject = $_POST['subject'];
            $content = $_POST['content'];

            $headers = "From: ".$_POST['email'];

            if(mail($emailTo,$subject, $content, $headers)){
                //success msg on mail sent
                $successMessage = '<div class="alert alert-success" role="alert"><p><strong>Your message was sent, we\'ll get back to you ASAP!</strong></p></div>';
            }else{
                //errror msg on mail not send
                $error = '<div class="alert alert-danger" role="alert"><p><strong>Your message counldn\'t be sent - please try again later</strong></p></div>';
            }
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Contact Form</title>
  </head>
  <body>
    <div class="container">
        <h1>Get in touch!</h1>
        <!--error/success msg-->
        <div id="error"><? echo $error.$successMessage; ?></div>
        <!--contact form start-->
        <form method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                <small class="text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subjects">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">What would you like to ask us?</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            </div>
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>



    <!-- script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script>
        $("form").submit(function (e) {
           //e.preventDefault();

            var error = "";
            if($("#subject").val() == ""){
                error += "<p>The subject field is required.</p>";
            }

            if($("#content").val() == ""){
                error += "<p>The content field is required.</p>";
            }

            if(error != ""){
                $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There was error(s) in your form:</strong></p>' + error + '</div>');
                return false;
            }else{
                return true;
            }
            
        });
    </script>
  </body>
</html>