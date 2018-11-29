<?php
session_start();

include_once 'connect.php';

//check if form is submitted
if (isset($_POST['passres'])) {
    $id = $_SESSION['usr_id'];
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['confpassword']);
    
    if($password != $cpassword) {
        $error = true;
        $cpassword_error = "Password and Confirm Password doesn't match";
    }else{
        if (mysqli_query($con, "update customer set Password = sha1('" . $newpass . "') where cusid='" .$id. "'")) {
            header("Location: homepage.php");
        } else {
            $errormsg = "Error changing password. Please contact ERPG Support Team.";
        }
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
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 well">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="passreset">
                <fieldset>
                    <legend>Password Reset</legend>
                    
                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" name="password" placeholder="Your Password" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="name">Confirm Password</label>
                        <input type="password" name="confpassword" placeholder="Your Password" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <input type="submit" name="passres" value="Reset" class="btn btn-primary" />
                    </div>
                </fieldset>
            </form>
            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">    
        New User? <a href="register.php">Sign Up Here</a>
        </div>
        <div class="col-md-4 col-md-offset-4 text-center">    
        Forgot Password? <a href="password-reset.php">Forgot Password</a>
        </div>
    </div>
</div>

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
