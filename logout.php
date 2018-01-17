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
    padding-top: 100px; /* Location of the box */
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
<tr><td align="left"><img src = "untitled.png" ></td>
<td width = "50%" align="center"><h1>Indian Railways</h1></td>
</tr>
<tr>
<td align = "center" colspan = "2">Thank You For Using Our Services</td></tr>
<tr><td align = "center" colspan = "2"><center>You will be redirected to <a href ="index.php">login page</a> in a short while</center></td></tr>
</table>
</div>
<div id= "container">
<img src = "bg.jpg" width = "100%" height = "50%" style ="border-radius:10px">
</div>
<div id="footer">
<table border="0" align="center">
<tr><td><img src="footer1.jpg" height="75px" width="75px" style="margin-left:30"></td><td><img src="images.jpeg" style="margin-left:30" height="75px" width="75px"></td><td><img src="logo.png" style="margin-left:30" height="75px" width="75px"></td></tr></table>
</div>
</body>
<?php
session_start();
session_destroy();
unset($_SESSION['IS_AUTHENTICATED']);
unset($_SESSION['USER_ID']);
header('Refresh:5;url=index.php');
?>