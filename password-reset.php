<?php
require_once('connect.php');
if(isset($_POST) & !empty($_POST)){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $sql="SELECT * FROM `customer` where Email_Address='$email'";
    $result=mysqli_query($con, $sql);
    if(mysqli_num_rows($result) == 1){
        $r = mysqli_fetch_assoc($res);
        $password = $r['Password'];
        $name = $r['FName'];
        $to = $r['Email_Address'];
        $subject = "Your Recovered Password: ERPG Encoder";

        $message = "Hello '$name'! Please use this password to login: " . $password;
        $headers = "From: info.erpg@gmail.com";
        if(mail($to, $subject, $message, $headers)){
            echo "Your Password has been sent to your email";
        }
        else{
            echo "Fialed to email your password. Please contact info.erpg@gmail.com for further assistance.";
        }
    }
    else{
        echo "Username doesn't exist in database";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>ERPG Password Reset</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- add header -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">E-RPG</a>
        </div>
        <!-- menu items -->
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="login.php">Login</a></li>
                <li><a href="register.php">Sign Up</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 well">
            <form role="form" action="send_link.php" method="post">
                <fieldset>
                    <legend>Password Reset</legend>
                    <p>Enter an email address to send password information</p>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" name="email" placeholder="Your Email" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit_email" value="password-reset" class="btn btn-primary" />
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">    
        Existing User? <a href="login.php">Login Here</a>
        </div>
    </div>
</div>

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>