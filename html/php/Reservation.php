<?php
	session_start();
	$connection = mysqli_connect("localhost", "Ioakeim", "Sunrise2017", "Sunrise"); 
	
	if($connection == false){
		die("Connection failed: ".mysqli_connect_error());
	}

	$name=htmlspecialchars($_POST["firstname"]);
	$surname=htmlspecialchars($_POST["surname"]);
	$arrival_date=date_create($_POST["ar_date"]);
	$departure_date=date_create($_POST["dep_date"]);
	$people=htmlspecialchars($_POST["people"]);


	$formated_arr_date=date_format($arrival_date, 'Y-m-d');
	$formated_dep_date=date_format($departure_date,'Y-m-d');

	$customer_query="insert into Customer(Name, Surname) values (\"$name\", \"$surname\")";

	if (mysqli_query($connection, $customer_query)) {
    	$customer_id = mysqli_insert_id($connection);

    	$reservation_query="insert into Reservation(People, ArrivalDate, DepartureDate, CustomerID) values (\"$people\", \"$formated_arr_date\", \"$formated_dep_date\", \"$customer_id\")";
    	
    	if (mysqli_query($connection, $reservation_query)){
			$reservation_id = mysqli_insert_id($connection);
			echo"<!DOCTYPE html>";
			echo "<html>";
			echo "<head>";
			echo "<style>";
			echo "body{";
			echo "background-size: cover;";
			echo "background-repeat: no-repeat;";
			echo "}";
			echo "h1,h2 {";
    		echo "color: white;";
			echo "}";
			echo "</style>";
			echo "</head>";
			echo "<body style=\"background-image:url(https://wallpaperlayer.com/img/2015/6/bikini-wallpaper-hd-8111-8427-hd-wallpapers.jpg)\">";
			echo "<h1 align=\"left\">Thank you for your reservation.</h1>";
			echo "<h2>Reserv
			ation ID: ".$reservation_id."<br>Customer ID: ".$customer_id."<br><h2>";
			echo "</body>";
			echo "</html>";
		}else{
	 		echo "Error: " . $reservation_query . "<br>" . mysqli_error($connection);
		}
	} else {
    	echo "Error: " . $customer_query . "<br>" . mysqli_error($connection);
	}

	mysqli_close($connection);
?>