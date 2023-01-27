<?php
	include('conn.php');
	session_start();
	$P_ID=$_POST['P_ID'];
	$C_ID=$_POST['C_ID'];
    $B_QTY=$_POST['B_QTY'];
    $B_DATE=$_POST['B_DATE'];
   
    $check_P_ID = mysqli_query($conn,"SELECT * FROM product WHERE P_ID='$P_ID'");
    $check_C_ID = mysqli_query($conn,"SELECT * FROM consumer WHERE C_ID='$C_ID'");
    if(mysqli_num_rows($check_P_ID) == 0)
    {
        echo "<script>alert('Invalid Product ID'); window.location.href='buy.php';</script>";
    }
    else if(mysqli_num_rows($check_C_ID) == 0)
    {
        echo "<script>alert('Invalid Customer ID'); window.location.href='buy.php';</script>";
    }
    else
    {
        mysqli_query($conn,"insert into `buy` (P_ID,C_ID,B_QTY,B_DATE) values ('$P_ID','$C_ID','$B_QTY','$B_DATE')");
	    $_SESSION['USER']=$C_ID;
	    header('location:buy.php');
    }
?>