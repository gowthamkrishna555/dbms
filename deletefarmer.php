<?php
	$id=$_GET['id'];
	include('conn.php');
	mysqli_query($conn,"delete from `farmer` where F_ID='$id'");
	header('location:farmer.php');
?>