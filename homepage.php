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
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <div class="container">
        <div id="branding">
            <h1><span class="highlight">E</span>-RPG</h1>
        </div>
        <nav>
            <ul>
                <li class="current"><a href="index.html">Home</a></li>
                <li><a href="about.html">Settings</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>
    <div>
        <center>
            <h1 style="font-size: 500%">
                Hello <?php echo $_SESSION['usr_name'];?>!
            </h1>
        </center>
    </div>
</header>
<body>
</head>
<center>
    <body>
    <section id="infoBox">
        <table>
            <tr>
                <th>URL</th>
                <th>DATE</th>
                <th>PASSWORDS</th>
            </tr>
            <?php 
            //Leave for Zaynab to do :)
            ?>
        </table>
    </section>
    </body>
</center>
<div id="showPWButton">
    <button type="button" value="Show Passwords" style="float: right">
        Show Passwords
    </button>
</div>


<footer>
    <p>Team Blanco, Copyright &copy; 2017</p>
</footer>
</body>
</html>