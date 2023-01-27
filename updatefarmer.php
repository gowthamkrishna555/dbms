<?php
	include('conn.php');
	$id=$_GET['id'];
 
	$F_NAME=$_POST['F_NAME'];
	$F_ADDRESS=$_POST['F_ADDRESS'];
    $F_CONTACT=$_POST['F_CONTACT'];
	$F_AGE=$_POST['F_AGE'];
 
	mysqli_query($conn,"update `farmer` set  F_ADDRESS='$F_ADDRESS',F_CONTACT='$F_CONTACT',F_AGE='$F_AGE' where F_ID='$id'");
	header('location:farmer.php');
?>