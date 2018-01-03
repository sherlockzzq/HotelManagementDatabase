<?php

// Connection parameters 
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'ziqingz';
$password = 'zzq123456';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database) or die('Could not connect: '.mysqli_connect_error());
print 'Connected successfully!<br>';

// Getting the selected parameter (name and time):
$name = $_REQUEST["name"];

// Get the price of the hotel for the datetime given.
$query = "SELECT AVG(Salary) as salary FROM Employee WHERE HotelAddress in (SELECT HotelAddress FROM Hotel WHERE Name = '$name') gROUP BY HotelAddress ";
$result = mysqli_query($dbcon, $query) or die('Query failed: '.mysqli_error($dbcon));
$tuple = mysqli_fetch_array($result);
if (empty($tuple)){
	print "no such hotel";
}
else{
print " The average salary of $name is";
printf("[%s] <br>", $tuple['salary']);
while($tuple = mysqli_fetch_array($result)){	
	printf("[%s] <br>", $tuple['salary']);
}}



// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);

?> 
