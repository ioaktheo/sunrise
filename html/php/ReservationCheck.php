<?php
$connection = mysqli_connect("localhost", "George", "Sunrise2017", "Sunrise"); 
	
	if($connection == false){
		die("Connection failed: ".mysqli_connect_error());
	}
	$res_id=htmlspecialchars($_POST["reservation_id"]);
	$data_query="SELECT Name,Surname,People,ArrivalDate,DepartureDate FROM Customer,Reservation WHERE CustomerID=ReservationID.CustomerID AND ReservationID=".$res_id;
	
	
	if (mysqli_query($connection,$data_query)) {
		$name=$row["Name"];
		$surname=$row["Surname"];
		$people=$row["People"];
		$arr_date=$row["ArrivalDate"];
		$dep_date=$row["DeprtureDate"];
	echo "!DOCTYPE html";
	echo "<html>";
	echo "<head>";
	echo "<style>";
	echo "body{";
	echo "background-color:#FFFACD";
	echo "}";
	echo "</style>";
	echo "</head>";
	echo "<body>";
	echo "<h2>Your Reservation Informnation:</h2>";
	echo "<br><br>";
	echo "<table><tr><th>Reservation ID</th><th>Firstname</th><th>Surname</th><th>Number of people</th><th>Arrival Date</th><th>Departure Date</th></tr>";
	echo "<tr><td>".$res_id."</td><td>".$name."</td><td>".$surname."</td><td>".$people."</td><td>".$arr_date."</td><td>".$dep_date."</td></tr></table>";
	echo "</body>";
	echo "</html>";
	}
?>