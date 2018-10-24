<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['email']) || empty($_POST['password'])) {
$error = "Email or Password is invalid";
}
else
{
// Define $username and $password
$email=$_POST['email'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost", "admin", "pass");
// To protect MySQL injection for Security purpose
$email = stripslashes($email);
$password = stripslashes($password);
$email = mysqli_real_escape_string($email);
$password = mysqli_real_escape_string($password);
// Selecting Database
$db = mysqli_select_db("CUSTOMER", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query("select * from CUSTOMER where Password='$password' AND Email_Address='$email'", $connection);
$rows = mysqli_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: LoginHomePage.php"); // Redirecting To Other Page
} else {
$error = "Email or Password is invalid";
}
mysqli_close($connection); // Closing Connection
}
}
?>