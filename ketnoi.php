<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kết nối php</title>
</head>
<body>
	<?php
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "quanlybanhang";
	$conn = mysqli_connect($server,$user,$pass,$database);
	?>
</body>
</html>