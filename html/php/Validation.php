<?php

if (isset($_POST["name1"]) && isset($_POST["name2"]) && isset($_POST["datepicker"]) && isset($_POST["datepicker2"]) && isset($_POST["people"])) 
{
	$firstname=htmlspecialchars($_POST["name1"]);
	$surname=htmlspecialchars($_POST["name2"]);
	$ar_date=htmlspecialchars($_POST["datepicker"]);
	$dep_date=htmlspecialchars($_POST["datepicker2"]);
	$num_people=htmlspecialchars($_POST["people"]);
}

//Firstname validation check

if (empty($firstname) {
	echo "Firstname is required!";
}
if (strlen($firstname)>50) || (!ctype_alpha($firstname)) {
	echo "Firstname is invalid!";
}

//Surname validation check

if (empty($surname) {
	echo "Surname is required!";
}
if (strlen($surstname)>50) || (!ctype_alpha($surname)) {
	echo "Surname is invalid!";
}

//Arrival date validation check
if (empty($ar_date)) {
	echo "Please select your arrival date!";
}
if ($ar_date>=$dep_date) {
	echo "Arrival date must be before departure date!";	
}
if ($ar_date<1/4) || ($ar_date>30/10) {
	echo "Unavailable date!";
}

//Departure date validation check

if (empty($dep_date)) {
	echo "Please select your departure date!";
}
if ($dep_date<=$ar_date) {
	echo "Departure date must be after arrival date!";	
}
if ($dep_date<1/4) || ($dep_date>30/10) {
	echo "Unavailable date!";
}

//Sending data to Reservation.php
$output = shell_exec('Reservation.php');
echo "<pre>$output</pre>";
?>
