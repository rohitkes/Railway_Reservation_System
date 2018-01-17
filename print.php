<?php
session_start();
$pnr = $_SESSION['pnr'];
$class = $_SESSION['class'];
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
 $q = "SELECT Date FROM passenger WHERE PNR = '$pnr'";
 $r = mysqli_query($link,$q);
 $rr = mysqli_fetch_assoc($r);
 $date = $rr['Date'];
 
 $q1 = "SELECT Train_ID FROM passenger WHERE PNR = '$pnr'";
 $r1 = mysqli_query($link,$q1);
 $rr1 = mysqli_fetch_assoc($r1);
 $train = $rr1['Train_ID'];
 
 $q2 = "SELECT Train_name FROM train WHERE Train_ID = '$train'";
 $r2 = mysqli_query($link,$q2);
 $rr2 = mysqli_fetch_assoc($r2);
 $tname = $rr2['Train_name'];
 
 $qry = "SELECT * FROM passenger WHERE PNR = '$pnr'";
 $res = mysqli_query($link,$qry);
 
 echo '
		<table border = "0" width = "100%">
		<tr><td><img src = "untitled.png"></td>
		<th allign = "left"><h1>Indian Railways</h1></td></tr></table>
 ';
 echo '<hr>
	<table border = "0" align = "center" width = "80%">
	<tr><td align = "center">PNR :- '.$pnr.'</td>
	<td align = "center">Train no. :- '.$train.'</td>
	<td align = "center">Train Name :- '.$tname.'</td>
	<td align = "center">Date Of Journey :- '.$date.'</td></tr>
	</table>
	<table border = "1" align = "center" width = "80%">
	<tr><th align = "center">S. No.</th>
	<th align = "center">Name</th>
	<th align = "center">Age</th>
	<th align = "center">Class</th>
	<th align = "center">Seat No.</th>
	</tr>
 ';
 $i = 1;
 while ($row = mysqli_fetch_assoc($res)){
	 echo '
		<tr><td align = "center">'.$i.'</td>
		<td align = "center">'.$row['Passenger_name'].'</td>
		<td align = "center">'.$row['Age'].'</td>
		<td align = "center">'.$class.'</td>
		<td align = "center">'.$row['Seat_number'].'</td>
		</tr>
	 ';
	 $i = $i + 1;
 }
 echo '</table>';
 echo ' <center><button onClick = "myFunction()">Print</button></center>
';
 ?>
 <script>
function myFunction() {
    window.print();
}
</script>