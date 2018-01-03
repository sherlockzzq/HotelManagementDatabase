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
$SSN = $_REQUEST["SSN"];

// Get the price of the hotel for the datetime given.
$query = "SELECT p.StartDate as date, h.Name as name FROM Reservation p, Hotel h WHERE h.HotelAddress in (Select distinct HotelAddress from Reservation where SSN = '$SSN') AND p.SSN = '$SSN'";
$result = mysqli_query($dbcon, $query) or die('Query failed: '.mysqli_error($dbcon));


print " You have the following reservations: <br>";

while($tuple = mysqli_fetch_array($result)){	
	print '<ul>';
	printf("<li>Hotel:   %s  <li>date:   %s <br>", $tuple['name'], $tuple['date']);
	print '</ul>';
}

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);

?> 