<?php
$conn = mysqli_connect("localhost","admin","pass","CUSTOMER");

session_start();

$user=$_SESSION['login_user'];

$sqlsession = mysqli_query($conn,"select Email_Address from CUSTOMER where Email_Address='$user'");
$row=mysqli_fetch_array($sqlsession, MYSQLI_ASSOC);
$login_session=$row['email'];
if(!isset($login_session)){
    mysqli_close($conn);
    header('Location: /login.php');
    exit();
}
?>