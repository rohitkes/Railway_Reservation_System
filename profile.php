<?php
session_start();
 //Start the session to see if the user is authencticated user.
 //Check if the session variable for user authentication is set, if not redirect to login page.
 if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
 $user = $_SESSION[ 'USER_ID' ];
$_SESSION[ 'IS_AUTHENTICATED' ] = 1;
$_SESSION[ 'USER_ID' ] = $user;
$login = $_SESSION['UN'];
$_SESSION['UN'] = $login;
$date = date("d-m-Y");
echo ('
	<head><title>Welcome '.$user.' </title></head>
		<style>
		#heading {
	border-radius:5px;
	width:100%;
	border:solid 1px green;
	background-color:#B2EBF2;
}
.button {
    position: relative;
    background-color: #FB8C00;
    border: none;
	border-radius:10px;
    font-size: 15px;
    color: #FFFFFF;
    float:right;
    width: 100px;
	height:40px;
    text-align: center;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;
}
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
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
    transition: all 0.8s
}

.button:active:after {
    padding: 0;
    margin: 0;
    opacity: 1;
    transition: 0s
}
a {
	text-decoration:none;
	cursor:pointer;
}
</style>
		<div id = "heading" >
<table border = "0" style = "margin-top:0px" width = "100%">
<tr><td align="left"><img src = "logo.png"></td>
<td width = "50%" align="center"><h1>Indian Railways</h1></td>
<td><a href = "search.php" style = "text-decoration:none">Plan Your Travel</a></td>
<td><a href = "logout.php"><button class = "button">Logout</button</a></td></tr>
</table>
</div>');
	$link = mysqli_connect('localhost','root','');
		  if(! $link) {
 die('Failed to connect to server: ' . mysqli_error());
 }
 $db = mysqli_select_db($link,'2014067');
 $qry = "SELECT * FROM user WHERE User_Name = '$login'";
 $res = mysqli_query($link,$qry);
 $row = mysqli_fetch_assoc($res);
echo '
<hr><hr>
	<form action = "update.php" method = "post">
	<table border = "0" align = "center" width = "75%">
	<tr><td>User Name:- </td><td><input type = "text" name = "un" value = '.$row['User_name'].' disabled></td></tr>
	<tr><td>Password :- </td><td><input type = "password" name = "pw" value = '.$row ['Password'].'></td></tr>
	<tr><td>Mobile :- </td><td><input type = "number" name = "mobile" value = '.$row['Mobile'].' max = 9999999999 min = 7000000000></td></tr>
	<tr><td>City :- </td><td><input type = "text" name = "city" value = '.$row['City'].' </td></tr>
	<tr><td>State :- </td><td><input type = "text" name = "state" value = '.$row['State'].' </td></tr>
	<tr><td colspan = "2" align = "center"><input type = "submit" value = "Update"></td></tr>
	</table>

';
 }
 else {
	 header('location:index.php');
 }