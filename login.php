<?php include('server.php') ?><!--To insert the sserver.php file-->
<!DOCTYPE html>
<html>

<body>
  
<link rel="stylesheet" type="text/css" href="logreg.css">
  <div id="header">
   

<form action="login.php" method="post" style="border:1px solid #ccc">

  <?php include('errors.php'); ?>  <!--displays error-->
   <h2>Login</h2>
  <div class="container">
    <label><b>Name</b></label>
    <input type="text" placeholder="Enter name" name="username" required>

  <label>Password</label>
			<input type="password" name="password">
    

    <div class="clearfix">
      <button type="submit" class="btn" name="login_user">Login</button>
    </div>
  </div>
  <p>
			Register Here :  <a href="register.php">Sign Up</a>  <!--Redirects user to login.php page-->

		</p>
</form>
  </div>


</body>
</html>
