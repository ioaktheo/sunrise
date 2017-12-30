<?php
	session_start();
	$link = mysqli_connect("localhost", "Ioakeim", "Sunrise2017", "Sunrise"); 
	
	if($link == false){
		die("ERROR: Could not connect.".mysqli_connect_error());
	}
	
	$name=$_SESSION['firstname'];
	$surname=$_SESSION['surname'];
	$people=$_SESSION['num_people'];
	$ArrivalDate=$_SESSION['ar_date'];
	$DepartureDate=$_SESSION['dep_date'];
	$ReservationDate=date_default_timezone_get();

	$CustomerQuery="insert into Customer(Name, Surname) values (\"$name\", \"$surname\")";
	$result = mysqli_query($link, $CustomerQuery) or die ("Could not Insert Customer");

	if(result){
		$CustomerID=mysqli_num_rows(mysqli_query($link, "SELECT CustomerID FROM Customer ORDER BY CustomerID DESC LIMIT 1"));
	}

	$ReservationQuery="insert into Reservation(People, ReservationDate, ArrivalDate, DepartureDate, CustomerID) values (\"$people\", \"$ReservationDate\", \"$ArrivalDate\", \"$DepartureDate\", \"$CustomerID\")";
	
	mysqli_query($link, $ReservationQuery) or die ("Could not complete the Reservation");

	mysqli_close($link);
?>