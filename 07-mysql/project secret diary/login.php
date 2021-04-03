<?php 
    session_start();

    //$diaryContent="";

    if(array_key_exists("id", $_COOKIE)){
        $_SESSION['id'] = $_COOKIE['id'];

    }

    if(array_key_exists("id", $_SESSION)){
        //echo "<p>Logged In! <a href='index.php?logout=1'>Log Out</a></p>";
        include('connection.php');
        $query = "SELECT diary FROM users WHERE id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";

        $row = mysqli_fetch_array(mysqli_query($link, $query));

        $diaryContent = $row['diary'];
    }else{
        header("Location: index.php");
    }

    include('header.php');
?>
    <nav class="navbar navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="#">Secret Diary</a>
            <div class="pull-xs-right">
                <a href ='index.php?logout=1'>
                <button class="btn btn-success-outline" type="submit">Logout</button></a>
            </div>
    </nav>

    <div class="container-fluid p-3">
        <div class="">
            <textarea class="form-control" id="diary" rows="20"><?php echo $diaryContent; ?></textarea>
        </div>
    </div>
<?php
    include('footer.php');
?>