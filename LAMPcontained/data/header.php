<?php
	$login = parse_ini_file('/var/www/html/MySQLlogin.ini');
	$host = $login['host'];
	$user = $login['user'];
	$pwd = $login['pwd'];
	$mysqli = new mysqli($host, $user, $pwd, 'mylibrary');
	
?>
<!DOCTYPE html>
<html>

<title>MyLibrary</title>
<head>
<meta charset="utf-8">
<style>

body {
    font-family: Sans-serif;
}

.menu {
    background-color: black;
    font-family: Sans-serif;
    font-size: 16px;
    color: white;
    border-spacing: 0;
}

td {
    text-align: left;
    vertical-align: center;
    word-wrap: break-word;
    padding: 3px;
    border-spacing: 0;
}

td.search {
    text-align: center;
}

table {
    border-spacing: 0;
    table-layout: fixed;
}

h3 { font-family: Sans-serif; }

p { 
    font-family: Sans-serif; 
    word-wrap: break-word;
}


div {
    font-family: Sans-serif; 
    word-wrap: break-word;
}
div.overview {
    word-wrap: break-word;
    position: relative;
    max-width: 350px;
    min-height: 220px;
    color: white;
    background-color: #0f68a3;

}
div.overview:hover { box-shadow: 1px 1px 3px gray; }

div.post {
    font-family: Sans-serif;
    position: relative;

}
img {
    border-radius: 7px;
}
button{
    min-width: 50px;
    background-color: #0f68a3;
    padding: 5px;
    border-radius: 18px;
    border-color: #0f68a3;
    color: white;
    text-align: center;
    box-shadow: 0 0 0;
    border: none;
    font-family: Sans-serif;
}
button:hover { box-shadow: 1px 1px 3px gray; }

.buttontgthr {
    display: inline-block;
    margin-right: 20px;

}

input[type=submit]{
    min-width: 50px;
    background-color: #0f68a3;
    padding: 5px;
    border-radius: 18px;
    border-color: #0f68a3;
    color: white;
    text-align: center;
    box-shadow: 0 0 0;
    border: none;
    font-family: Sans-serif;
}

input[type=submit].view {
    position: absolute;
    vertical-align: bottom;
    bottom: 3px;
    font-family: Sans-serif;
    padding: 5px;
    background-color: black;
}

input[type=submit]:hover { box-shadow: 1px 1px 3px gray; }

input[type=submit].search {
    min-width: 70px;
    border-radius: 18px;
    padding: 5px;
    font-family: Sans-serif;
}

input[type=text].search{
    min-width: 500px;
    border-radius: 18px;
    border-style: solid;
    border-color: gray;
    padding-left: 15px;
    min-height: 30px;
    font-family: Sans-serif;
}
input[type=text].search:hover{
    border-color: ##0f68a3;
}
select {
    min-width: 50px;
    background-color: #0f68a3;
    padding: 5px;
    border-radius: 18px;
    border-color: #0f68a3;
    color: white;
    text-align: center;
    box-shadow: 0 0 0;
    border: none;
    font-family: Sans-serif;
}

.title{
    color: white;
    font-family: Sans-serif;
    font-size: 22px;
    text-align: center;
}

.title:hover{
     background-image: linear-gradient(#27252E, #3b3b3b);
}

.titlebar {
    position: fixed;
    top: 0px;
    left: 0px;
    width: 100%;
    background-color: #27252E;
    min-height: 50px;
    z-index: 1;
    vertical-align: middle;
    border-spacing: 0;
    box-shadow: 0px 0px 6px 4px darkgray;
    
}
.titlelink {
    color: white;
    text-decoration: none;
}

.dropdownlink:hover{
     background-image: linear-gradient(#27252E, #3b3b3b);
}
     
.logoutdropdown {
    display: none;
    position: absolute;
    background-color: #27252E;
    color: white;
    font-family: Sans-serif;
    font-size: 14px;
    min-width: 190px;
    box-shadow: 0px 0px 5px 0px black;
    padding: 8px 8px;
    z-index: 2;
    right: -100%;
    top: 5px;
}
.usrname:hover .logoutdropdown {
    display: block;
}

.titleimage{
    max-width: 70px;
}

.bodypadding {
    padding-top: 50px;
}


.giantinput {
    min-height: 250px;
    min-width: 800px;
    word-wrap: break-word;
    font-family: Sans-serif;
    font-size: 16px;

}

.postlink {
    word-wrap: break-word;
    overflow-wrap: break-word; 
    font-family: Sans-serif;
    font-size: 16px;
    border-radius: 5px;
    padding: 5px;
    border: 2px solid #27252E;
    position: relative;
	
}

.updatebook {
	position: absolute;
	bottom: 12px;
	right: 20px;
}

.center {
   padding: 200px 0;
   text-align: center;
   color: white;
   font-size: 22px;
   font-family: Sans-serif;
}
.groupmgmt {
    position: absolute;
    top: 180px;
    left: 30%;
    min-width: 40%;
    background-color: white;
    max-height: 500px;
    overflow: auto;
    z-index: 1;
    word-wrap: break-word;
    overflow-wrap: break-word; 
    font-family: Sans-serif;
    font-size: 16px;
    border-radius: 5px;
	padding: 15px;
	border: 2px solid #27252E;
	box-shadow: 0px 0px 5px 0px black;
}
.closepopup {
	position: absolute;
	top: 6%;
	right: 5%;
	max-width: 10%;

}


</style>
<link rel="icon" href="mylibraryicon.png">

</head>

<body>

<table class='titlebar' align='center' cellspacing='0px'><tr>
	<td class='titleimage' width='75px'><img src='MyLibrary_logo.png' height='45px'></td>
	<td width='120px' class='title'><a href='mylibrary.php' class='titlelink'>HOME</a></td>
	<td width='150px' class='title'><a href='newbook.php' class='titlelink'>NEW BOOK</a></td>
	<td style='min-width: 70%;'></td><td></td>
</tr></table><br><br><br>
