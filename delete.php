<?php
include('connect.php');

if(isset($_GET['tnum']) && is_numeric($_GET['tnum'])){
    $id = $_GET['tnum'];
    $result = mysqli_query($con, "delete from cushome where id='".$id."'") or die(mysqli_error());

    header("Location: homepage.php");
}
else{
    header("Location: homepage.php");
}
?>