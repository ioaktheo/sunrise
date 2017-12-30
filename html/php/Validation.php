<?php
include_once("Reservation.php");
if (isset($_POST["firstname"]) && isset($_POST["surname"]) && isset($_POST["ar_date"]) && isset($_POST["dep_date"]) && isset($_POST["people"])) 
{
	$firstname=htmlspecialchars($_POST["firstname"]);
	$surname=htmlspecialchars($_POST["surname"]);
	$ar_date=htmlspecialchars($_POST["ar_date"]);
	$dep_date=htmlspecialchars($_POST["dep_date"]);
	$num_people=htmlspecialchars($_POST["people"]);
}

//Firstname validation check

if (empty($firstname)) {
	echo "Firstname is required!<br>";
}
if ((strlen($firstname)>50) || (!ctype_alpha($firstname))) {
	echo "Firstname is invalid!<br>";
}

//Surname validation check

if (empty($surname)) {
	echo "Surname is required!<br>";
}
if ((strlen($surname)>50) || (!ctype_alpha($surname))) {
	echo "Surname is invalid!<br>";
}

//Arrival date validation check
if (empty($ar_date)) {
	echo "Please select your arrival date!<br>";
}
if ($ar_date>=$dep_date) {
	echo "Arrival date must be before departure date!<br>";	
}
//if (($ar_date<1/4) || ($ar_date>30/10)) {
//	echo "Unavailable date!";
//}

//Departure date validation check

if (empty($dep_date)) {
	echo "Please select your departure date!<br>";
}
if ($dep_date<=$ar_date) {
	echo "Departure date must be after arrival date!<br>";	
}
//if (($dep_date<1/4) || ($dep_date>30/10)) {
//	echo "Unavailable date!";
//}

//Sending data to Reservation.php
$output = shell_exec('Reservation.php');
echo "<pre>$output</pre>";
?>
