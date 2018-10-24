<?php
$email = $_POST["email"];
$pass = $_POST["password"];

$con = mysqli_connect("localhost","admin","pass");

if(!$con){
    die('Connection Failed'.mysqli_error());
}

mysqli_select_db("CUSTOMER",$con);

$result = mysqli_query("SELECT Email_Address, Password FROM CUSTOMER WHERE Email_Address='$email'");

$row = mysqli_fetch_array($result);

if($row["email"]==$email && $row["password"]==$pass)
header('location: LoginHomePage.html');
else
echo"Email or password is invalid."
?>