<?php
session_start();
	
$error='';
if (isset($_POST['submit'])){
	if((empty($_POST['username'])) || empty($_POST['password'])){
		$error = "Usernane or Password is invalid.";
	}
	else{
		$user=$_POST['username'];
		$pass=$_POST['password'];

		$conn = mysqli_connect("localhost","root","");
		
		//Protection from SQL injection
		$user=stripslashes($user);
		$pass=stripslashes($pass);
		$user=mysqli_real_escape_string($user);
		$pass=mysqli_real_escape_string($pass);

		$db=mysqli_select_db("CUSTOMER",$conn);

		$query=mysqli_query("select * from CUSTOMER where Password='$pass' and username='$user'",$conn);
		$rows=mysqli_num_rows($query);
		if($rows==1){
			$_SESSION['login_user']=$user;
			header("location: HomePage.html");
		}else{
			$error = "Username or Password is invalid.";
		}
		mysqli_close($conn);
	}
}
?>