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
$time = $_REQUEST["time"];

// Get the price of the hotel for the datetime given.
$query = "SELECT RoomNumber, OriginalPrice, ActualPrice FROM Price WHERE HotelAddress in (Select HotelAddress From Hotel Where Name = '$name') AND Date = '$time'";
$result = mysqli_query($dbcon, $query) or die('Query failed: '.mysqli_error($dbcon));


print " <b>$name</b> has the following room and price: <br>";
print '<table border = "3">';
print '<tr>';
print '<td>RoomNumber</td> <td> OriginalPrice </td> <td> ActualPrice </td> ';
while($tuple = mysqli_fetch_array($result)){	

	print '<tr>';
	printf("<td>%s</td> <td>%s</td> <td>%s</td>", $tuple['RoomNumber'], $tuple['OriginalPrice'], $tuple['ActualPrice']);
	print '</tr>';
}
print '</table>';

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);

?> 
