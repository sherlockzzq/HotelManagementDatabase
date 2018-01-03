<?php

// Connection parameters 
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'ziqingz';
$password = 'zzq123456';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database) or die('Could not connect: '.mysqli_connect_error());
print 'Connected successfully!<br>';

$name = $_REQUEST["name"];
// Get the attributes of hotel

$query = "SELECT Name FROM Hotel where Name Like '%$name%'";
$result = mysqli_query($dbcon, $query) or die('Query failed: '.mysqli_error($dbcon));

$tuple = mysqli_fetch_array($result);
if (empty($tuple)){
	print "no such hotel";
}
else{
print " we have the following results: <br>";
printf("Name: [%s]<br>", $tuple['Name']);
while($tuple = mysqli_fetch_array($result)){	
	printf("Name: [%s]<br>", $tuple['Name']);
}}

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);

?> 
