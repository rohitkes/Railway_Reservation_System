<?php
$source = $_POST['source'];
$dest = $_POST['dest'];
$date = $_POST['doj'];
$d = date('Y-m-d');
session_start();
 //Check if the session variable for user authentication is set, if not redirect to login page.
 if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
 echo '
 <head>
 <title>Search Your Trains</title>
 </head>
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
#container {
	background:;
	height:150px;
	
}
</style>
		<div id = "heading" >
<table border = "0" style = "margin-top:0px" width = "100%">
<tr><td align="left"><img src = "logo.png"></td>
<td width = "50%" align="center"><h1>Railway Reservation</h1></td>
<td><a href = "search.php">Plan Your Travel</a></td>
<td><a href = "logout.php"><button class = "button">Logout</button</a></td></tr>
</table>
</div>';
if ($source == 'NULL' || $dest == 'NULL'){
	echo '<center>Enter Search Details</center>';
	header('Refresh:5;url=search.php');
}
else {
	$_SESSION['doj'] = $date;
	if ($date >=$d){
	
echo '<div id = "container">';
	$link = mysqli_connect('localhost','root','');
	if(! $link) {
 die('Failed to connect to server: ' . mysqli_error());
 }
 //Select database
 $db = mysqli_select_db($link,'2014067');
 if(!$db) {
 die("Unable to select database");
 }
$qry = "SELECT * FROM train WHERE Source_stn = '$source' AND Destination_stn = '$dest'";
$result = mysqli_query($link,$qry);
$count = mysqli_num_rows($result);
if ($count >= 1){
	echo '<form action = "book.php" method = "post">
<table border = "1" align = "center" width="100%" text-align="center">
<tr>
<th>Select</th>
<th>Train Number</th>
<th>Train Name</th>
<th>Source</th>
<th>Destination</th>
<th>Date Of Journey</th>
<th><input type = "radio" name = "class" value = "SL" required>Sleeper</th>
<th><input type = "radio" name = "class" value = "A3" required>AC Third Class</th>
<th><input type = "radio" name = "class" value = "A2" required>AC Second Class</th>
</tr>
';
while ($row = mysqli_fetch_assoc($result)){	
$train = $row['Train_ID'];
 $q = "SELECT * FROM train_status WHERE Train_ID = '$train' AND Available_Date = '$date' ";
 $r = mysqli_query($link,$q);
 $rr = mysqli_fetch_assoc($r);
 $as1 =  100 - $rr['Booked_seats1'];
 $as2 = 100 - $rr['Booked_seats2'];
 $as3 = 100 - $rr['Booked_seats3']; 
 echo'
 <tr>
 <td align = "center"> <input type = "radio" name = "train" value = '.$row['Train_ID'].' required>
 <td align="center">'.$row['Train_ID'].'</td> 
<td align="center">'.$row['Train_name'].'</td> 
<td align="center">'.$row['Source_stn'].'</td> 
<td align="center">'.$row['Destination_stn'].'</td>
<td align="center">'. $_POST['doj'].'</td>
<td align = "center">'.$as1.'</td>
<td align = "center">'.$as2.'</td>
<td align = "center">'.$as3.'</td>
</tr>
';
 } 
echo '
<tr><td colspan = "9" align = "right"><input type = "submit" value = "Proceed For Booking"></td></tr>
</table></form>';	
}
else {
	echo ('<center>No Matching Trains found</center>');
}
echo '</div>';
}
else {
	echo '<center>Enter a date after '.$d.'</center>';
	header('Refresh:5;url=search.php');
	}
}
 }
 else {
	 header("location:index.php");
 }
?>