<?php
	session_start();
   $result = "";
   if (isset($_POST['submit'])) {
    include("config.php");
    // username and password sent from form 
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);


    $sql = mysqli_query($con, "SELECT * FROM users where username = '$username'");
    $count = mysqli_num_rows($sql);
      
		
      if($count >0) {
      	$fetch = mysqli_fetch_assoc($sql);
        $hashpassword = $fetch["password"];
        if (password_verify($password, $hashpassword)) {
        	
        	//password expiry
        	 date_default_timezone_set("Asia/Kathmandu");
            $sql1 = "SELECT TIMESTAMPDIFF (MONTH, date, NOW()) AS tdif FROM users where username = '$username'";
            $result = $con->prepare($sql1);
            $result->execute();
            $result->store_result();
            $result->bind_result($tdif);
            $result->fetch();
            if ($tdif >= 2) {
                header('Location: passexpire.php');
                exit();
            }
            else {
                //session user
               $_SESSION['login_user'] = $username;
         header("location: dashboard.php");
            }
        }
        else{
        	$result = "<div class='alert alert-danger alert-dismissible'>
Login failed. Invalid username or password.
                  <a href='' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a>
                </div>";
        }

      }
      else {
         $result = "<div class='alert alert-danger alert-dismissible'>
    <a href='' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a>
    <strong>Login failed.</strong> Please enter username and password.
  </div>";
      }
 }

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!--linking css file-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/1c2c2462bf.js" crossorigin="anonymous"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<style>
		#eye{
			margin: -53px 0 0 0;
			margin-left: -20px;
			padding: 27px 9px 19px 0px;
			border-radius: 0px 5px 5px 0px;
			float: right;
			position: relative;
			right: 1%;
			top: -0.2%;
			z-index: 5;
			cursor: pointer;
		}
		.login-details p{
			font-size: 20px;
		}
		input{
			font-size: 18px !important;
			padding: 20px !important; 
		}
		h1{
			color: #319e81;
			font-size: 44px;
			margin-top: 60px !important;
			margin-bottom: -36px !important;
		}
		a{
			font-size: 20px;
			font-family: unset; 
			font-weight: bold;
		}
		.n-member{
			font-size: 24px;
			margin-top: 80px;
		}
	</style>
</head>
<body class="body-log">
	<div class="main-container">
		<div class="log-left-content">
			<form action="" method="post">
			<h1 class="login-header">Log In</h1>
				
			<div class="login-details">
				<p><!-- echo result --> <?php echo $result; ?></p>
			      <label style="float: left;" class="mb-2"><p class="support-p"><strong>Username</strong></p></label>
			    <input id="input" type="username" name="username" value="<?php if(isset($_POST['username'])){echo htmlentities ($_POST['username']);}?>"
			    class="form-control mb-4" placeholder="Enter your username">
			     <div class="password-detail">
			     <label style="float: left;" class="mb-3"><p class="support-p"><strong>Password:</strong></p></label>
			    <input id="password" class="form-control input-md" name="password" type="password" placeholder="Enter your password" >
			    
			    </div>
			    <span class="show-pass-log" onclick="toggle()">
			        <i id="eye" class="far fa-eye" onclick="myFunction(this)"></i>
			    </span>
			 </div>
			 <a href="forget-password.php">Forgot Password?</a>
			<button class="btn" name="submit" type="submit">LOG IN</button>
			<p class="n-member">New Member ? Click <a href="registration.php">here</a> to register.</p>
			
		</form>
		</div><!--end of left-content-->
		<div class="log-right-content">
			<h1 style="position: absolute; font-size: 42px; font-family: verdana; margin: 20px 0px 0px 136px !important; color: white;">Welcome Back</h1>
			<p style="position: absolute; font-size: 24px; font-family: verdana; margin: 82px 0px 0px 163px !important;">Nice to see you again!!</p>
			<img src="images/login.png" style="height: 600px; margin: 86px 0px 0px 0px; position: absolute;">
		</div><!--end of right-content-->
	</div> <!--end of main-container-->
	<!--linking javascript file-->
	<script src="js/app.js"></script>
</body>
</html>