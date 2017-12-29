<?php
	session_start();
	mysql_connect('localhost', 'Ioakeim', 'Sunrise2017') or die ("Unable to connect to the Database.");
	mysql_select_db('Sunrise') or die ("Unable to select the Database");
	
	$name=$_SESSION['firstname'];
	$surname=$_SESSION['surname'];
	$people=$_SESSION['num_people'];
	$ArrivalDate=$_SESSION['ar_date'];
	$DepartureDate=$_SESSION['dep_date'];
	$ReservationDate=date_default_timezone_get();

	$CustomerQuery="insert into Customer(Name, Surname) values (\"$name\", \"surname\")";
	mysql_query($CustomerQuery) or die ("Could not Insert Customer");

	if(CustomerQuery){
		$CustomerID=mysql_query('SELECT CustomerID FROM Customer ORDER BY CustomerID DESC LIMIT 1');
	}

	$ReservationQuery="insert into Reservation(People, ReservationDate, ArrivalDate, DepartureDate, CustomerID) values (\"$people\", \"$ReservationDate\", \"$ArrivalDate\", \"$DepartureDate\", \"$CustomerID\")";
	
	mysql_query($ReservationQuery) or die ("Could not complete the Reservation");

	mysql_close();
?>