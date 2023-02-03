<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET Parameter Assignment </title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<h1>Am I Eligible to Vote?</h1>
<div class="get">
<?php
$firstname = filter_input(INPUT_GET, 'firstname', FILTER_SANITIZE_STRING);
$lastname = filter_input(INPUT_GET, 'lastname', FILTER_SANITIZE_STRING);
$age = filter_input(INPUT_GET, 'age', FILTER_SANITIZE_NUMBER_INT);
if (empty($firstname) || empty($lastname) || empty($age) || $age < 1) {
    echo "Missing data or error occurred: please provide valid parameters for firstname, lastname, and age using the address bar.<br><br>For example, \"./index.php?firstname=John&lastname=Doe&age=18\"<br>";
	exit(1);
}
if (isset($_GET['firstname']) && isset($_GET['lastname']) && isset($_GET['age'])) {
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
	$age = $_GET['age'];
	echo htmlspecialchars("Hello, my name is $firstname $lastname. ");
	echo htmlspecialchars("I am $age years old and ");
	if ($age >= 18){
		echo htmlspecialchars("I am old enough to vote in the United States.") . "<br>";
	}
	else{
		echo htmlspecialchars("I am not old enough to vote in the United States.") . "<br>";
		$yearsleft = 18-$age;
		$daysleft = 365*$yearsleft;
		echo "<br>" . htmlspecialchars(" I will be able to vote in about $daysleft days.") . "<br>";
	}
	echo "<br>Today's date is " . date("m/d/y");
}
?>
</div>
<div class="footer">
	<h4>Author: Joshua Jarmer</h4>
</div>
</body>
</html>
