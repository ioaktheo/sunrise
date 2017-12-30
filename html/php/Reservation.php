<?php
	session_start();

	$conn = new mysqli("localhost", "Ioakeim", "Sunrise2017", "Sunrise");

	if ($conn->connect_error){
		die("ERROR: Unable to connect: ". $conn->connect_error);
	}
	
	$name=$_SESSION['firstname'];
	$surname=$_SESSION['surname'];
	$people=$_SESSION['num_people'];
	$ArrivalDate=$_SESSION['ar_date'];
	$DepartureDate=$_SESSION['dep_date'];
	$ReservationDate=date_default_timezone_get();

	$CustomerQuery="insert into Customer(Name, Surname) values (\"$name\", \"$surname\")";
	$result = $conn->query($CustomerQuery) or die ("Could not Insert Customer");

	if($result){
		$CustomerID=conn->query('SELECT CustomerID FROM Customer ORDER BY CustomerID DESC LIMIT 1');
	}

	$ReservationQuery="insert into Reservation(People, ReservationDate, ArrivalDate, DepartureDate, CustomerID) values (\"$people\", \"$ReservationDate\", \"$ArrivalDate\", \"$DepartureDate\", \"$CustomerID\")";
	
	$result = conn->query($ReservationQuery) or die ("Could not complete the Reservation");

	mysql_close();
?>