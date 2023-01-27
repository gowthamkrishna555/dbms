<?php
	include('conn.php');
    session_start();

	$C_ID=$_POST['C_ID'];
	$C_NAME=$_POST['C_NAME'];
    $C_ADDRESS=$_POST['C_ADDRESS'];
    $C_CONTACT=$_POST['C_CONTACT'];
    $C_AGE=$_POST['C_AGE'];
   
 
	mysqli_query($conn,"insert into `consumer` (C_ID,C_NAME,C_ADDRESS,C_CONTACT,C_AGE) values ('$C_ID','$C_NAME','$C_ADDRESS','$C_CONTACT',' $C_AGE')");
	$_SESSION['USER']=$C_ID;	
	header('location:consumer.php');
 
?>