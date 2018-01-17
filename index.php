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
<form action = "login.php" method = "post">
<div id = "heading" >
<table border = "0" style = "margin-top:0px" width = "100%">
<tr><td align="center"><a href = "index.php"><img src = "untitled.png"></a></td>
<td width = "50%"><h1>Railways Reservation</h1></td>
<td width = "45%"style="text-align:center"><table border = "0" align = "center"><tr><td>Username:-</td><td><input type = "text" name = "un" placeholder = "Username" autofocus required autocomplete="off"><br>
</td></tr><tr><td>Password :-</td><td><input type = "password" name = "pw" placeholder = "Password" required autocomplete="off"></td></tr>
<tr><td colspan = "2" align = "center"><a href = "forgot.php?user=1">Forgot Your Password</a></td></tr></table> </td>
<td style="text-align:right"><button class = "button">Login</button></td>
</tr>
</table>
</div>
</form>
<div id= "container">
<table border = "0" align = "center" width = "100%">
<tr><td width = "33%">
<table border = "1" width = "100%" height = "100px">

<tr height = "25px"><th>Running Trains</th></tr>
<tr height = "350px"><td>
<marquee onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 2, 0);" scrollamount="2" direction="up" width="100%" height="217" style="width: 100%; height: 350px;"><span style="color: #00;font-size: 20px;font-weight:normal;">
<?php 
$link = mysqli_connect('localhost','root','');
		  if(! $link) {
 die('Failed to connect to server: ' . mysqli_error());
 }
 $db = mysqli_select_db($link,'2014067');
 $qry = "SELECT * FROM train";
 $res = mysqli_query($link,$qry);
 while ($row = mysqli_fetch_assoc($res)){
	 echo $row['Train_ID'].' ---- '.$row['Train_name'];
	 echo '<hr>';
 }
?>
</marquee>
</td></tr>

</table>
</td>
<td width = "66%">

<img src = "bg.jpg" width = "100%" height = "100%" style ="border-radius:10px"></td>
</tr></table>
</div>
<div id = "Register" style ="text-align:center;border-radius:10px" height = "250">
Not a User Yet.<img src="point.gif"><button id = "button" class ="button" >Register</button>
<div id="myModal" class="modal">

   <div class="modal-content" style="border-radius:10px;">
   <div style = "background:#3665C2;border-radius:5px;height:40px;float:top">
    <span class="close"><img src="close.png" width="15" height="15"></span>
    <form action = "register.php" method = "post">
	<h2 style="color:white">Please Fill Your Details</h2></div>
	<table border = "0">
	<tr><td>Username</td><td><input type="text" name = "user" required autofocus></td></tr>
	<tr><td>Password</td><td><input type="password" name = "pass1" required ></td></tr>
	<tr><td>Confirm Password</td><td><input type="password" name = "pass2" required></td></tr>
	<tr><td>Name </td><td><input type="text" name = "name" maxlength="30" required></td></tr>
	<tr><td>Gender</td><td><input type = "radio" name = "gender" value = "male" required>Male<br><input type = "radio" name = "gender" required value = "female">Female</td></tr>
	<tr><td>Date Of Birth</td><td><input type = "date" name = "dob" required></td></tr>
	<tr><td>Email</td><td><input type = "email" name = "email" required></td></tr>
	<tr><td>Mobile </td><td><input type = "number" name = "mobile" max="9999999999" required></td></tr>
	<tr><td>Security question</td><td><input type="text" name="sec_qn" required></td></tr>
	<tr><td>Security Answer</td><td><input type = "" name = "sec_ans" required></td></tr>
	</table>
	<hr>
	<table border="0"><tr><td>
	<table border = "0"><tr><th>Address</th></tr>
	<tr><td>H.no</td><td><input type = "text" name = "H_no" required></td></tr>
	<tr><td>Street</td><td><input type="text" name = "street" required></td></tr>
	<tr><td>City</td><td><input type="text"  name = "city" required></td></tr>
	<tr><td>State</td><td><input type="text" name = "state" required></td></tr>
	<tr><td>Pincode</td><td><input type="number" name = "pin" max="999999" required></td></tr>
	<tr><td colspan = "2"><input type = "checkbox" name = "tnc" required>I agree to your<a href = "t&c.php" target="_blank">Terms and conditions </a>.</td></tr></table></td>
	<td><button class="button1" onclick="register()">Confirm Details</button></td></tr></table>
	</form>
  </div>
</div>
<?php 
function register(){
	
}
?>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("button");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</div>
<div id="footer">
<table border="0" align="center">
<tr><td><img src="footer1.jpg" height="75px" width="75px" style="margin-left:30"></td><td><img src="images.jpeg" style="margin-left:30" height="75px" width="75px"></td><td><img src="logo.png" style="margin-left:30" height="75px" width="75px"></td></tr></table>
</div>
</body>