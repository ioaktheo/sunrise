<?php
	session_start();
	$connection = mysqli_connect("localhost", "Ioakeim", "Sunrise2017", "Sunrise"); 
	
	if($connection == false){
		die("Connection failed: ".mysqli_connect_error());
	}
	
	$name=$_SESSION['firstname'];
	$surname=$_SESSION['surname'];
	$people= 5;
	$arrival_date=date('2017-06-05 20:20:20');
	$departure_date=date('2017-06-05 20:20:20');

	$customer_query="insert into Customer(Name, Surname) values (\"$name\", \"$surname\")";

	$reservation_query="insert into Reservation(People, ArrivalDate, DepartureDate, CustomerID) values (\"$people\", \"$arrival_date\", \"$departure_date\", \"$customer_id\")";

	if (mysqli_query($connection, $customer_query)) {
    	$customer_id = mysqli_insert_id($connection);

    	if (mysqli_query($connection, $reservation_query)){
			$reservation_id = mysqli_insert_id($connection);
			echo "<h1 align="center">Thank you for your reservation. Your Reservation ID is: " . $reservation_id."</h1><br><br>";
			echo "<h2 align="center">You can return again by using this customer ID: " .$customer_id."</h2>";
		}else{
	 		echo "Error: " . $reservation_query . "<br>" . mysqli_error($connection);
		}
	} else {
    	echo "Error: " . $customer_query . "<br>" . mysqli_error($connection);
	}

	mysqli_close($connection);
?>