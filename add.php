<?php
session_start();
include('connect.php');
//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['add'])) {
    $url = mysqli_real_escape_string($con, $_POST['url']);
    $email_username = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $usrid = $_SESSION['usr_id'];

    if (!$error) {
        if(mysqli_query($con, "INSERT INTO cushome(website_name, cusid, password, email_username) VALUES ('" . $url . "', '" . $usrid . "', TO_BASE64('" . $password . "'), '" . $email_username . "')")) {
            header("Location: homepage.php");
        } else {
            $errormsg = "Error in adding information... Please try again later!";
        }
        // ENCODE("Zaynab",sha1("Block"))
        // "INSERT INTO customer(Lname, FName, Email_Address, Phone, Password) VALUES ('ENCODE(" . $lname . ",sha1("ERPG"))'
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adding Information</title>
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
                <li><a href="homepage.php">Homepage</a></li>
                <li class="active"><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 well">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="addform">
                <fieldset>
                    <legend>Add Information</legend>
                    <div class="form-group">
                        <label for="name">URL</label>
                        <input type="text" name="url" placeholder="URL" required value="<?php if($error) echo $url; ?>" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="name">Email/Username</label>
                        <input type="text" name="email" placeholder="Email/Username" required value="<?php if($error) echo $email_username; ?>" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" name="password" placeholder="Password" id="long_password" required class="form-control" />
                        <input type="checkbox" name="showPass" onclick="togglePass();"/>Show Password
                    </div>
                    <div class="form-group">
                        <input type="submit" name="add" value="Add Information" class="btn btn-primary" style="float: left"/>
                        <input type="button" name="generate" value="Generate Password" class="btn btn-primary" onclick="getPass();" style="float: right"/>
                    </div>
                </fieldset>
            </form>
            <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
        </div>
    </div>
</div>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
function getPass(){
//defining the character sets, so that it would be easy to choose letters
        //from them
        var lower_charset = "abcdefghijklmnopqrstuvwxyz"; //lower case characters
        var upper_charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";//upper case characters
        var special_charset="?.$@;:_^#![]{}"; //special characters
        var numset="0123456789";//numeric characters
        var minLength=16; //minimum length of the password
        var maxLength=24; //maximum length of password
        //generating a random length between 16 and 24
        var length = Math.floor(Math.random() * (maxLength-minLength+1)) + minLength;
        //defining a variable to store the password
        var pass="";
        //adding length-6 number of random lowercase characters to the password
        for(var i=0;i<length-6;i++){
            pass+=lower_charset.charAt(Math.floor(Math.random() * lower_charset.length));
        }
        //adding 3 random upper case characters
        for(var i=0;i<3;i++){
            pass+=upper_charset.charAt(Math.floor(Math.random() * upper_charset.length));
        }
        //adding one random special character
        pass+=special_charset.charAt(Math.floor(Math.random() * special_charset.length));
        //adding two random numbers
        for(var i=0;i<2;i++){
            pass+=numset.charAt(Math.floor(Math.random() * numset.length));
        }
        //displaying the password in the html page
        var long_password=document.getElementById("long_password");
        long_password.value=pass;
}
function togglePass() {
    var x = document.getElementById("long_password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
} 
</script>
</body>
</html>
