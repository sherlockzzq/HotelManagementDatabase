<?php

// Connection parameters 
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'ziqingz';
$password = 'zzq123456';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database) or die('Could not connect: '.mysqli_connect_error());
print 'Connected successfully!<br>';

// Getting the selected parameter (name):
$name = $_REQUEST["name"];

// Get the attributes of the hotel with the selected name
$query = "SELECT * FROM Hotel WHERE Name = '$name'";
$result = mysqli_query($dbcon, $query) or die('Query failed: '.mysqli_error($dbcon));

$tuple = mysqli_fetch_array($result);
if($tuple == NULL){
	die("Submit the right hotel!");
}
print " <b>$name</b> has the following information: <br>";
print '<ul>';
	print '<li>HotelAddress:'.$tuple['HotelAddress'];
	print '<li>Name: '.$tuple['Name'];
	print '<li>ContactNumber:'.$tuple['ContactNumber'];
	print '<li>ZipCode:'.$tuple['ZipCode'];
	print '</ul>';
while($tuple = mysqli_fetch_array($result)){	
	print '<ul>';
	print '<li>HotelAddress:'.$tuple['HotelAddress'];
	print '<li>Name: '.$tuple['Name'];
	print '<li>ContactNumber:'.$tuple['ContactNumber'];
	print '<li>ZipCode:'.$tuple['ZipCode'];
	print '</ul>';
}

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);

?> 
