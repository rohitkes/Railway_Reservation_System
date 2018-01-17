<?php
session_start();

 //Start the session to see if the user is authencticated user.
 //Check if the session variable for user authentication is set, if not redirect to login page.
 if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
 $train = $_SESSION['train'];
$user = $_SESSION[ 'USER_ID' ];
$date = $_SESSION['doj'];
$login = $_SESSION['UN'];
$_SESSION[ 'IS_AUTHENTICATED' ] = 1;
$_SESSION[ 'USER_ID' ] = $user;
$_SESSION['train'] = $train;
$class = $_SESSION['class'];

$name1 = $_POST['pass1'];
$age1 = $_POST['age1'];
$gender1 = $_POST['gender1'];

if (($_POST['pass2'])!=10){
$name2 = $_POST['pass2'];
$age2= $_POST['age2'];
$gender2 = $_POST['gender2'];
}
if (($_POST['pass3'])!=10){
$name3 = $_POST['pass3'];
$age3 = $_POST['age3'];
$gender3 = $_POST['gender3'];
}
if (($_POST['pass4'])!=10){
$name4 = $_POST['pass4'];
$age4 = $_POST['age4'];
$gender4 = $_POST['gender4'];
}
if (($_POST['pass5']) !=10){
$name5 = $_POST['pass5'];
$age5 = $_POST['age5'];
$gender5 = $_POST['gender5'];
}
if (($_POST['pass6'])!=10){
$name6 = $_POST['pass6'];
$age6 = $_POST['age6'];
$gender6 = $_POST['gender6'];
}
$_SESSION['UN'] = $login;
echo ('
	<head>
	<title>Welcome '.$user.' </title>
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
 $q = "SELECT * FROM train_status WHERE Available_Date = '$date'";
 $r = mysqli_query($link,$q);
 $c = mysqli_fetch_assoc($r);
 if ($class == 'SL'){
 $seatno = $c['Booked_seats1']; 
 }
 else if ($class == 'A3'){
 $seatno = $c['Booked_seats2']; 
 }
 else  if ($class == 'A2'){
 $seatno = $c['Booked_seats3']; 
 }
 
 $query = "SELECT * FROM tickets";
 $result = mysqli_query($link,$query);
 $count = mysqli_fetch_assoc($result);
 $pnr = $count['Number'];
 $_SESSION['pnr'] = $pnr;
$q = "SELECT Train_name FROM train WHERE Train_ID = '$train'";
 $r = mysqli_query($link,$q);
 $rr = mysqli_fetch_assoc($r);
 $tname = $rr['Train_name'];
 $no = 0;
 echo '
 <table border = "0" align = "center">
 <tr>
 <td><b>Train No</b> :- '.$train.'</td>
 <td><b>Train Name</b> :-'.$tname.'</td>
 <td><b>Date Of Journey</b> :- '.$date.'</td>
 </tr></table>
 ';
 
 
 $qry1 = "INSERT INTO passenger (PNR,Seat_number,Passenger_name,Age,Gender,Train_ID,Booked_By,Date,Class) VALUES ('$pnr','$seatno','$name1','$age1','$gender1','$train','$login','$date','$class')";
 mysqli_query($link,$qry1);
 $no = $no + 1;
 echo '
 <table border = "0" align= "center"><tr><th>Name</th><th>Seat No</th>
 </tr><tr><td>'.$name1.'</td><td>'.$seatno.'</td></tr>
 ';
if ($class == 'SL'){
 $q1 = "UPDATE train_status SET Booked_seats1 = Booked_seats1 + 1 where Train_ID = '$train'";
 }
 else if ($class == 'A3'){
$q1 = "UPDATE train_status SET Booked_seats2 = Booked_seats2 + 1 where Train_ID = '$train'";
 }
 else  if ($class == 'A2'){
$q1 = "UPDATE train_status SET Booked_seats3 = Booked_seats3 + 1 where Train_ID = '$train'";
 }
 mysqli_query($link,$q1);
 $q0 = "UPDATE tickets SET number = number + 1";
 mysqli_query($link,$q0);
 
 
 if (($_POST['pass2']!=10)){
 $seatno = $seatno + 1;
 $qry2 = "INSERT INTO passenger (PNR,Seat_number,Passenger_name,Age,Gender,Train_ID,Booked_By,Date,Class) VALUES ('$pnr','$seatno','$name2','$age2','$gender2','$train','$login','$date','$class')";
 mysqli_query($link,$qry2);
 $no = $no + 1;
 echo '<tr><td>'.$name2.'</td><td>'.$seatno.'</td></tr>';
 if ($class == 'SL'){
 $q1 = "UPDATE train_status SET Booked_seats1 = Booked_seats1 + 1 where Train_ID = '$train'";
 }
 else if ($class == 'A3'){
$q1 = "UPDATE train_status SET Booked_seats2 = Booked_seats2 + 1 where Train_ID = '$train'";
 }
 else  if ($class == 'A2'){
$q1 = "UPDATE train_status SET Booked_seats3 = Booked_seats3 + 1 where Train_ID = '$train'";
 }
 mysqli_query($link,$q1);
 }
 
  if (($_POST['pass3']!=10) ){
 $seatno = $seatno + 1;
 $qry2 = "INSERT INTO passenger (PNR,Seat_number,Passenger_name,Age,Gender,Train_ID,Booked_By,Date,Class) VALUES ('$pnr','$seatno','$name3','$age3','$gender3','$train','$login','$date','$class')";
 mysqli_query($link,$qry2);
 $no = $no + 1;
 echo '<tr><td>'.$name3.'</td><td>'.$seatno.'</td></tr>';
 if ($class == 'SL'){
 $q1 = "UPDATE train_status SET Booked_seats1 = Booked_seats1 + 1 where Train_ID = '$train'";
 }
 else if ($class == 'A3'){
$q1 = "UPDATE train_status SET Booked_seats2 = Booked_seats2 + 1 where Train_ID = '$train'";
 }
 else  if ($class == 'A2'){
$q1 = "UPDATE train_status SET Booked_seats3 = Booked_seats3 + 1 where Train_ID = '$train'";
 }
 mysqli_query($link,$q1);
 }

 if (($_POST['pass4'] != 10)){
 $seatno = $seatno + 1;
 $qry2 = "INSERT INTO passenger (PNR,Seat_number,Passenger_name,Age,Gender,Train_ID,Booked_By,Date,Class) VALUES ('$pnr','$seatno','$name4','$age4','$gender4','$train','$login','$date','$class')";
 mysqli_query($link,$qry2);
 $no = $no + 1;
 echo '<tr><td>'.$name4.'</td><td>'.$seatno.'</td></tr>';
 if ($class == 'SL'){
 $q1 = "UPDATE train_status SET Booked_seats1 = Booked_seats1 + 1 where Train_ID = '$train'";
 }
 else if ($class == 'A3'){
$q1 = "UPDATE train_status SET Booked_seats2 = Booked_seats2 + 1 where Train_ID = '$train'";
 }
 else  if ($class == 'A2'){
$q1 = "UPDATE train_status SET Booked_seats3 = Booked_seats3 + 1 where Train_ID = '$train'";
 }
 mysqli_query($link,$q1);
 }
 if (($_POST['pass5']!= 10)){
 $seatno = $seatno + 1;
 $qry2 = "INSERT INTO passenger (PNR,Seat_number,Passenger_name,Age,Gender,Train_ID,Booked_By,Date,Class) VALUES ('$pnr','$seatno','$name5','$age5','$gender5','$train','$login','$date','$class')";
 mysqli_query($link,$qry2);
 $no = $no + 1;
 echo '<tr><td>'.$name5.'</td><td>'.$seatno.'</td></tr>';
 if ($class == 'SL'){
 $q1 = "UPDATE train_status SET Booked_seats1 = Booked_seats1 + 1 where Train_ID = '$train'";
 }
 else if ($class == 'A3'){
$q1 = "UPDATE train_status SET Booked_seats2 = Booked_seats2 + 1 where Train_ID = '$train'";
 }
 else  if ($class == 'A2'){
$q1 = "UPDATE train_status SET Booked_seats3 = Booked_seats3 + 1 where Train_ID = '$train'";
 }
 mysqli_query($link,$q1);
 }
 if (($_POST['pass6']!=10)){
 $seatno = $seatno + 1;
 $qry2 = "INSERT INTO passenger (PNR,Seat_number,Passenger_name,Age,Gender,Train_ID,Booked_By,Date,Class) VALUES ('$pnr','$seatno','$name6','$age6','$gender6','$train','$login','$date','$class')";
 mysqli_query($link,$qry2);
 $no = $no + 1;
 echo '<tr><td>'.$name6.'</td><td>'.$seatno.'</td></tr>';
 if ($class == 'SL'){
 $q1 = "UPDATE train_status SET Booked_seats1 = Booked_seats1 + 1 where Train_ID = '$train'";
 }
 else if ($class == 'A3'){
$q1 = "UPDATE train_status SET Booked_seats2 = Booked_seats2 + 1 where Train_ID = '$train'";
 }
 else  if ($class == 'A2'){
$q1 = "UPDATE train_status SET Booked_seats3 = Booked_seats3 + 1 where Train_ID = '$train'";
 }
 mysqli_query($link,$q1);
 }
 echo '
	<tr><td colspan="2" align="center"><button onclick="myFunction()">Print</button></td></tr>
 ';
 $_SESSION['no'] = $no;
 echo '
 <hr><table border = "0" align = "center">
 <tr><td><button onclick = "Payment()">Make Payment</button></td></tr></table>
 ';
 
}
else {
	header("location:logout.php");
}
 ?>
 <script>
 function myFunction(){
	window.open("print.php", "Print Ticket", "resizable=yes,top=100,left=500,width=400,height=400"); 
 }
 function Payment(){
	window.open("pay.php", "Payment", "resizable=yes,top=100,left=500,width=1600,height=900"); 
 }
 
 </script>