<?php
 $login = $_POST[ 'un' ];
 $password = $_POST[ 'pw' ];
 if($login && $password){
 //Connect to mysql server
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
 $qry="SELECT * FROM user WHERE User_name = '$login' AND Password = '$password'";
 //echo $qry;
 //Execute query
 $result=mysqli_query($link, $qry);
 $row = mysqli_fetch_assoc($result);
 //Check whether the query was successful or not
 if($result){
  $count = mysqli_num_rows($result);
 }
 else{
 //Login failed
 include('index.php' );
 echo '<center>Incorrect Username or Password !!!<center>' ;
 exit();
 }
 //if query was successful it should fetch 1 matching record from the table.
 if($count == 1){
 //Login successful set session variables and redirect to main page.
 session_start();
  $_SESSION[ 'IS_AUTHENTICATED' ] = 1;
  $_SESSION['UN'] = $login;
 $_SESSION[ 'USER_ID' ] = $row['FullName'];
 header('location:search.php' );
 }
 else{
 //Login failed
 echo '<center>Incorrect Username or Password !!!<center>' ;
 include('index.php' );
  
 exit();
 }
 }
 else{
	 echo '<center>Username or Password missing!!</center>' ;
 include('index.php' );
  exit();
 }
 mysqli_free_result($result);

mysqli_close($link);
?>