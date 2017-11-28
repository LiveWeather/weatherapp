		<h2><b>ADD</b></h2>
	<form action="" method="post"> 
	

	<label id="first">Location</label><br/>
	<input type="salary" name="location"><br/>
	<input type="submit" name="save"/>
			</form>	
<?php 
 
   $user = 'root';
   $pass = '';
   $db = 'favourites';
   
   $conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
   
   if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
   }

   echo "Connected successfully <br> <br>";
   
   $sql = "SELECT * FROM favourite WHERE username='".$_SESSION['username']."'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo "ID: " . $row["id"] . "<br> Name: " . $row["username"]. "<br>" . " Location " . $row["location"]. "<br>" ;
	}
	} else {
	echo "0 results";
	}
?>
	<?php
	//insert
	if(isset($_POST['save']))
	{
		$sql = "INSERT INTO favourites (username, location)
		VALUES ('".$_SESSION['username']."','".$_POST["location"]."')";

		$result = mysqli_query($conn,$sql);
	}
?>
	<?php
	
	//delete
	if(isset($_POST['delete']))
	{
		$sql="DELETE FROM favourite WHERE id='".$_POST["id3"]."'" or die ("this stuffed up");

		$result = mysqli_query($conn,$sql);
	}
	
	
	
	

?>
