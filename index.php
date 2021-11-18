<?php

    $city = "Delhi";

    if (isset($_POST['submit']) && isset($_POST['city']) && $_SERVER['REQUEST_METHOD']=='POST') {
        
        $city = $_POST['city'];

    }

    $url = "http://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=9e3d53ca0e87f1a6b93867c5705b005e";

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $result = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($result,true);

    


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>i-Weather</title>
</head>

<body>

    <header>
        <div class="header-container">
            <h2>i-Weather</h2>

        </div>
    </header>
    <main>

        <div class="search-container">
            <form action="index.php" method="post">
                <input type="text" name="city" placeholder="Search City.." id="city">
                <input type="submit" name="submit" value="Search">

            </form>
            
        </div>
        <div class="weather-box-container">
            
            <div class="weather-box">

                <div class="row row1">
                    <img src="http://openweathermap.org/img/wn/<?php echo $result['weather'][0]['icon'] ?>@4x.png"> 

                </div>

                <div class="row row2">
                    <div class="col temp">
                        <p><?php echo round($result['main']['temp']-273.15) ?>°C</p>
                    </div>
                    <div class="col weather">
                        <p><?php echo $result['weather'][0]['main'] ?> <br></p>
                        <p class="description"><?php echo $result['name'] ?></p>
                    </div>
                    <div class="col wind">
                        <p>Wind</p>
                        <p class="description"><?php echo $result['wind']['speed'] ?> m/s</p>
                    </div>
                    <div class="col date">
                        <p><?php echo date('d M',$result['dt'])  ?></p>
                    </div>

                </div>
                

                
                
            </div>


        </div>

    </main>
    <footer>
        <div class="footer-container">
            
            <p>&copyCreated By- Anurag Dubey</p>
        </div>
    </footer>
</body>

</html>