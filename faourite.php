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
$res="";
$ves="";
?>
<!DOCTYPE html>
<html>

<head>
	<title>Favourites</title>
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
						<li class="navigation"><a href="favourite.php?" style="color: blue;">Favourites</a></li>
						<li class="navigation"><a href="index.php?logout='1'" style="color: red;">Logout</a></li>

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


	<br/>
	<br/>

	<div class="container text-center" id="search">
		<div class="row">
			<div class="col-md-12">
				<div class="container">
		<h2><b>DELETE</b></h2>
	<form action="" method="post"> 
	
	<label id="first">ID</label><br/>
	<input type="text" name="id3" placeholder="Enter Id of Location"><br/>

	<button  name="delete">delete</button>
		</form>
	<h2>
		Your favourites
	</h2>
	
	 <?php 
					if(!isset($_POST['id3']) || trim($_POST['id3']) == '')
{
  echo"";
}
	else{
		 $user = 'root';
   $pass = '';
   $db = 'favourites';
   
   $conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");//delete
	if(isset($_POST['delete']))
	{
		$sql="DELETE FROM favourites WHERE id='".$_POST["id3"]."'" or die ("this stuffed up");

		$result = mysqli_query($conn,$sql);
	}
	}

?>
					<?php
					
 
   $user = 'root';
   $pass = '';
   $db = 'favourites';
   
   $conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

	if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
   }
   echo " <br> <br>";
   
   $sql = "SELECT * FROM favourites WHERE username='".$_SESSION['username']."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo "Location ID: " . $row["id"] . "<br>"  . $row["location"]. "<br>" ;
    $loc=$row["location"];
    $id= $row["id"];
	}
		$ves=0;
	}
  else {
	echo "0 results";
		$res=1;
	}
	
?>
  <hr/>
  
     <?php
					if($res > $ves){
						echo"";
					}
					else{
				
   $link1="https://maps.googleapis.com/maps/api/geocode/json?address=";
        $link2= $loc;
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
			echo "Temperature at ".$loc.'<br/>';
      echo "Temperature " .$json->temp_c." .C".'<br/>';
				echo "Feels like " .$json->feelslike_c ." .C".'<br/> ';
        echo "Wind Speed " .$json->windspd_kmh ." Kmph".'<br/> ';
        echo "Humidity "   .$json->humid_pct ." %".'<br/> '; }?>

 
		</div>
			</div>
		</div>	
</div>

	<hr/>		
	<br/>
	
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script>
		$(function() {
			$('a[href*="#"]:not([href="#myCarousel"])').click(function() {
				if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
					var target = $(this.hash);
					target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				if (target.length) {
					$('html, body').animate({
					scrollTop: target.offset().top
					}, 1000);
					return false;
					}
				}	
			});
		});
		</script>

	<?php endif ?>

		<div class="footer">
			<div class="container">	
				<footer>
					&copy; The Weather Application
					<br/>
					<a href="#top">Back To Top</a>
				</footer>
			</div>
		</div>
		

		
</body>
<!--echo "ID: " . $row["id"] . "<br> Name: " . $row["username"]. "<br>" . " Location: " . $row["location"]. "<br>" ;-->
</html>
