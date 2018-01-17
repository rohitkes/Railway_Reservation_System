<?php 
session_start();
$seca = $_POST['seca'];
$user = $_POST['user'];
	echo '
	<head>
<title>Railway Reservation System</title>
<link type="image/x-icon" rel="shortcut icon" href="logo.png" />
</head>
<style>
#heading {
	border-radius:5px;
	width:100%;
	border:solid 1px green;
	text-align:center;
	background-color:#B2EBF2;
	overflow:auto;
}
h1 {
	text-align:right;
}
table {
	margin-top:0;
}
.button {
    position: relative;
    background-color: #FB8C00;
    border: none;
	border-radius:10px;
    font-size: 15px;
    color: #FFFFFF;
    padding: 20px;
    width: 200px;
    text-align: center;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;
}
.button1 {
    position: relative;
    background-color: #5C6BC0;
    border: none;
	border-radius:10px;
    font-size: 28px;
    color: #FFFFFF;
    padding: 20px;
    width: 200px;
    text-align: center;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;
}

.button:after {
    content: "";
    background: #90EE90;
    display: block;
    position: absolute;
    padding-top: 300%;
    padding-left: 350%;
    margin-left: -20px!important;
    margin-top: -120%;
    opacity: 0;
    transition: all 1s
}

.button:active:after {
    padding: 0;
    margin: 0;
    opacity: 1;
    transition: 0s
}
.button1:after {
    content: "";
    background: #BBDEFB;
    display: block;
    position: absolute;
    padding-top: 300%;
    padding-left: 350%;
    margin-left: -20px!important;
    margin-top: -120%;
    opacity: 0;
    transition: all 1s
}

.button1:active:after {
    padding: 0;
    margin: 0;
    opacity: 1;
    transition: 0s
}
.modal {
    display: none; /* Hidden by default */
    position: absolute; 
    z-index: 1; /* Sit on top */
    padding-top: 50px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    background-color: rgb(1,1,1); /* Fallback color */
    background-color: rgba(0,0,0,0.6); /* Black w/ opacity */
}

.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.5),0 6px 20px 0 rgba(0,0,0,0.3);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 1s;
    animation-name: animatetop;
    animation-duration: 1s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}


/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}
a.hover {
	background:#00E676;
}
.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
#Register{
	font-size:25;
	background:#5C6BC0;
}
#footer{
	background:#ECEFF1;
}
</style>
<body>
<div id = "heading" >
<table border = "0" style = "margin-top:0px" width = "100%">
<tr><td align="left"><a href = "index.php"><img src = "untitled.png"></a></td>
<td width = "50%"><h1>Indian Railways</h1></td></tr></table>
	';
	//$user = $_SESSION['user'];
		$link = mysqli_connect('localhost','root','');
 //Check link to the mysql server
 if(! $link) {
 die('Failed to connect to server: ' . mysqli_error());
 }
 //Select database
 $db = mysqli_select_db($link,'2014067');
 if(!$db) {
 die("Unable to select database");
 }
 $qry = "SELECT * FROM user WHERE User_name = '$user'";
 $res = mysqli_query($link,$qry);
 $count = mysqli_num_rows($res);
 
$row = mysqli_fetch_assoc($res);
if ($row['Security_answer'] == $seca){
	echo ('Dear '.$user.', Your Password is '.$row['Password']);
	echo ('<a href = "index.php">
	<button class = "button">Go To Login Page</button></a>
	');
	header('Refresh:10 ; url = index.php');
	session_destroy();
}
else {
	echo ('<center>Your Answer is Incorrect</center>');
	header ('Refresh:3 ; url = index.php');
	session_destroy();
}
?>