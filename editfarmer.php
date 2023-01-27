<?php
	include('conn.php');
	$id=$_GET['id'];
	$query=mysqli_query($conn,"select * from `farmer` where F_ID='$id'");
	$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
<title>FARMER</title>
<script>
  function validateForm() {
    var contact = document.forms["editForm"]["F_CONTACT"].value;
    var age = document.forms["editForm"]["F_AGE"].value;
    if (contact < 0 || age < 0) {
        alert("Contact and age cannot be negative.");
        return false;
    }
  }
</script>
<style>
body{
		background-image: linear-gradient(to right, #8360c3, #2ebf91);
	}
	</style>
</head>
<body>
	<h2>Edit</h2>
	<form method="POST" action="updatefarmer.php?id=<?php echo $id; ?>"  name="editForm" onsubmit="return validateForm()">
		
		<label>ADDRESS</label><input type="text" value="<?php echo $row['F_ADDRESS']; ?>" name="F_ADDRESS">
        <label>CONTACT</label><input type="number" value="<?php echo $row['F_CONTACT']; ?>" name="F_CONTACT">
        <label>AGE</label><input type="number" value="<?php echo $row['F_AGE']; ?>" name="F_AGE">
		<input type="submit" name="submit">
		<a href="farmer.php">Back</a>
	</form>
</body>
<html>