<?php
   include('includes/session.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

	<style type="text/css">
		.sticky-top{
			background-color: black;
		}

		#log-outButton{
			color: red;
		}

		.main{
			background-color: #cccccc;
			
			width: 100%;
			height: 634px;
			background-image: url("images/dashboard.png");
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
		}
h1{
	width: 780px;
	margin: auto;
	text-align: center;
	font-weight: bold;
}

		.circle{
	height: 450px;
	width: 450px;
	margin: auto;
	background-color: #00A300;
	border-radius: 50%;
	text-align: center;
	opacity: 50%;
	margin-top: 10px;
	color: white;
	box-shadow: -1px 18px black;
}
.circle > p{
	font-family: cursive;
	font-size: 30px;
}
	</style>
</head>
<body>

	<div class="sticky-top">
		<nav class="navbar sticky-top navbar-light bg-light">
		  <div class="container-fluid">
		    <h2>Hello <b style="color: green;"><?php echo $login_session;?></b>,</h2>
		    <h1>Welcome to Advanced Cyber Security</h1>
		    <a href="logout.php" id="log-outButton"><button type="button" class="btn btn-danger">Log out</button></a>
		  </div>
		</nav>
	</div>
	
	<hr/>
	<div class="main">
			
		</div>

</body>
</html>