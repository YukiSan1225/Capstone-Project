<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$conn = mysql_connect("localhost", "admin", "pass");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Selecting Database
$db = mysql_select_db("CUSTOMER", $conn);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from CUSTOMER where password='$password' AND username='$username'", $conn);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: LoginHomePage.html"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysql_close($conn); // Closing Connection
}
}
?>