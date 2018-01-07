<?php
$connection = mysqli_connect("localhost", "Ioakeim", "Sunrise2017", "Sunrise"); 
	
	if($connection == false){
		die("Connection failed: ".mysqli_connect_error());
	}
	if (isset($_POST["reservation_id"])) {
		$res_id=$_POST["reservation_id"];
	}
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
		echo "<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css\">";
		echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>";
		echo "<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js\"></script>";
		echo "</head>";
		echo "<body style=\"background-color:#FFFACD\">";
		echo "<div class=\"head\">";
		echo "<img class=\"img-responsive\" src=\"/src/images/header.JPG\">";
		echo "</div><br>";
		echo "<div class=\"container\">";
		echo "<br>";
		echo "<h2 align=\"center\">Your Reservation Informnation:</h2>";
		echo "<br><br>";
		echo "<table class=\"table\">";
		echo "<thead>";
		echo "<tr class=\"active\">";
		echo "<th>Reservation ID</th><th>Firstname</th><th>Surname</th><th>Number of people</th><th>Arrival Date</th><th>Departure Date</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		echo "<tr>";
		echo "<td>".$res_id."</td><td>".$name."</td><td>".$surname."</td><td>".$people."</td><td>".$arr_date."</td><td>".$dep_date."</td>";
		echo "</tr";
		echo "</tbody>";
		echo "</table";
		echo "</div>";
		echo "</body>";
		echo "</html>";
	}
	else{
		echo "!DOCTYPE html";
		echo "<html>";
		echo "<head>";
		echo "<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css\">";
		echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>";
		echo "<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js\"></script>";
		echo "</head>";
		echo "<body style=\"background-color:#FFFACD\">";
		echo "<div class=\"container\">";
		echo "<br>";
		echo "<h2 align=\"center\" style=\"color:#A0522D;\">Error:The Reservation ID you inserted is incorrect!!!</h2>";
		echo "br";
		echo "<h2 align=\"center\" style=\"color:#A0522D;\">Please enter a valid Reservation ID.</h2>";
		echo "</div>";
		echo "</body>";
		echo "</html>";
	}
?>