<?php
$_SESSION ['firstname']=$POST['name1'];
$_SESSION ['surname']=$POST['name2'];
$_SESSION ['ar_date']=$POST['datepicker'];
$_SESSION ['dep_date']=$POST['datepicker2'];
$_SESSION ['num_people']=$POST['people'];

//Firstname validetion check
if (empty($firstname) {
	echo "Firstname is required!";
}
if (strlen($firstname)<50) && (ctype_alpha($firstname)){
	
}
else
{
	echo "Firstname is invalid!";
}

//Surname validation check
if (empty($surname) {
	echo "Surname is required!";
}
if (strlen($surstname)<50) && (ctype_alpha($surname)){
	
}
else
{
	echo "Surname is invalid!";
}

//Arrival date validation check
//if (empty($ar_date)) {
//	echo "Please select your arrival date!";
//}
//if ($ar_date)<() {
	
//}

//Departure date validation check
$output = shell_exec('Reservation.php');
echo "<pre>$output</pre>";
?>
