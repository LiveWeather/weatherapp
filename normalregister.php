<?php include('server.php') ?><!--To insert the sserver.php file-->
<!DOCTYPE html>
<html>

<body>
  
<link rel="stylesheet" type="text/css" href="style.css">
  <div id="header">
   

<form action="register.php" method="post" style="border:1px solid #ccc">

  <?php include('errors.php'); ?>  <!--displays error-->
   <h2>Signup Form</h2>
  <div class="container">
    <label><b>Name</b></label>
    <input type="text" placeholder="Enter name" name="username" required>
    
    <label><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label>Password</label>
			<input type="password" name="password_1">

    <label>Repeat password</label>
			<input type="password" name="password_2">
		</div>
    

    <div class="clearfix">
      <button type="submit" class="btn" name="reg_user">Sign Up</button>
    </div>
  
 
  <p>
			Already a member? <a href="login.php">Log in</a>  <!--Redirects user to login.php page-->

		</p>
</form>
  </div>


</body>
</html>
