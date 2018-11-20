<?php
session_start();

if(isset($_SESSION['usr_id'])!="") {
    header("Location: index.php");
}

include_once 'connect.php';
//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['add'])) {
    $url = mysqli_real_escape_string($con, $_POST['url']);
    $email_username = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $usrid = $_GET['id'];

    if (!$error) {
        if(mysqli_query($con, "INSERT INTO cushome (website_name, cusid, password, email_username) VALUES ('" . $url . "', '" . $usrid . "', '" . $password . "', '" . $email_username . "', '" . $password . "'")) {
            header("Location: homepage.php");
        } else {
            $errormsg = "Error in adding information...Please try again later!";
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
                        <input type="password" name="password" placeholder="Password" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="add" value="Add" class="btn btn-primary" />
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
</body>
</html>
