<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '/var/www/html/vendor/autoload.php';
require_once('connect.php');
if(isset($_POST) & !empty($_POST)){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $result=mysqli_query($con, "SELECT * FROM customer WHERE Email_Address = '" . $email ."'");
    if(mysqli_num_rows($result) == 1){
        $r = mysqli_fetch_assoc($result);
        $oripass = $r['Password'];
        $newpass = randomPassword(5,1,"lower_case,upper_case,numbers,special_symbols");
        $id = $r['cusid'];
        $name = $r['FName'];
        $to = $r['Email_Address'];
        $output='<p>Dear user,</p>';
        $output.='<p>Please refer to the password that is listed below. If you need to change your password, please use the password below to login and change it.</p>';
        $output.='<p>-------------------------------------------------------------</p>';
        $output.='<p>Password: '.$oripass.'</p>';		
        $output.='<p>-------------------------------------------------------------</p>';
        $output.='<p>Please be sure to delete this email once you have copied your password.</p>';
        $output.='<p>Thanks,</p>';
        $output.='<p>ERPG Support Team</p>';
        $body = $output; 
        $subject = "Password Recovery - ERPG Support Team";

        $email_to = $email;
        $fromserver = "info.erpg@gmail.com"; 
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Host = "smtp.gmail.com"; // Enter your host here
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Username = "info.erpg@gmail.com"; // Enter your email here
        $mail->Password = "ERPG_Encoder1"; //Enter your password here
        $mail->Port = 587;
        $mail->IsHTML(true);
        $mail->From = "info.erpg@gmail.com";
        $mail->FromName = "ERPG Support Team";
        $mail->Sender = $fromserver; // indicates ReturnPath header
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($email_to);
        if(!$mail->Send()){
        echo "Mailer Error: " . $mail->ErrorInfo;
        }else{
            if(mysqli_query($con, "update customer set Password = md5('" . $newpass . "') where cusid='" .$id. "'")){
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

    //Function for Resetting Password
    function randomPassword($length, $count, $characters) {
 
        // $length - the length of the generated password
        // $count - number of passwords to be generated
        // $characters - types of characters to be used in the password
         
        // define variables used within the function    
            $symbols = array();
            $passwords = array();
            $used_symbols = '';
            $pass = '';
         
        // an array of different character types    
            $symbols["lower_case"] = 'abcdefghijklmnopqrstuvwxyz';
            $symbols["upper_case"] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $symbols["numbers"] = '1234567890';
            $symbols["special_symbols"] = '!?~@#-_+<>[]{}';
         
            $characters = explode(",",$characters); // get characters types to be used for the passsword
            foreach ($characters as $key=>$value) {
                $used_symbols .= $symbols[$value]; // build a string with all characters
            }
            $symbols_length = strlen($used_symbols) - 1; //strlen starts from 0 so to get number of characters deduct 1
             
            for ($p = 0; $p < $count; $p++) {
                $pass = '';
                for ($i = 0; $i < $length; $i++) {
                    $n = rand(0, $symbols_length); // get a random character from the string with all characters
                    $pass .= $used_symbols[$n]; // add the character to the password string
                }
                $passwords[] = $pass;
            }
             
            return $passwords; // return the generated password
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