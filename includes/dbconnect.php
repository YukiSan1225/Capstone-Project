<?php
//connect to mysql database
$con = mysqli_connect("localhost", "admin", "pass", "CUSTOMER") or 
die("Error " . mysqli_error($con));
?>