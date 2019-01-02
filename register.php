<?php
session_start();

if(isset($_SESSION['usr_id'])) {
    header("Location: homepage.php");
}

include_once 'connect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['submit'])) {
    $fname = mysqli_real_escape_string($con, $_POST['first_name']);
    $lname = mysqli_real_escape_string($con, $_POST['last_name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $patterns = array( //Patterns to test against XSS
        // Match any attribute starting with "on" or xmlns
        '#(<[^>]+[\x00-\x20\"\'\/])(on|xmlns)[^>]*>?#iUu',
    
        // Match javascript:, livescript:, vbscript: and mocha: protocols
        '!((java|live|vb)script|mocha):(\w)*!iUu',
        '#-moz-binding[\x00-\x20]*:#u',
    
        // Match style attributes
        '#(<[^>]+[\x00-\x20\"\'\/])style=[^>]*>?#iUu',
    
        // Match unneeded tags
        '#</*(applet|meta|xml|blink|link|style|script|embed|object|iframe|frame|frameset|ilayer|layer|bgsound|title|base)[^>]*>?#i'
    );
    //name can contain only alpha characters and space
    if (!preg_match($patterns,$fname)) {
        $error = true;
        $fname_error = "First name must contain only alphabets and space";
    }
    if (!preg_match($patterns,$lname)) {
        $error = true;
        $lname_error = "Last name must contain only alphabets and space";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match($patterns,$email)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
    }
    if(strlen($password) < 6) {
        $error = true;
        $password_error = "Password must be minimum of 6 characters";
    }
    if($password != $cpassword) {
        $error = true;
        $cpassword_error = "Password and Confirm Password doesn't match";
    }
    //Check to see if user exists in DB
    $prevUser = mysqli_query($con, "SELECT * from customer where Email_Address=sha1('" . $email . "')");
    if($row = mysqli_fetch_array($prevUser)){
        $error = true;
        $email_error="Please use another email address.";
    }
    else{
    if (!$error) {
        if(mysqli_query($con, "INSERT INTO customer(Lname, FName, Email_Address, Phone, Password) VALUES (sha1('" . $lname . "'), '" . $fname . "', sha1('" . $email . "'), sha1('" . $phone . "'), sha1('" . $password . "'))")) {
            $successmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
        } else {
            $errormsg = "Error in registering...Please try again later!";
        }
    }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration Script</title>
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
                <li><a href="login.php">Login</a></li>
                <li class="active"><a href="register.php">Sign Up</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 well">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
                <fieldset>
                    <legend>Sign Up</legend>

                    <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" name="first_name" placeholder="Enter First Name" required value="<?php if($error) {echo $fname;} ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($fname_error)) {echo $fname_error;} ?></span>
                    </div>
                    <div class="form-group">
                        <label for="name">Last Name</label>
                        <input type="text" name="last_name" placeholder="Enter Last Name" required value="<?php if($error) {echo $lname;} ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($lname_error)) {echo $lname_error;} ?></span>
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" name="email" placeholder="Email" required value="<?php if($error) {echo $email;} ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($email_error)) {echo $email_error;} ?></span>
                    </div>
                    <div class="form-group">
                        <label for="name">Phone</label>
                        <input type="text" name="phone" placeholder="Enter Phone Number" required value="<?php if($error) {echo $name;} ?>" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" name="password" placeholder="Password" required class="form-control" />
                        <span class="text-danger"><?php if (isset($password_error)) {echo $password_error;} ?></span>
                    </div>

                    <div class="form-group">
                        <label for="name">Confirm Password</label>
                        <input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
                        <span class="text-danger"><?php if (isset($cpassword_error)) {echo $cpassword_error;} ?></span>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" value="Sign Up" class="btn btn-primary" />
                    </div>
                </fieldset>
            </form>
            <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">    
        Already Registered? <a href="login.php">Login Here</a>
        </div>
    </div>
</div>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
