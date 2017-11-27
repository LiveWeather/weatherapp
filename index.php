<?php 
	session_start(); 
	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: home.php");
	}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="styleindex.css">

	<meta name="viewport" content="width-device-width, initial-scale=1" />

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>

<body>
	<div class="navbar-static-topic" id="top">
		<div class="container">
			<div class="navbar-brand">
				&copy; The Weather Application
			</div>
			<div class="navbar-brand">
				Welcome <strong><?php echo $_SESSION['username']; ?></strong>
			</div>
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
									Menu
								</button>
			<div class="collapse navbar-collapse navHeaderCollapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="navigation"><a href="index.php"><span>Home</span></a></li>
					<li class="navigation">
						<a href="#search">
							<p>Search <span class="glyphicon glyphicon-search"></span></p>
						</a>
						</l1>
						<li class="navigation"><a href="index.php?logout='1'" style="color: red;">logout</a></li>

				</ul>

			</div>
		</div>
	</div>

	<!-- notification message -->
	<?php if (isset($_SESSION['success'])) : ?>
	<div class="error success">
		<h3>
			<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
		</h3>
	</div>
	<?php endif ?>
	<!-- logged in user information -->
	<?php  if (isset($_SESSION['username'])) : ?>
	<div class="jumbotron">
		<div class="container">
			<h2>Welcome to the Live Weather Application.</h2>
			<p>The website where you can get all the weather information you want, for any city in the world.</p>
		</div>
	</div>
	<div class="container" id="carousel">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
				<li data-target="#myCarousel" data-slide-to="3"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<img src="https://images5.alphacoders.com/680/thumb-1920-680565.jpg">
					<div class="carousel-caption">
						<h2>Dublin</h2>
						<?php
								$xml_string='http://api.weatherunlocked.com/api/current/53.3498053,-6.2603097?app_id=02694b99&app_key=ce8ea19839f35b0e536bc9ea656d8d77';
								$xml = file_get_contents($xml_string);
								$json = json_decode($xml);?>
							<h3>
								<?php echo "Temperature " .$json->temp_c .".c".'<br/>';
									echo "Feels like " .$json->feelslike_c .".c\n".'<br/>';
									echo "Wind Speed " .$json->windspd_kmh ."kmph\n".'<br/>';
									echo "Humidity "   .$json->humid_pct ."%\n".'<br/>';?> </h3>
					</div>
				</div>
				
				<div class="item">
					<img src="https://wallpaperscraft.com/image/india_city_agra_taj_mahal_architecture_marble_domes_minarets_cloudy_day_sky_clouds_59156_1920x1080.jpg">
					<div class="carousel-caption">
						<h2>New Delhi</h2>
						<?php
								$xml_string='http://api.weatherunlocked.com/api/current/28.644800, 77.216721?app_id=02694b99&app_key=ce8ea19839f35b0e536bc9ea656d8d77';
								$xml = file_get_contents($xml_string);
								$json = json_decode($xml);?>
							<h3>
								<?php echo "Temperature " .$json->temp_c .".c".'<br/>';
								echo "Feels like " .$json->feelslike_c .".c\n".'<br/>';
								echo "Wind Speed " .$json->windspd_kmh ."kmph\n".'<br/>';
								echo "Humidity "   .$json->humid_pct ."%\n".'<br/>';?>
					</div>
				</div>

				<div class="item">
					<img src="http://media.theservicecorporation.se/2013/11/Colorful-New-York-City-1920x1080.jpg">
					<div class="carousel-caption">
						<h2>New York</h2>
						<?php
									$xml_string='http://api.weatherunlocked.com/api/current/40.712775,-74.005973?app_id=02694b99&app_key=ce8ea19839f35b0e536bc9ea656d8d77';
									$xml = file_get_contents($xml_string);
									$json = json_decode($xml);?>
							<h3>
								<?php echo "Temperature " .$json->temp_c .".c".'<br/>';
									echo "Feels like " .$json->feelslike_c .".c\n".'<br/>';
									echo "Wind Speed " .$json->windspd_kmh ."kmph\n".'<br/>';
									echo "Humidity "   .$json->humid_pct ."%\n".'<br/>';?> </h3>
					</div>
				</div>

				<div class="item">
					<img src="http://eskipaper.com/images/london-1.jpg">
					<div class="carousel-caption">
						<h2>London</h2>
						<?php
									$xml_string='http://api.weatherunlocked.com/api/current/51.507351,-0.127758?app_id=02694b99&app_key=ce8ea19839f35b0e536bc9ea656d8d77';
									$xml = file_get_contents($xml_string);
									$json = json_decode($xml);?>
							<h3>
								<?php echo "Temperature " .$json->temp_c .".c".'<br/>';
									echo "Feels like " .$json->feelslike_c .".c\n".'<br/>';
									echo "Wind Speed " .$json->windspd_kmh ."kmph\n".'<br/>';
									echo "Humidity "   .$json->humid_pct ."%\n".'<br/>';?>
					</div>
				</div>

				<div class="item">
					<img src="https://wallpaperscraft.com/image/tokyo_bridge_night_buildings_skyscrapers_59573_1920x1080.jpg">
					<div class="carousel-caption">
						<h2>Tokyo</h2>
						<?php
								$xml_string='http://api.weatherunlocked.com/api/current/35.689487,139.691706?app_id=02694b99&app_key=ce8ea19839f35b0e536bc9ea656d8d77';
								$xml = file_get_contents($xml_string);
								$json = json_decode($xml);?>
							<h3>
								<?php echo "Temperature " .$json->temp_c .".c".'<br/>';
								echo "Feels like " .$json->feelslike_c .".c\n".'<br/>';
								echo "Wind Speed " .$json->windspd_kmh ."kmph\n".'<br/>';
								echo "Humidity "   .$json->humid_pct ."%\n".'<br/>';?>
					</div>
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
    					<span class="glyphicon glyphicon-chevron-left"></span>
    					<span class="sr-only">Previous</span>
 					</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
    					<span class="glyphicon glyphicon-chevron-right"></span>
    					<span class="sr-only">Next</span>
  					</a>
			</div>
		</div>
	</div>

	<br/>
	<br/>

	<div class="container text-center" id="search">
		<div class="row">
			<div class="col-md-12">
				<form action="" method="post">
					<h1>Weather</h1>
			
					<hr/>
					
					<input type="text" name="name" placeholder="Your desired place" />
					<input type="submit"></input>
					
					<div class="text-center warn">
						<p><?php if(!isset($_POST['name']) || trim($_POST['name']) == '')
		{
   		echo "Do not include spaces";
		}
	else{echo "";} ?></p>
            <p><?php if(!isset($_POST['name']) || trim($_POST['name']) == '')
		{
   		echo "The search bar is empty";
		}
	else{
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
        $json = json_decode($xml);}
?></p>
					</div>
				
					<hr/>
				
			</form>
			</div>
		</div>	
</div>

	<div class="container" id="temp">
		<div class="row">
			<h3 id="fav">Today's temperature</h3>

			<br/>

			<div class="col-md-2 ">

				<?php if(!isset($_POST['name']) || trim($_POST['name']) == '')
{
  echo"";
}
	else{
				echo "Temperature " .$json->temp_c.'<br/>';
				echo "Feels like " .$json->feelslike_c .'<br/> ';
        echo "Wind Speed " .$json->windspd_kmh .'<br/> ';
        echo "Humidity "   .$json->humid_pct .'<br/> ';} ?>
			</div>
			<?php		if(!isset($_POST['name']) || trim($_POST['name']) == '')
{
   echo "";
}
	else{//forecast weather
$d='http://api.weatherunlocked.com/api/forecast/';
$e='?app_id=02694b99&app_key=ce8ea19839f35b0e536bc9ea656d8d77';
 $xml1_string=$d.$lat.$b.$long.$e;
       ;
$xml1 = file_get_contents($xml1_string);
$json = json_decode($xml1); }?>
				<div class="col-md-2 ">
					<?php if(!isset($_POST['name']) || trim($_POST['name']) == '')
{
   echo " ";
}
	else{ echo "Date ". $json->Days[0]->date.'<br/> ';
      echo "Maximum Temperature ". $json->Days[0]->temp_max_c.'<br/> ';
      echo "Minimum Temperature ". $json->Days[0]->temp_min_c.'<br/> ';
      echo "Maximum Humidity ".$json->Days[0]->humid_max_pct.'<br/> ';
      echo "Minimum Humidity ".$json->Days[0]->humid_min_pct.'<br/> ';
      echo "Maximum windspeed ".$json->Days[0]->windspd_max_kmh.'<br/> ';
      echo "Total Rainfall ".$json->Days[0]->rain_total_mm.'<br/> ';}?>
				</div>
				<div class="col-md-2 ">

				</div>

				<div class="col-md-2 ">

				</div>
				<div class="col-md-2 ">

				</div>
				<div class="col-md-2 ">

				</div>
		</div>
	</div>
	<div class="container ">
		<div class="row ">
			<h3 id="fav ">Forecast Temperature</h3>

			<br/>

			<div class="col-md-2 ">
				<?php if(!isset($_POST['name']) || trim($_POST['name']) == '')
{
   echo " ";
}
	else{   echo "Date ". $json->Days[1]->date.'<br/> ';
      echo "Maximum Temperature ".  $json->Days[1]->temp_max_c.'<br/> ';
      echo  "Minimum Temperature ". $json->Days[1]->temp_min_c.'<br/> ';
      echo "Maximum Humidity ". $json->Days[1]->humid_max_pct.'<br/> ';
      echo "Minimum Humidity ". $json->Days[1]->humid_min_pct.'<br/> ';
      echo  "Maximum windspeed ".$json->Days[1]->windspd_max_kmh.'<br/> ';
      echo  "Total Rainfall ".$json->Days[1]->rain_total_mm.'<br/> '; }?>
			</div>
			<div class="col-md-2 ">
				<?php if(!isset($_POST['name']) || trim($_POST['name']) == '')
{
   echo " ";
}
	else{
      echo "Date ". $json->Days[2]->date.'<br/> ';
      echo "Maximum Temperature ".  $json->Days[2]->temp_max_c.'<br/> ';
      echo "Minimum Temperature ".  $json->Days[2]->temp_min_c.'<br/> ';
      echo "Maximum Humidity ". $json->Days[2]->humid_max_pct.'<br/> ';
      echo "Minimum Humidity ". $json->Days[2]->humid_min_pct.'<br/> ';
      echo  "Maximum windspeed ".$json->Days[2]->windspd_max_kmh.'<br/> ';
      echo "Total Rainfall ".$json->Days[2]->rain_total_mm.'<br/> ';}?>
			</div>
			<div class="col-md-2 ">
				<?php   if(!isset($_POST['name']) || trim($_POST['name']) == '')
{
   echo " ";
}
	else{    echo "Date ". $json->Days[3]->date.'<br/> ';
      echo "Maximum Temperature ".  $json->Days[3]->temp_max_c.'<br/> ';
      echo "Minimum Temperature ".  $json->Days[3]->temp_min_c.'<br/> ';
      echo "Maximum Humidity ". $json->Days[3]->humid_max_pct.'<br/> ';
      echo "Minimum Humidity ". $json->Days[3]->humid_min_pct.'<br/> ';
      echo  "Maximum windspeed ".$json->Days[3]->windspd_max_kmh.'<br/> ';
      echo  "Total Rainfall ".$json->Days[3]->rain_total_mm.'<br/> ';}?>
			</div>
			<div class="col-md-2 ">
				<?php if(!isset($_POST['name']) || trim($_POST['name']) == '')
{
   echo "";
}
	else{
      echo "Date ". $json->Days[4]->date.'<br/> ';
      echo "Maximum Temperature ".  $json->Days[4]->temp_max_c.'<br/> ';
      echo "Minimum Temperature ".  $json->Days[4]->temp_min_c.'<br/> ';
      echo "Maximum Humidity ". $json->Days[4]->humid_max_pct.'<br/> ';
      echo "Minimum Humidity ". $json->Days[4]->humid_min_pct.'<br/> ';
      echo "Maximum windspeed ".$json->Days[4]->windspd_max_kmh.'<br/> ';
      echo "Total Rainfall ". $json->Days[4]->rain_total_mm.'<br/> '; }?>
			</div>
			<div class="col-md-2 ">
				<?php  if(!isset($_POST['name']) || trim($_POST['name']) == '')
{
   echo " ";
}
	else{ echo "Date ". $json->Days[5]->date.'<br/> ';
      echo "Maximum Temperature ".  $json->Days[5]->temp_max_c.'<br/> ';
      echo "Minimum Temperature ".  $json->Days[5]->temp_min_c.'<br/> ';
      echo "Maximum Humidity ". $json->Days[5]->humid_max_pct.'<br/> ';
      echo "Minimum Humidity ". $json->Days[5]->humid_min_pct.'<br/> ';
      echo  "Maximum windspeed ".$json->Days[5]->windspd_max_kmh.'<br/> ';
      echo "Total Rainfall ". $json->Days[5]->rain_total_mm.'<br/> ';}?>
			</div>
			<div class="col-md-2 ">
				<?php if(!isset($_POST['name']) || trim($_POST['name']) == '')
{
   echo "";
}
	else{
      echo "Date ". $json->Days[6]->date.'<br/> ';
      echo "Maximum Temperature ".  $json->Days[6]->temp_max_c.'<br/> ';
      echo "Minimum Temperature ".  $json->Days[6]->temp_min_c.'<br/> ';
      echo "Maximum Humidity ". $json->Days[6]->humid_max_pct.'<br/> ';
      echo "Minimum Humidity ". $json->Days[6]->humid_min_pct.'<br/> ';
      echo "Maximum windspeed ". $json->Days[6]->windspd_max_kmh.'<br/> ';
      echo "Total Rainfall ". $json->Days[6]->rain_total_mm.'<br/> ';} ?>
			</div>
		</div>
	</div>

	<?php endif ?>

		<div class="footer">
			<div class="container">	
				<footer>
					&copy; The Weather App
					<br/>
					<a href="#top">Back To Top</a>
				</footer>
			</div>
		</div>
		
</body>

</html>
