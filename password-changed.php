<?php require_once "UserDataController.php"; ?>
<?php
if($_SESSION['info'] == false){
    header('Location: login.php');  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <style type="text/css">
        form {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            text-align: center;
            position: absolute;
            margin: -46px 0px 0px 744px;
            }
            h1{
                position: absolute;
                font-size: 32px;
                font-family: verdana;
                font-weight: bold;
                color: #585858;
                margin: 180px 0px 0px 616px;
            }
        .imgbox {
            display: grid;
            height: 100%;
        }
        img{
            position: absolute;
            max-width: 100%;
            max-height: 100vh;
            margin: auto;
        }
        #btn{
            width: 260px !important;
            font-size: 24px;
            padding: 6px !important;
            background-color: #07ae84;
            color: white;
            margin-top: 16px;
        }
    </style>
</head>
<body>
    <div class="imgbox">
    <img src="images/successful.png">
    </div>
    <div class="container">
        <div class="">
            <div class="">
            <h1 class="text-center">Password changed successfully !!</h1>
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <input class="form-control button" id="btn" type="submit" name="login-now" value="Login Now">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>