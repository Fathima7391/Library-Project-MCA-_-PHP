<?php
  session_start();
  if(!isset($_SESSION['username'])){
	  header("location:../login.php");
  }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<!-- my style -->
	<link href="library/home.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<img src="library/images/admin_logo.jpg" class="admin-logo">
		<h3 class="admin">Admin</h3>
		<a href="add_book.php" class="admin-items one-top" target="content">Add Book</a>
		<a href="add_student.php" class="admin-items" target="content">Add Student</a>
		<a href="add_request.php" class="admin-items" target="content">Approve Request</a>
		<a href="view_student.php" class="admin-items" target="content">View Student</a>
		<a href="view_book.php" class="admin-items" target="content">Search Book</a>
		<a href="issue_book.php" class="admin-items" target="content">Issue Book</a>
		<a href="return_book.php" class="admin-items" target="content">Return Book</a>
		<a href="book_transactions.php" class="admin-items" target="content">History</a>
		<a href="logout.php" class="admin-items">Logout</a>
	
	</div>
	<!-- Use any element to open the sidenav -->
	<span id="nav-bar-btn" style="font-size:30px;cursor:pointer" onclick="openNav()"><i class="fa fa-home" style="font-size:36px"></i> </span>


	<div class="contents" id="myiframe">
		<iframe name="content" class="contents" src="home.php">
				
		</iframe>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="library/javascript.js"></script>
</body>
</html>