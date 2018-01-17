<?php
session_start();

 //Start the session to see if the user is authencticated user.
 //Check if the session variable for user authentication is set, if not redirect to login page.
 if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
 $train = $_POST['train'];
$user = $_SESSION[ 'USER_ID' ];
$_SESSION[ 'IS_AUTHENTICATED' ] = 1;
$_SESSION[ 'USER_ID' ] = $user;
$login = $_SESSION['UN'];
$_SESSION['UN'] = $login;
$date = date("Y-m-d");
$class = $_POST['class'];
$_SESSION['class'] = $class;
 if ($_SESSION['doj'] > $date){
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
<td width = "50%" align="center"><h1>Railway Reservation</h1></td>
<td><a href = "search.php">Plan Your Travel</a></td>
<td><a href = "logout.php"><button class = "button">Logout</button</a></td></tr>
</table>
</div>');
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
 $qry = "SELECT * FROM train WHERE Train_ID = '$train'";
 $result = mysqli_query($link,$qry);
 $row = mysqli_fetch_assoc($result);
 $_SESSION['train'] = $row['Train_ID'];
		echo '<div style="background:#80D8FF;border-radius:10px">
		<table border="0" cellspacing="10" align="center">
		<tr><td><a href="#">Services</a></td>
		<td><a href="#">My Transactions</a></td>
		<td><a href="#">My Profile</a></td></tr></table></div>';
		
		echo '
		<form action = "confirm.php" method = "post">
		<table border = "1" align = "center">
		<tr><th colspan = "4" align="center">Booking for train no:- '.$train.' Train name :- '.$row['Train_name'].'</th></tr>
		<tr><th width="10%">S.no</th>
		<th width="10%">Name*</th>
		<th width="10%">Age*</th>
		<th width="10%">Gender*</th>
		</tr>
		';
			echo '<tr><td align = "center">1</td>
			<td align = "center"><input type = "text" name = "pass1" required></td>
			<td align = "center"><input type = "number" name = "age1" required min = 3 max = 100></td>
			<td align = "center"><input type = "radio" name = "gender1" value = "M">Male</br><input type = "radio" name = "gender1"  value = "F">Female</td></tr>';
			echo '<tr><td align = "center">2</td>
			<td align = "center"><input type = "text"  name = "pass2" value = "10"></td>
			<td align = "center"><input type = "number" name = "age2" min = 3 max = 100 ></td>
			<td align = "center"><input type = "radio" name = "gender2" value = "M">Male</br><input type = "radio" name = "gender2" value = "F">Female</td></tr>';
			echo '<tr><td align = "center">3</td>
			<td align = "center"><input type = "text" name = "pass3" value = "10"></td>
			<td align = "center"><input type = "number" name = "age3" min = 3 max = 100 ></td>
			<td align = "center"><input type = "radio" name = "gender3" value = "M">Male</br><input type = "radio" name = "gender3" value = "F">Female</td></tr>';
			echo '<tr><td align = "center">4</td>
			<td align = "center"><input type = "text" name = "pass4" value = "10"></td>
			<td align = "center"><input type = "number" name = "age4" min = 3 max = 100 ></td>
			<td align = "center"><input type = "radio" name = "gender4" value = "M">Male</br><input type = "radio" name = "gender4" value = "F">Female</td></tr>';
			echo '<tr><td align = "center">5</td>
			<td align = "center"><input type = "text" name = "pass5" value = "10"></td>
			<td align = "center"><input type = "number" name = "age5" min = 3 max = 100 ></td>
			<td align = "center"><input type = "radio" name = "gender5" value = "M">Male</br><input type = "radio" name = "gender5" value = "F">Female</td></tr>';
			echo '<tr><td align = "center">6</td>
			<td align = "center"><input type = "text" name = "pass6" value = "10"></td>
			<td align = "center"><input type = "number" name = "age6" min = 3 max = 100 ></td>
			<td align = "center"><input type = "radio" name = "gender6" value = "M">Male</br><input type = "radio" name = "gender6" value = "F">Female</td></tr>';
			
			echo '<tr><td colspan = "4" align="center"><input type = "submit" value = "Proceed"></td></tr>
			';
			echo '</table>
			';
 }
 else {
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
<td><a href = "search.php">Plan Your Travel</a></td>
<td><a href = "logout.php"><button class = "button">Logout</button</a></td></tr>
</table>
</div>
		<div style="background:#80D8FF;border-radius:10px">
		<table border="0" cellspacing="10" align="center">
		<tr><td><a href="#">Services</a></td>
		<td><a href="#">My Transactions</a></td>
		<td><a href="#">My Profile</a></td></tr></table></div>');
		echo '
		<center>Choose a date after '.$date;
 }
 }
 else {
	 header ('location:logout.php');
 }
 ?>