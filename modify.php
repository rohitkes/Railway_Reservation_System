<?php
session_start();
 //Start the session to see if the user is authencticated user.
 //Check if the session variable for user authentication is set, if not redirect to login page.
 if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
 $pnr = $_POST['pnr'];
 $user = $_SESSION[ 'USER_ID' ];
 $login = $_SESSION['UN'];
 $sno = $_SESSION['sno'];
 if ($_POST['submit'] == "Cancel Ticket"){
echo '
<head>
<title>Welcome '.$user.'</title>
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
	text-align:center;
}
table {
	margin-top:0;
}
a {
	text-decoration:none;
	cursor:pointer;
}

.button {
    position: relative;
    background-color: #FB8C00;
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
<tr><td align="center" width = "20%"><a href = "index.php"><img src = "untitled.png"></a></td>
<td width = "50%" align = "center"><h1>Railway Reservation</h1></td>
<td align = "center"><a href = "search.php">Plan Your Travel</a></td>
<td><a href = "logout.php"><button class = "button">Logout</button</a></td></tr>
</table>
</div>
</body>
</html>';
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
 //Create query
 $q = "SELECT * FROM passenger WHERE PNR = '$pnr' AND Seat_number = '$sno'";
 $r = mysqli_query($link,$q);
 $row = mysqli_fetch_assoc($r);
$train =  $row['Train_ID'];
$date = $row['Date'];
$class = $row['Class'];
$count = mysqli_num_rows($r);

 $qry = "DELETE FROM passenger WHERE Booked_By = '$login' AND PNR = '$pnr' AND Seat_number = '$sno'";
 $res = mysqli_query($link,$qry);
 
 if ($res){
	 
	 if ($class == 'SL'){
$q = "UPDATE train_status SET Booked_seats1 = Booked_seats1 - '$count' WHERE Train_ID = '$train' and Available_Date = '$date'";
 }
 else if ($class == 'A3'){
$q = "UPDATE train_status SET Booked_seats2 = Booked_seats2 - '$count' WHERE Train_ID = '$train' and Available_Date = '$date'";
}
 else  if ($class == 'A2'){
$q = "UPDATE train_status SET Booked_seats3 = Booked_seats3 - '$count' WHERE Train_ID = '$train' and Available_Date = '$date'";
}
 mysqli_query($link,$q);
 echo '<br><br><center>Ticket Cancelled Successfully</center>';
	 header ('Refresh:5;url=search.php');
 }
 }
 else if ($_POST['submit'] == "Print"){
	 $_SESSION['pnr'] = $pnr;
	 header('location:search.php');
 }
 
 }
 else {
	 header('location:index.php');
 }
 ?>