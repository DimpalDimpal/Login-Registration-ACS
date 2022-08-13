<?php require_once "UserDataController.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a New Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <script src="https://kit.fontawesome.com/1c2c2462bf.js" crossorigin="anonymous"></script>
    <style>
        #eye{
    margin: -55px -200px 0 0;
    padding: 11px 9px 19px 0px;
    border-radius: 0px 5px 5px 0px;
    float: right;
    position: relative;
    right: 1%;
    top: -0.2%;
    z-index: 5;
    cursor: pointer;
    margin-left: -19px;
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
        form {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            text-align: center;
            position: absolute;
            margin: 75px 0px 0px 678px;
            }
            h1{
                font-size: 32px;
                font-family: verdana;
                font-weight: bold;
                color:#07ae84;
            }
            p{
                font-size: 18px;
                margin-top: 6px;
                width: 360px;
            }
            #password, #cpassword{
            width: 400px !important;
            font-size: 17px;
            padding: 20px !important;
            margin-top: 12px;
        }
        #btn{
            width: 360px !important;
            font-size: 17px;
            padding: 6px !important;
            background-color: #07ae84;
            color: white;
            margin-top: 16px;
        }
    </style>
</head>
<body>
    <div class="imgbox">
    <img src="images/reset-pass.png">
    </div>
    <div class="container">
        <div class="">
                <form action="new-password.php" method="POST" autocomplete="off">
                    <h1 class="text-center">New Password</h1>
                    <p class="text-center">Enter your email address below and we will send you an OTP to reset your password.</p>
                    
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div style="width: 400px; padding: 5px;" class="alert alert-danger alert-dismissible">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input id="password" class="form-control" type="password" name="password" placeholder="Create new password" required>
                    </div>
                    <span class="show-pass-log" onclick="toggle()">
                    <i id="eye" class="far fa-eye" onclick="myFunction(this)"></i>
                </span>
                    <div class="form-group">
                        <input id="cpassword" class="form-control" type="password" name="cpassword" placeholder="Confirm your password" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control button" id="btn" type="submit" name="change-password" value="Change">
                    </div>
                </form>
        </div>
    </div>
    
</body>
<script src="js/app.js"></script>
</html>