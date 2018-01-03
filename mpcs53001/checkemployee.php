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
$ID = $_REQUEST["ID"];

// Get the price of the hotel for the datetime given.
$query = "SELECT * FROM Employee WHERE EmployeeNO = '$ID'";
$result = mysqli_query($dbcon, $query) or die('Query failed: '.mysqli_error($dbcon));
$tuple = mysqli_fetch_array($result);
if (empty($tuple)){
	print "no such employee";
}
else{
print " $ID have the following attributes: <br>";
printf("HotelAddress: [%s]  DepartmentName: [%s]  EmployeeNo: [%s] Name: [%s]  Salary: [%s]  Address: [%s]  Birthday: [%s] <br>", $tuple['HotelAddress'], $tuple['DepartmentName'], $tuple['EmployeeNo'], $tuple['Name'], $tuple['Salary'], $tuple['Address'], $tuple['Birthday']);
while($tuple = mysqli_fetch_array($result)){	
	printf("HotelAddress: [%s]  DepartmentName: [%s]  EmployeeNo: [%s] Name: [%s]  Salary: [%s]  Address: [%s]  Birthday: [%s] <br>", $tuple['HotelAddress'], $tuple['DepartmentName'], $tuple['EmployeeNo'], $tuple['Name'], $tuple['Salary'], $tuple['Address'], $tuple['Birthday']);
}}



// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);

?> 
