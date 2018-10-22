<?php
$conn = mysqli_connect("localhost","admin","pass");

$db = mysqli_select_db("CUSTOMER", $conn);

session_start();

$user=$_SESSION['login_user'];

$sqlsession = mysqli_query("select username from CUSTOMER where username='$user'", $conn);
$row=mysqli_fetch_assoc($sqlsession);
$login_session=$row['username'];
if(!isset($login_session)){
    mysqli_close($conn);
    header('Location: index.php');
}
?>