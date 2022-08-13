

<?php

   $result = "";
   if (isset($_POST['submit'])) {
     # code...
    include("config.php");
    //data
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confpassword = mysqli_real_escape_string($con, $_POST['confpassword']);
    //validate paswword
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    //reCaptcha
     $secretKey = '6LcO4DEgAAAAAFm76CmAmRNBIHYqR3yx9v4r5qP9';
       $responseKey = $_POST['g-recaptcha-response'];
       $userIP = $_SERVER['REMOTE_ADDR'];
     $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";

     $response = file_get_contents($url);
     $response = json_decode($response);
   

   //empty field validation
 if ($fname == "" || $lname == "" || $email == "" || $username == "" || $password == "" || $confpassword == "") {
   # code...
  $result = "<div class='alert alert-danger alert-dismissible'>
    <a href='' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a>
    <strong>Register failed.</strong> Please check your inputs. All field are required.
  </div>";
 }
//firstname and lastname validation
 else{
   if (!preg_match("/^[a-zA-Z'. -]+$/", $fname) || !preg_match("/^[a-zA-Z'. -]+$/", $lname)) {
     # code...
    $result = "<div class='alert alert-danger alert-dismissible'>
   <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Last Name or First Name should contain only letters <strong>e.g Dimpal</strong></div>";

   }
   //email validation
   elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     # code...
    $result = "<div class='alert alert-danger alert-dismissible'>
   <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>You entered an Invalid Email Format!</div>";
   }
 // password and confirm password validation   
   elseif ($password != $confpassword) {
     # code...
    $result = "<div class='alert alert-danger alert-dismissible'>
    <a href='' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a>
    <strong>Register failed.</strong> Password and confirm password doesnot match.
  </div>";
   }
   //password validation 
   elseif (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8 ) {
     # code...
    $result = "<div class='alert alert-danger alert-dismissible'>
   <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Password must be 8 characters in length with atleast one uppercase and lowercase letter, one numeric and special character like <strong>Example$123#</strong></div>";

   }
   //email and username already exist validation
   else{
  $sql = $con->query("SELECT uid FROM users WHERE email = '$email'");
 if ($sql -> num_rows > 0) {
   # code...
  $result = "<div class='alert alert-danger alert-dismissible'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Email already exists in the database</div>";

 }
 else{
 	$sql = $con->query("SELECT uid FROM users WHERE username = '$username'");
 	if ($sql -> num_rows > 0) {
 		$result = "<div class='alert alert-danger alert-dismissible'>
   <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Username already exists in the database</div>";
 	}
  //recaptcha validation
 	elseif (!$response->success) {
   # code...
   $result = "<div class='alert alert-danger alert-dismissible'>
   <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Check the box, to ensure your not a robot.</div>";

 }

 	else{
//hashing password
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
//inserting the user data into the database
$sql = $con->query("INSERT INTO users (fname, lname, email, username, password,date) VALUES ('$fname', '$lname', '$email', '$username', '$hashedPassword',NOW())");
// success alert
$result = "<div class='alert alert-success' alert-dismissible>
<a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
Account Successfully Created.
                  
                </div>";
 }
 }
   }
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
      margin-right: -20px;
      padding: 27px 9px 19px 0px;
      border-radius: 0px 5px 5px 0px;
      float: right;
      position: relative;
      right: 1%;
      top: -0.2%;
      z-index: 5;
      cursor: pointer;
    }
    .reg-left-content h1{
      font-size: 30px;
      position: absolute;
      top: 525px;
      left:114px;
      color: #0c0c0c;
    }
    .reg-left-content button{
      position: absolute;
      top: 570px;
      left:220px;
      color: #393838 !important;
      font-weight: bold;
      background-color: white;
      border: 2px solid #393838;
    }
  </style>
</head>
<body class="body-reg">
	<div class="main-container">
		<div class="reg-left-content">
      <h1>Already have an account?</h1>
      <a href="login.php"><button class="btn">Login</button></a>
			<img src="images/create-account.png" style="display: absolute; height: 600px; margin-top: -18px;">
      
		</div><!--end of left-content-->
		<div class="reg-right-content">
			<form action="" method="post">
			<h1>Create Account</h1>
			<p> <?php echo $result; ?></p>
			<div class="form-row">
			  <div class="form-group col-md-6">
			     <label class="mb-2"><p class="support-p"><strong>First Name</strong></p></label>
			    <input id="input" type="text" name="fname" value="<?php if(isset($_POST['fname'])){echo htmlentities ($_POST['fname']);}?>"
			    class="form-control mb-4" placeholder="Enter your first name..">
			     <br>
			  </div>
			  <div class="form-group col-md-6">
			     <label style="float: left;" class="mb-2"><p class="support-p"><strong>Last Name</strong></p></label>
			    <input id="input" type="text" name="lname" value="<?php if(isset($_POST['lname'])){echo htmlentities ($_POST['lname']);}?>"
			    class="form-control mb-4" placeholder="Enter your last name..">
			    <br>
			  </div>
			</div>

			<div class="form-row">
			  <div class="form-group col-md-6">
			     <label style="float: left;" class="mb-2"><p class="support-p"><strong>Username</strong></p></label>
			    <input id="input" type="text" name="username" value="<?php if(isset($_POST['username'])){echo htmlentities ($_POST['username']);}?>"
			    class="form-control mb-4" placeholder="Enter your username">
			     <br>
			   </div>
			     <div class="form-group col-md-6">
			      <label style="float: left;" class="mb-2"><p class="support-p"><strong>Email</strong></p></label>
			    <input id="input" type="email" name="email" value="<?php if(isset($_POST['email'])){echo htmlentities ($_POST['email']);}?>"
			    class="form-control mb-4" placeholder="Enter your email">
			     <br>
			   </div>
			 </div>

			 <div class="form-row">
			  <div class="form-group col-md-6">
			     <label style="float: left;" class="mb-3"><p class="support-p"><strong>Password:</strong></p></label>
			    <input id="password" name="password" type="password" 
                        placeholder="Password">
			    <span class="show-pass" onclick="toggle()">
			                            <i id="eye" class="far fa-eye" onclick="myFunction(this)"></i>
			                        </span>
			      <br>
			    </div>
			         <div class="form-group col-md-6">
			    <label style="float: left;" class="mb-3"><p class="support-p"><strong>Confirm Password:</strong></p></label>
			    <input id="cpassword" type="password" name="confpassword" class="form-control mb-4" placeholder="Confirm Password...">
			       </div>
			</div>

			<div id="popover-password">
                            <p><span id="result"></span></p>
                            <div class="progress">
                                <div id="password-strength" 
                                    class="progress-bar" 
                                    role="progressbar" 
                                    aria-valuenow="40" 
                                    aria-valuemin="0" 
                                    aria-valuemax="100" 
                                    style="width:0%">
                                </div>
                            </div>
                            <h5>Password must contain:</h5>
                            <ul class="list-unstyled">
                            	<li class="">
                                    <span class="eight-character">
                                        <i class="fas fa-circle" aria-hidden="true"></i>
                                        &nbsp;Atleast 8 Character
                                    </span>
                                </li>
                                <li class="">
                                    <span class="one-number">
                                        <i class="fas fa-circle" aria-hidden="true"></i>
                                        &nbsp;Number (0-9)
                                    </span> 
                                </li>
                                <li class="">
                                    <span class="low-upper-case">
                                        <i class="fas fa-circle" aria-hidden="true"></i>
                                        &nbsp;Lowercase &amp; Uppercase
                                    </span>
                                </li>
                                
                                <li class="">
                                    <span class="one-special-char">
                                        <i class="fas fa-circle" aria-hidden="true"></i>
                                        &nbsp;Special Character (!@#$%^&*)
                                    </span>
                                </li>
                                
                            </ul>
                        </div>

          <!-- Google reCAPTCHA box -->
    <div class="g-recaptcha" data-sitekey="6LcO4DEgAAAAAIC3MPpZSIWUgANeJjVhoipWdjQJ"></div>

			<button class="btn" name="submit" type="submit">Sign Up</button>
		</form>
		</div><!--end of right-content-->
	</div> <!--end of main-container-->
	<!--linking javascript file-->
	<script src="js/app.js"></script>
</body>
</html>