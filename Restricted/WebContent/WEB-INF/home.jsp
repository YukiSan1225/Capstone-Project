<!DOCTYPE html>
<html>
<%@taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
<%@page language="java" contentType="text/html; charset=ISO-8859-1" pageEncoding="ISO-8859-1"%>
<%@page import="com.passwordmanager.dao.Information" %>
<%@page import="com.passwordmanager.dao.User" %>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Affordable and professional web design">
    <meta name="keywords" content="web design, affordable web design, professional web design">
    <meta name="author" content="Brad Traversy">
    <title>Welcome</title>
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
                <li class="current"><a href="Home">Home</a></li>
                <li><a href="#">Change Password</a></li>
                <li><a href="Logout">Logout</a></li>
            </ul>
        </nav>
    </div>
    <div>
        <center>
            <h1 style="font-size: 500%">
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
    	<th>Website</th>
			<c:forEach var="info" items="${Information}">
	    	<c:out value="${info.getWebsite()}" />
	    <th>Password</th>
	    	<c:out value="${info.getPassword()}"/>
			</c:forEach>
		</tr>
	</table>
    </section>
    </body>
</center>
<div id="showPWButton">
    <input type="button" id="btnHide" value="Hide Passwords" style="float: right"></button>
    <input type="button" id="btnShow" value="Show Passwords" style="float: right"></button>
    <form method="post" action="Add">
    <input type="hidden" name="id" value="#">
    <input type="button" value="Add Information" onclick="location.href='Add'"></button>
    </form>
</div>
<footer>
    <p>Team Blanco, Copyright &copy; 2017</p>
</footer>
</body>
</html>
