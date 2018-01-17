<head>
<title>Welcome to US Bank</title>
<link type="image/x-icon" rel="shortcut icon" href="bank.png" />
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
	text-align:left;
}
table {
	margin-top:0;
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
<table border = "0" align = "0" width = "100%" height = "70px">
<tr><td><img src = "bank.png" width = "30%"></td><td><h1>U.S. Bank</h1></td></tr></table>

<?php

session_start();
$class = $_SESSION['class'];
$train = $_SESSION['train'];
$pnr = $_SESSION['pnr'];
$no = $_SESSION['no'];
$link = mysqli_connect('localhost','root','');
if(! $link) {
 die('Failed to connect to server: ' . mysqli_error());
 }
 //Select database
 $db = mysqli_select_db($link,'railway');
 if(!$db) {
 die("Unable to select database");
 }
 $q = "SELECT * FROM route WHERE Train_ID = '$train'";
 $res = mysqli_query($link,$q);
 $row = mysqli_fetch_assoc($res);
 if ($class == 'SL'){
	 $fare = $row['Fare_class3'];
 }
 else if ($class =='A3'){
	 $fare = $row['Fare_class2'];
 }
 
 else if ($class =='A2'){
	 $fare = $row['Fare_class1'];
 }
 echo '
 <center>Transaction Details :- Railways Reservation Payment</center><br>
 <center>PNR :- '.$pnr.'</center><br>
 <center>Cost :- '. $no*$fare .'</center><br>
 <center><button onclick = alert("Payment_Successful")>Proceed To Pay</button></center><br>
 ';
 
 echo '
 <center><h3>Close the Window After Payment is Complete<h3></center>
 ';
?>
</body>
<script>
function myFunction(){
	alert('Payment Successfull');
}
</script>