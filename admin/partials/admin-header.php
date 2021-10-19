<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">

	<title>Mubi</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
	<link rel="icon" href="assets/favicon.ico" type="image/x-icon">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@500;600&family=Playfair+Display:wght@900&family=Roboto&display=swap" rel="stylesheet">

    <!-- jQuery -->
	<script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>

	<!-- Bootstrap CSS -->
	<!-- <link rel="stylesheet" href="assets/bootstrap-5.1.3-dist/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	

    <!-- Bootstrap JS -->
	<!-- <link rel="stylesheet" href="assets/bootstrap-5.1.3-dist/css/bootstrap.min.js"> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/admin.css">
    
    <!-- Custom JS -->
	<script type="text/javascript" src="assets/js/custom.js"></script>
	

	<?php

	session_start();

	if($_SESSION['userRole']!=1){
		header("Location: ../login.php");
		exit();
	}
	
	?>

</head>
<body>

<main>
	<div>
		<div class="container-fluid">
			<div class="row">
				<div class="col col-lg-3 sidebar">
					<div class="menu-container">
						<a class="logo" aria-current="page" href="home.php"><img class="logo" src="assets/logo.png" alt="mubi"></a>
						<div class=""><a href="../home.php">VISIT SITE</a></div>            
						<div class=""><a href="home.php">DASHBOARD</a></div>
						<div class=""><a href="movies.php">MOVIES</a></div>
						<div class=""><a href="addmovie.php">ADD MOVIE</a></div>
						<div class=""><a href="schedule.php">SCHEDULE</a></div>
						<div class=""><a href="users.php">USERS</a></div>
						<div class=""><a href="process-logout.php">LOGOUT</a></div>
					</div>
				</div>