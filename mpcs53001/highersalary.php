<?php

// Connection parameters 
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'ziqingz';
$password = 'zzq123456';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database) or die('Could not connect: '.mysqli_connect_error());
print 'Connected successfully!<br>';

$num = (int)$_REQUEST["num"];

$query = "SELECT DepartmentName FROM Employee  GROUP BY DepartmentName Having AVG(Salary) - $num > 0 ";
$result = mysqli_query($dbcon, $query) or die('Query failed: '.mysqli_error($dbcon));
$tuple = mysqli_fetch_array($result);
if (empty($tuple)){
	print "no such Department";
}
else{
print " The Department should be:<br>";
printf("[%s] <br>", $tuple['DepartmentName']);
while($tuple = mysqli_fetch_array($result)){	
	printf("[%s] <br>", $tuple['DepartmentName']);
}}



// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);

?> 
