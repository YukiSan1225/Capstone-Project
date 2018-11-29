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
                <li class="current"><a href="index.php">Home</a></li>
                <li><a href="passreset.php">Password Reset</a></li>
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
        $result=mysqli_query($con, "SELECT website_name, email_username, password, tnum from cushome where cusid='". $id . "'");
        if(mysqli_num_rows($result) > 0){
            echo "<table id=\"userTable\"><tr>
                <th>URL</th>
                <th>EMAIL/USERNAME</th>
                <th>PASSWORD</th>
                </tr>";
            while($row = mysqli_fetch_assoc($result)){
                $row["password"] = mysqli_query($con, "select FROM_BASE64('".$row["password"]."') from cushome where tnum='".$row["tnum"]."'");
                echo "<tr><td>".$row["website_name"]."</td><td>".$row["email_username"]."</td><td>".$row["password"]."</td><td><button onclick=\"deleteRow(this)\"><a href='delete.php?tnum=".intval($row["tnum"])."'>Delete</a></button></td></tr>";
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
    <input type="button" id="btnHide" value="Hide Passwords" style="float: right"></button>
    <input type="button" id="btnShow" value="Show Passwords" style="float: right"></button>
    <form method="post" action="add.php">
    <input type="hidden" name="id" value="<?php echo $_SESSION['usr_id']; ?>">
    <input type="button" value="Add Information" onclick="location.href='add.php'"></button>
    </form>
</div>
<script>
function deleteRow(r){
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("userTable").deleteRow(i);
}
</script>
<script src="js/jquery-1.10.2.js"></script>
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
        var long_password=document.getElementById("long_password");
        long_password.value=pass;
}
$(document).ready(function() {
            $('#btnShow').click(function() {
                $('td:nth-child(3)').show();
                $('td:nth-child(4)').show();
        });
});
$(document).ready(function(){
        $('#btnHide').click(function(){
                $('td:nth-child(3)').hide();
                $('td:nth-child(4)').hide();
        });
});
</script>
<footer>
    <p>Team Blanco, Copyright &copy; 2017</p>
</footer>
</body>
</html>
