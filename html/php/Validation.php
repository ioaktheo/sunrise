<?php
if (isset($_POST["firstname"]) && isset($_POST["surname"]) && isset($_POST["ar_date"]) && isset($_POST["dep_date"]) && isset($_POST["people"])) 
{
	$firstname=htmlspecialchars($_POST["firstname"]);
	$surname=htmlspecialchars($_POST["surname"]);
	$ar_date=htmlspecialchars($_POST["ar_date"]);
	$dep_date=htmlspecialchars($_POST["dep_date"]);
	$num_people=htmlspecialchars($_POST["people"]);
}

$errors=False;

//Firstname validation check

if (empty($firstname)) {
	echo "Firstname is required!<br>";
	$errors=True;
}
if ((strlen($firstname)>50) || (!ctype_alpha($firstname))) {
	echo "Firstname is invalid!<br>";
	$errors=True;
}


//Surname validation check

if (empty($surname)) {
	echo "Surname is required!<br>";
	$errors=True;
}

if ((strlen($surname)>50) || (!ctype_alpha($surname))) {
	echo "Surname is invalid!<br>";
	$errors=True;
}


//Arrival date validation check
if (empty($ar_date)) {
	echo "Please select your arrival date!<br>";
	$errors=True;
}

if ($ar_date>=$dep_date) {
	echo "Arrival date must be before departure date!<br>";	
	$errors=True;
}

if (($ar_date<"2018-04-1") || ($ar_date>"2018-10-30")) {
	echo "Unavailable date!<br>";
	$errors=True;
}


//Departure date validation check

if (empty($dep_date)) {
	echo "Please select your departure date!<br>";
	$errors=True;
}

if ($dep_date<=$ar_date) {
	echo "Departure date must be after arrival date!<br>";	
	$errors=True;
}

if (($ar_date<"2018-04-1") || ($ar_date>"2018-10-30")) {
	echo "Unavailable date!<br>";
	$errors=True;
}


//Sending data to Reservation.php
if ($errors==True) {
	exit("Errors found!!!");
}
else{
include_once("Reservation.php");
$output = shell_exec('Reservation.php');
echo "<pre>$output</pre>";
}
?>
