<?php
	include('conn.php');
    session_start();

	$F_ID=$_POST['F_ID'];
	$F_NAME=$_POST['F_NAME'];
    $F_ADDRESS=$_POST['F_ADDRESS'];
    $F_CONTACT=$_POST['F_CONTACT'];
    $F_AGE=$_POST['F_AGE'];

 
	mysqli_query($conn,"insert into `farmer` (F_ID,F_NAME,F_ADDRESS,F_CONTACT,F_AGE) values ('$F_ID','$F_NAME','$F_ADDRESS','$F_CONTACT',' $F_AGE')");
	
	$_SESSION['USER']=$F_ID;
	header('location:farmer.php');
 
?>