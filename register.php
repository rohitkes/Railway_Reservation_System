<?php 
$user = $_POST['user'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$mobile = $_POST['mobile'];
$secq = $_POST['sec_qn'];
$seca = $_POST['sec_ans'];
$city = $_POST['city'];
$state = $_POST['state'];
if ($pass1 == $pass2){
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
 $check = "SELECT * FROM user WHERE User_name = '$user' ";
 $res = mysqli_query($link, $check);
 $count = mysqli_num_rows($res);
 if (!($count >= 1) ){
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
 $qry = "INSERT INTO user (User_name,EmailID,Password,FullName,Gender,dob,Mobile,City,State,Security_question,Security_answer) VALUES ('$user','$email','$pass1','$name','$gender','$dob','$mobile','$city','$state','$secq','$seca')"; 
 $result=mysqli_query($link, $qry);
 if (!$result){
	 echo ('<center>There is a problem with Registration</br>Please Try Again</center>');
	 include('index.php');
 }
 else {
	 echo ('<center>Successfully Registered</center>');
	 include 'index.php';
 }
}
else {
	echo '<center>Username already exists</br>choose another username</center>';
	include 'index.php';
}
}
else {
	echo '<center>Passwords Entered Are Different</br>Enter The Same Passwords</center>';
	include'index.php';
}
?>