<?php
	include('conn.php');
	session_start();
	$F_ID=$_POST['F_ID'];
	$P_ID=$_POST['P_ID'];
    $S_DATE=$_POST['S_DATE'];
   

    $check_F_ID = mysqli_query($conn,"SELECT * FROM farmer WHERE F_ID='$F_ID'");
    $check_P_ID = mysqli_query($conn,"SELECT * FROM product WHERE P_ID='$P_ID'");
    if(mysqli_num_rows($check_F_ID) == 0)
    {
        echo "<script>alert('Invalid Farmer ID'); window.location.href = 'sell.php';</script>";
    }
    else if(mysqli_num_rows($check_P_ID) == 0)
    {
        echo "<script>alert('Invalid Product ID'); window.location.href = 'sell.php';</script>";
    }
    else
    {
        mysqli_query($conn,"insert into `sell` (F_ID,P_ID,S_DATE) values ('$F_ID','$P_ID','$S_DATE')");
	    $_SESSION['USER']=$F_ID;
	    header('location:sell.php');
    }
?>