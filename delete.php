<?php
	$id=$_GET['id'];
	include('conn.php');
	mysqli_query($conn,"delete from `consumer` where C_ID='$id'");
	header('location:consumer.php');
?>