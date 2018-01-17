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
<td width = "50%" align="center"><h1>Railway Reservation</h1></td>
<td><a href = "logout.php"><button class = "button">Logout</button</a></td></tr>
</table>
</div>
		<div style="background:#80D8FF;border-radius:10px">
		<table border="0" cellspacing="10" align="center">
		<tr><td><a href="services.php">Services</a></td>
		<td><a href="transactions.php">My Transactions</a></td>
		<td><a href="profile.php">My Profile</a></td></tr></table></div>
		<form action = "result.php" method = "post">
		<table = border = "0" align="center" style="margin-top:15px">
		<tr>
		<td>Source :-</td><td>

	<select name = "source">');
	echo '<option value = "NULL"> Select</option>';
	$link = mysqli_connect('localhost','root','');
		  if(! $link) {
 die('Failed to connect to server: ' . mysqli_error());
 }
 $db = mysqli_select_db($link,'2014067');
	$qry="SELECT * FROM station";
  $result = mysqli_query($link,$qry);
		while ($row = mysqli_fetch_assoc($result)){
			echo '<option value = "'. $row['Station_Name'].' "> '. $row['Station_Name'].'</option> ';
		}

  echo ('  </select>
</td></tr>
<tr>
<td>Destination :-</td><td>

	<select name = "dest">	');
	echo '<option value = "NULL"> Select</option>';
	$link = mysqli_connect('localhost','root','');
		  if(! $link) {
 die('Failed to connect to server: ' . mysqli_error());
 }
 $db = mysqli_select_db($link,'2014067');
	$qry="SELECT * FROM station";
  $result = mysqli_query($link,$qry);
		while ($row = mysqli_fetch_assoc($result)){
			echo '<option value = "'. $row['Station_Name'].' "> '. $row['Station_Name'].'</option> ';
		}
	echo '
	</select>
</td></tr>
<tr><td>Date:- </td><td><input type = "date" name = "doj" required></td></tr>
<tr><td colspan = "2" align="center"><input type = "submit" value = "Search"></td></tr></table>
		</form>
		';
		}
 else{
 header('location:logout.php' ); 
 exit();
 }
?>