<?php
echo "<!DOCTYPE html>";
echo "<html>";
echo "<body style=\"background-color:#FFFACD\">";
echo "<div class=\"head\">";
echo "<img class=\"img-responsive\" src=\"/src/images/header.JPG\">";
echo "</div><br>";
if (isset($_POST["firstname"]) && isset($_POST["surname"]) && isset($_POST["ar_date"]) && isset($_POST["dep_date"]) && isset($_POST["people"])) 
{
	$firstname=htmlspecialchars($_POST["firstname"]);
	$surname=htmlspecialchars($_POST["surname"]);
	$ar_date=date_create($_POST["ar_date"]);
	$dep_date=date_create($_POST["dep_date"]);
	$num_people=htmlspecialchars($_POST["people"]);
}

$errors=False;

//Firstname validation check

if (empty($firstname)) {
	echo "<h2 align=\"center\" style=\"color:#A0522D;\">Firstname is required!</h2><br>";
	$errors=True;
}
if ((strlen($firstname)>50) || (!ctype_alpha($firstname))) {
	echo "<h2 align=\"center\" style=\"color:#A0522D;\">Firstname is invalid!</h2><br>";
	$errors=True;
}


//Surname validation check

if (empty($surname)) {
	echo "<h2 align=\"center\" style=\"color:#A0522D;\">Surname is required!</h2><br>";
	$errors=True;
}

if ((strlen($surname)>50) || (!ctype_alpha($surname))) {
	echo "<h2 align=\"center\" style=\"color:#A0522D;\">Surname is invalid!</h2><br>";
	$errors=True;
}


//Arrival date validation check
if (empty($ar_date)) {
	echo "<h2 align=\"center\" style=\"color:#A0522D;\">Please select your arrival date!</h2><br>";
	$errors=True;
}

if ($ar_date>=$dep_date) {
	echo "<h2 align=\"center\" style=\"color:#A0522D;\">Arrival date must be before departure date!</h2><br>";	
	$errors=True;
}

//if (($ar_date<"04/01/2018") || ($ar_date>"10/31/2018")) {
//	echo "<h2 align=\"center\" style=\"color:#A0522D;\">Unavailable arrival date!</h2><br>";
//	$errors=True;
//}


//Departure date validation check

if (empty($dep_date)) {
	echo "<h2 align=\"center\" style=\"color:#A0522D;\">Please select your departure date!</h2><br>";
	$errors=True;
}

if ($dep_date<=$ar_date) {
	echo "<h2 align=\"center\" style=\"color:#A0522D;\">Departure date must be after arrival date!</h2><br>";	
	$errors=True;
}

//if (($dep_date<"04/01/2018") || ($dep_date>"10/31/2018")) {
//	echo "<h2 align=\"center\" style=\"color:#A0522D;\">Unavailable departure date!<br></h2>";
//	$errors=True;
//}


//Sending data to Reservation.php
if ($errors==True) {
	exit("<h2 align=\"center\" style=\"color:#A0522D;\">Errors found!!!<br>Please check your reservation form!</h2>");
}
else{
include_once("Reservation.php");
$output = shell_exec('Reservation.php');
}
echo "</body>";
echo "</html>";
?>
