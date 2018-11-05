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
                <?php if (isset($_SESSION['usr_id']) { ?>
                <li><p>Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
                <li><a href="homepage.php">Account</a></li>
                <li><a href="logout.php">Log Out</a></li>
                <?php } else { ?>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
                <?php } ?>
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
        <form>
            <input type="Click 'Button' to generate password" placeholder="Password here..." style="width: 750px; height: 40px; font-size: 25px">
            <button type="submit" class="button_1">Generate</button>
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

<footer>
    <p>Team Blanco, Copyright &copy; 2017</p>
</footer>
</body>
</html>
