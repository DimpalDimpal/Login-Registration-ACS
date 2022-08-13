<?php require_once "UserDataController.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Code</title>
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
            margin: -46px 0px 0px 784px;
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
    <img src="images/otp.png">
    </div>
    <div class="container">
            <div class="">
                <form action="reset-code.php" method="POST" autocomplete="off">
                    <h1 class="text-center">Code Verification</h1>
                    <p class="text-center">Enter the otp code we have sent you in your email.</p>
                    
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class='alert alert-danger alert-dismissible'>
                                <a href='' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a>
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
                        <input class="form-control" id="email" type="number" name="otp" placeholder="Enter code" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" id="btn" type="submit" name="check-reset-otp" value="Submit">
                    </div>
                </form>
            </div>
    </div>
    
</body>
</html>