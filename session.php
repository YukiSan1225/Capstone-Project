<?php
$conn = mysqli_connect("localhost","admin","pass");

$db = mysqli_select_db("CUSTOMER", $conn);

session_start();

$user=$_SESSION['login_user'];

$sqlsession = mysqli_query("select Email_Address from CUSTOMER where Email_Address='$user'", $conn);
$row=mysqli_fetch_assoc($sqlsession);
$login_session=$row['email'];
if(!isset($login_session)){
    mysqli_close($conn);
    header('Location: index.html');
}
?>