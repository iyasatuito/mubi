<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">

	<title>Mubi</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/img/icons/favicon.ico" type="image/x-icon">
	<link rel="icon" href="assets/img/icons/favicon.ico" type="image/x-icon">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@500;600&family=Playfair+Display:wght@900&family=Roboto&display=swap" rel="stylesheet">

    <!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

	<!-- jQuery QR -->
	<!-- <script type="text/javascript" src="assets/js/jquery.qrcode.min.js"></script> -->

	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/site.css">
    
    <!-- Custom JS -->
    <script type="text/javascript" src="assets/js/custom.js"></script>

	<?php

	session_start();
	
	?>

</head>
<body>

<main>
	<nav class="navbar">
		<div class="container">
			<a class="nav-link active" aria-current="page" href="index.php"><img class="logo" src="assets/img/logo.png" alt="mubi"></a>
			<a class="nav-link" href="login.php">Login</a>
		</div>
	</nav>