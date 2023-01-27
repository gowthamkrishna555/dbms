<?php
	include('conn.php');
	$id=$_GET['id'];
	$query=mysqli_query($conn,"select * from `sell` where F_ID='$id'");
	$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
<title>SELL</title>
<style>
body{
    background-image: linear-gradient(to right, #8360c3, #2ebf91);
	}
</style>
</head>
<body>
	<h2>Edit</h2>
	<form method="POST" action="updatesell.php?id=<?php echo $id; ?>">
		<label>F_ID</label><input type="text" value="<?php echo $row['F_ID']; ?>" name="F_ID">
		<label>P_ID</label><input type="text" value="<?php echo $row['P_ID']; ?>" name="P_ID">
        <label>S_DATE</label><input type="date" value="<?php echo $row['S_DATE']; ?>" name="S_DATE">
        
		<input type="submit" name="submit">
		<a href="sell.php">Back</a>
	</form>
</body>
<html>