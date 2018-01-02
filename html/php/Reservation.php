<?php
	session_start();
	$connection = mysqli_connect("localhost", "Ioakeim", "Sunrise2017", "Sunrise"); 
	
	if($connection == false){
		die("Connection failed: ".mysqli_connect_error());
	}
	
	$name=$_SESSION['firstname'];
	$surname=$_SESSION['surname'];
	$people=$_SESSION['num_people'];
	$arrival_date=$_SESSION['ar_date'];
	$departure_date=$_SESSION['dep_date'];
	$reservation_date=date_default_timezone_get();

	$customer_query="insert into Customer(Name, Surname) values (\"$name\", \"$surname\")";

	if (mysqli_query($connection, $customer_query)) {
    	$customer_id = mysqli_insert_id($connection);
    	echo "You can return again by using this customer ID: " . $customer_id;
	} else {
    	echo "Error: " . $customer_query . "<br>" . mysqli_error($connection);
	}

	$reservation_query="insert into Reservation(People, ArrivalDate, DepartureDate, CustomerID) values (\"$people\", \"$arrival_date\", \"$departure_date\", \"$customer_id\")";
	
	if (mysqli_query($connection, $reservation_query)){
		$reservation_id = mysqli_insert_id($connection);
		echo "Thank you for your reservation. Your Reservation ID is: " . $reservation_id;

	}else{
	 	echo "Error: " . $reservation_query . "<br>" . mysqli_error($connection);
	}

	mysqli_close($connection);
?>