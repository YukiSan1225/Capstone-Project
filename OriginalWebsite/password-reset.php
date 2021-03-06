<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '/var/www/html/vendor/autoload.php';
require_once('connect.php');
if(isset($_POST) & !empty($_POST)){
    $erpg_emailaddr = "info.erpg@gmail.com";
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $result=mysqli_query($con, "SELECT * FROM customer WHERE Email_Address = sha1('" . $email ."')");
    if(mysqli_num_rows($result) == 1){
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
        $r = mysqli_fetch_assoc($result);
        $oripass = $r['Password'];
        $newpass = substr( str_shuffle( $chars ), 0, 8 );
        $id = $r['cusid'];
        $name = $r['FName'];
        $to = $email;
        $output='<p>Dear user,</p>';
        $output.='<p>Please refer to the password that is listed below. If you need to change your password, please use the password below to login and change it.</p>';
        $output.='<p>-------------------------------------------------------------</p>';
        $output.='<p>Password: '.$newpass.'</p>';		
        $output.='<p>-------------------------------------------------------------</p>';
        $output.='<p>Please be sure to delete this email once you have copied your password.</p>';
        $output.='<p>Thanks,</p>';
        $output.='<p>ERPG Support Team</p>';
        $body = $output; 
        $subject = "Password Recovery - ERPG Support Team";

        $email_to = $email;
        $fromserver = $erpg_emailaddr; 
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Host = "smtp.gmail.com"; // Enter your host here
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Username = $erpg_emailaddr; // Enter your email here
        $mail->Password = "ERPG_Encoder1"; //Enter your password here
        $mail->Port = 587;
        $mail->IsHTML(true);
        $mail->From = $erpg_emailaddr;
        $mail->FromName = "ERPG Support Team";
        $mail->Sender = $fromserver; // indicates ReturnPath header
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($email_to);
        if(!$mail->Send()){
        echo "Mailer Error: " . $mail->ErrorInfo;
        }else{
            if(mysqli_query($con, "update customer set Password = sha1('" . $newpass . "') where cusid='" .$id. "'")){
            echo "<div class='error'>
            <p>An email has been sent to you with instructions on how to reset your password.</p>
            </div><br /><br /><br />";
            }
            else{
                die('Something went wrong: '.mysql_error());
            }
        }
    }
    else{
        echo "Email doesn't exist in database";
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
            <form role="form" method="POST">
                <fieldset>
                    <legend>Password Reset</legend>
                    <p>Enter an email address to send password information</p>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" name="email" placeholder="Your Email" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit_email" value="Submit" class="btn btn-primary" />
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