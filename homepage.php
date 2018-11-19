<?php
session_start();
include 'connect.php';

    if(isset($_POST['deleteButton'])){
        $websitename = $_POST['website_name'];
        $emailadd = $_POST['email_add'];
        $pass = $_POST['password'];

        $del = mysqli_query($con, "delete from cushome where website_name='" . $websitename ."' and email_username='". $emailadd ."' and password='". $pass ."'");

        if(!$del){
            echo 'Could not delete information. Please contact admin.';
        }
    }
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
        <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="infoBox">
        <?php
        $id = $_SESSION['usr_id'];
        $result=mysqli_query($con, "SELECT website_name, email_username, password from cushome where cusid='". $id . "'");
        if(mysqli_num_rows($result) > 0){
            echo "<table id=\"userTable\"><tr>
                <th>URL</th>
                <th>EMAIL/USERNAME</th>
                <th>PASSWORD</th>
                </tr>";
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr><td>".$row["website_name"]."</td><td>".$row["email_username"]."</td><td>".$row["password"]."</td><td><button onclick=\"deleteRow(this)\"><a href='delete.php?id=".$row["tnum"]."'>Delete</a></button></td></tr>";
            }
            echo "</table>";
        }
        else{
            echo "You have no information present. Please click the button below to add information.";
        }
        ?>
        </form>
    </section>
    </body>
</center>
<div id="showPWButton">
    <button type="button" value="Show Passwords" style="float: right">
        Show Passwords
    </button>
    <button id="popup" style="float: left" onclick="div_show()">Add Information</button>
</div>
<script>
function deleteRow(r){
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("userTable").deleteRow(i);
}
</script>
<script src="js/jquery-1.10.2.js"></script>
<footer>
    <p>Team Blanco, Copyright &copy; 2017</p>
</footer>
</body>
</html>