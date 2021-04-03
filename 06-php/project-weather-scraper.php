<?php 
    $weather="";
    $error="";
    //$file_headers="";
    if(array_key_exists('city', $_GET)){
        $city = str_replace('','', $_GET['city']);

        $forecastPage=file_get_contents("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");

        if($file_headers[0] == 'HTTP/1.1 404 Not Found'){
            $error = "That city could not be found.";
        }else{

            $forecastPage=file_get_contents("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");
        
            $pageArray = explode('3 Day Weather Forecast Summary:</b><span class="read-more-small"><span class="read-more-content"><span class="read-more-phrase">', $forecastPage);

            if(sizeof($pageArray) > 1){
                $secondPageArray = explode('</span></span></span>', $pageArray[1]);
                    if(sizeof($secondPageArray) > 1){
                        $weather =  $secondPageArray[0];
                    }else{
                        $error = "That city could not be found.";
                    }
                }else{
                    $error = "That city could not be found.";
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
    <style>
        html {
            background: url(img/background.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        body{
            background: none;
        }

        .container{
            margin-top:200px;
            width:450px;
        }

        .container h1{
           color:white;
        }


    </style>

    <title>Weather Scraper</title>
  </head>
  <body>
    <div class="container text-center">
        <h1>What's The Weather?</h1>
        <form>
            <div class="mb-3">
                <label for="city" class="form-label text-light">Enter the name of a city.</label>
                <input type="text" class="form-control" name="city" id="city"  placeholder="Eg. London, Tokyo" value="<?php 
                if(array_key_exists('city', $_GET)){
                    echo $_GET['city'];
                }
                ?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <div id="weather">
            
                <?php 
                    if($weather){
                        echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';
                    }else if($error){
                        echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
                    }
                ?>
                
        </div>
      </div>
    </div>

    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>