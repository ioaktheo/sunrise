<?php
	mysql_connect('localhost', 'Ioakeim', 'Sunrise2017') or die ("Unable to connect to the Database.");
	mysql_select_db('Sunrise') or die ("Unable to select the Database");

	$name=$_POST['name'];
	$surname=$_POST['surname'];
	$people=$_POST['people'];
	$ReservationDate=$_POST['ReservationDate'];
	$ArrivalDate=$_POST['ArrivalDate'];
	$DepartureDate=$_POST['DepartureDate'];

	$CustomerQuery="insert into Customer(Name, Surname) values (\"$name\", \"surname\")";
	mysql_query($CustomerQuery) or die ("Could not Insert Customer");

	if(CustomerQuery){
		$CustomerID=mysql_query('SELECT CustomerID FROM Customer ORDER BY CustomerID DESC LIMIT 1');
	}

	$ReservationQuery="insert into Reservation(People, ReservationDate, ArrivalDate, DepartureDate, CustomerID) values (\"$people\", \"$ReservationDate\", \"$ArrivalDate\", \"$DepartureDate\", \"$CustomerID\")";
	mysql_query($ReservationQuery) or die ("Could not complete the Reservation");

	mysql_close();
?>