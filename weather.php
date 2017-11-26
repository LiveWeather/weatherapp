<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		 <form action="weather.php"  method="post">
        Input: <input type="text" name="name"><br>
       <input type="submit">
      </form>
		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
		
<!DOCTYPE>
<?php


//current weather
        $link1="https://maps.googleapis.com/maps/api/geocode/json?address=";
        $link2= $_POST['name'];
        $link3="&key=AIzaSyA0W7gxcPBJ3NNN5BH4nVRs-dLVM4zems4";
        $url=$link1.$link2.$link3;
        $json=file_get_contents($url);

        $results = json_decode($json);
        $coordinates = $results->results;

        $lat = $coordinates[0]->geometry->location->lat;
        $long = $coordinates[0]->geometry->location->lng;

        $a="http://api.weatherunlocked.com/api/current/";
        $b=",";
        $c="?app_id=02694b99&app_key=ce8ea19839f35b0e536bc9ea656d8d77";
        $xml_string=$a.$lat.$b.$long.$c;
        $xml = file_get_contents($xml_string);
        $json = json_decode($xml);
?>

       
<?php
        echo "Feels like " .$json->feelslike_c .'<br/> ';
        echo "Wind Speed " .$json->windspd_kmh .'<br/> ';
        echo "Humidity "   .$json->humid_pct .'<br/> ';

//forecast weather
$d='http://api.weatherunlocked.com/api/forecast/';
$e='?app_id=02694b99&app_key=ce8ea19839f35b0e536bc9ea656d8d77';
 $xml1_string=$d.$lat.$b.$long.$e;
       ;
$xml1 = file_get_contents($xml1_string);
$json = json_decode($xml1);
      echo "Date ". $json->Days[0]->date.'<br/> ';
      echo "Maximum Temperature ". $json->Days[0]->temp_max_c.'<br/> ';
      echo "Minimum Temperature ". $json->Days[0]->temp_min_c.'<br/> ';
      echo "Maximum Humidity ".$json->Days[0]->humid_max_pct.'<br/> ';
      echo "Minimum Humidity ".$json->Days[0]->humid_min_pct.'<br/> ';
      echo "Maximum windspeed ".$json->Days[0]->windspd_max_kmh.'<br/> ';
      echo "Total Rainfall ".$json->Days[0]->rain_total_mm.'<br/> ';

      echo "Date ". $json->Days[1]->date.'<br/> ';
      echo "Maximum Temperature ".  $json->Days[1]->temp_max_c.'<br/> ';
      echo  "Minimum Temperature ". $json->Days[1]->temp_min_c.'<br/> ';
      echo "Maximum Humidity ". $json->Days[1]->humid_max_pct.'<br/> ';
      echo "Minimum Humidity ". $json->Days[1]->humid_min_pct.'<br/> ';
      echo  "Maximum windspeed ".$json->Days[1]->windspd_max_kmh.'<br/> ';
      echo  "Total Rainfall ".$json->Days[1]->rain_total_mm.'<br/> ';

      echo "Date ". $json->Days[2]->date.'<br/> ';
      echo "Maximum Temperature ".  $json->Days[2]->temp_max_c.'<br/> ';
      echo "Minimum Temperature ".  $json->Days[2]->temp_min_c.'<br/> ';
      echo "Maximum Humidity ". $json->Days[2]->humid_max_pct.'<br/> ';
      echo "Minimum Humidity ". $json->Days[2]->humid_min_pct.'<br/> ';
      echo  "Maximum windspeed ".$json->Days[2]->windspd_max_kmh.'<br/> ';
      echo "Total Rainfall ".$json->Days[2]->rain_total_mm.'<br/> ';

      echo "Date ". $json->Days[3]->date.'<br/> ';
      echo "Maximum Temperature ".  $json->Days[3]->temp_max_c.'<br/> ';
      echo "Minimum Temperature ".  $json->Days[3]->temp_min_c.'<br/> ';
      echo "Maximum Humidity ". $json->Days[3]->humid_max_pct.'<br/> ';
      echo "Minimum Humidity ". $json->Days[3]->humid_min_pct.'<br/> ';
      echo  "Maximum windspeed ".$json->Days[3]->windspd_max_kmh.'<br/> ';
      echo  "Total Rainfall ".$json->Days[3]->rain_total_mm.'<br/> ';

      echo "Date ". $json->Days[4]->date.'<br/> ';
      echo "Maximum Temperature ".  $json->Days[4]->temp_max_c.'<br/> ';
      echo "Minimum Temperature ".  $json->Days[4]->temp_min_c.'<br/> ';
      echo "Maximum Humidity ". $json->Days[4]->humid_max_pct.'<br/> ';
      echo "Minimum Humidity ". $json->Days[4]->humid_min_pct.'<br/> ';
      echo "Maximum windspeed ".$json->Days[4]->windspd_max_kmh.'<br/> ';
      echo "Total Rainfall ". $json->Days[4]->rain_total_mm.'<br/> ';
      echo "Date ". $json->Days[5]->date.'<br/> ';
      echo "Maximum Temperature ".  $json->Days[5]->temp_max_c.'<br/> ';
      echo "Minimum Temperature ".  $json->Days[5]->temp_min_c.'<br/> ';
      echo "Maximum Humidity ". $json->Days[5]->humid_max_pct.'<br/> ';
      echo "Minimum Humidity ". $json->Days[5]->humid_min_pct.'<br/> ';
      echo  "Maximum windspeed ".$json->Days[5]->windspd_max_kmh.'<br/> ';
      echo "Total Rainfall ". $json->Days[5]->rain_total_mm.'<br/> ';

      echo "Date ". $json->Days[6]->date.'<br/> ';
      echo "Maximum Temperature ".  $json->Days[6]->temp_max_c.'<br/> ';
      echo "Minimum Temperature ".  $json->Days[6]->temp_min_c.'<br/> ';
      echo "Maximum Humidity ". $json->Days[6]->humid_max_pct.'<br/> ';
      echo "Minimum Humidity ". $json->Days[6]->humid_min_pct.'<br/> ';
      echo "Maximum windspeed ". $json->Days[6]->windspd_max_kmh.'<br/> ';
      echo "Total Rainfall ". $json->Days[6]->rain_total_mm.'<br/> ';
    ?>

	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
		<?php endif ?>
	</div>
		
</body>
</html>

