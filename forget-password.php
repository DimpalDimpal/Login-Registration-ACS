<?php require_once "UserDataController.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forget Password</title>
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
                font-size: 40px;
                font-family: verdana;
                font-weight: bold;
                color:#07ae84;
            }
            p{
                font-size: 18px;
                margin-top: 6px;
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
        #email{
            width: 400px !important;
            font-size: 17px;
            padding: 20px !important;
            margin-top: 26px;
        }
        #btn{
            width: 360px !important;
            font-size: 19px;
            padding: 6px !important;
            background-color: #07ae84;
            color: white;
            margin-top: 16px;
        }
        a{
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="imgbox">
    <img src="images/forgot-pass.png">
    </div>
    <div class="container">
            <div class="">
                <form action="forget-password.php" method="POST" autocomplete="">
                    <h1 class="text-center">Forgot Password ?</h1>
                    <p class="text-center">Enter your email address below and we will send you an OTP to reset your password.</p>
                    <?php
                        if(count($errors) > 0){
                            ?>
                            <div class='alert alert-danger alert-dismissible'>
                                <a href='' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a>
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>

                            <?php
                        }
                    ?>
                    <div class="form-group">
                        <input class="form-control" id="email" type="email" name="email" placeholder="Enter email address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input id="btn" class="form-control button" type="submit" name="check-email" value="Continue">
                    </div>
                    <a href="login.php"><- Back to LogIn</a>
                </form>
            </div>
        
    </div>
    
</body>
</html>