<?php
session_start();
include_once 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Affordable and professional web design">
    <meta name="keywords" content="web design, affordable web design, professional web design">
    <meta name="author" content="Brad Traversy">
    <title>E-RPG | Welcome</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <div class="container">
        <div id="branding">
            <h1><span class="highlight">E</span>-RPG</h1>
        </div>
        <nav>
            <ul>
                <li class="current"><a href="index.php">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
        </nav>
    </div>
</header>

<section id="showcase">
    <div class="container">
        <h1>Encoded Random Password Generator</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu luctus ipsum, rhoncus semper magna. Nulla nec magna sit amet sem interdum condimentum.</p>
    </div>
</section>

<section id="newsletter">
    <div class="container">
        <h1>Generate a password?</h1>
        <form onsubmit="return false">
            <input type="Click 'Button' to generate password" id="long_password" placeholder="Password here..." style="width: 750px; height: 40px; font-size: 25px">
            <button type="submit" class="button_1" onclick="getData()">Generate</button>
        </form>
    </div>
</section>

<section id="boxes">
    <div class="container">
        <div class="box">
            <img src="logo_html.png">
            <h3>Simplified login</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi augue, viverra sit amet ultricies</p>
        </div>
        <div class="box">
            <img src="logo_css.png">
            <h3>Generate strong passwords</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi augue, viverra sit amet ultricies</p>
        </div>
        <div class="box">
            <img src="logo_brush.png">
            <h3>Encrypted data</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi augue, viverra sit amet ultricies</p>
        </div>
    </div>
</section>
<script>
function getPass(){
//defining the character sets, so that it would be easy to choose letters
        //from them
        var lower_charset = "abcdefghijklmnopqrstuvwxyz"; //lower case characters
        var upper_charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";//upper case characters
        var special_charset="?.$@;:_^#![]{}"; //special characters
        var numset="0123456789";//numeric characters
        var minLength=16; //minimum length of the password
        var maxLength=24; //maximum length of password
        //generating a random length between 16 and 24
        var length = Math.floor(Math.random() * (maxLength-minLength+1)) + minLength;
        //defining a variable to store the password
        var pass="";
        //adding length-6 number of random lowercase characters to the password
        for(var i=0;i<length-6;i++){
            pass+=lower_charset.charAt(Math.floor(Math.random() * lower_charset.length));
        }
        //adding 3 random upper case characters
        for(var i=0;i<3;i++){
            pass+=upper_charset.charAt(Math.floor(Math.random() * upper_charset.length));
        }
        //adding one random special character
        pass+=special_charset.charAt(Math.floor(Math.random() * special_charset.length));
        //adding two random numbers
        for(var i=0;i<2;i++){
            pass+=numset.charAt(Math.floor(Math.random() * numset.length));
        }
        //displaying the password in the html page
        var long_password = documnet.getElementById("long_password");
        long_password=pass;
}
</script>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
<footer>
    <p>Team Blanco, Copyright &copy; 2017</p>
</footer>
</body>
</html>
