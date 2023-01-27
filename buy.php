<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>BUY</title>
<style>
body{
	background-image: linear-gradient(to right, #8360c3, #2ebf91);
	}
	table,th,td{
		border: 1px solid black;
		margin:auto;

	}
	td{
		background-color:white;
		width: 200px;
		height:30px;
	}
	th{
		background-color:;
		width:200px;
		height:30px;
	}
	.button{
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  position:relative;
  top:400px;
  left:550px;
  height: 40px;
  background-image: linear-gradient(to right, #0f0c29, #302b63, #24243e);
	}
	.bye{
		position: relative;
		left:150px;
		top:20px;
	}
	</style>
</head>
<body>
	<div>
		<form class="bye" onsubmit="alert('Order Placed successfully')" method="POST" action="addbuy.php">
            <label>Product ID</label><input type="text" name="P_ID">
			<label>Customer ID</label><input type="text" name="C_ID">
            <label>Quantity</label><input type="text" name="B_QTY">
					
           <label>DATE</label><input type="date" name="B_DATE">
		   
            
			<input type="submit"  name="add" action="addbuy.php" onsubmit="return alert('Order placed')">
		</form>
	</div>
	




	<a href="consumer.php" target="_self">
	<button class="button" type=button>back</button></a>
	<br>
	<div>
		<table border="1">
			<thead>
				<th>Product ID</th>
				<th>ID</th>
				<th>Quantity</th>
                <th>DATE</th>
				<th>PRICE</th>
				<th>TOTAL PRICE</th>
				
               
                <th></th>
			</thead>
			<tbody>
				<?php
				   
					include('conn.php');
					
					$id= $_SESSION["C_ID"];
					$sql = "SELECT buy.*, product.P_PRICE, (buy.B_QTY*product.P_PRICE) as total_price FROM buy 
					JOIN product ON buy.P_ID = product.P_ID 
					WHERE buy.C_ID='$id' and B_QTY>=0 ";;
                    $result = $conn->query($sql);
					
					while($row=mysqli_fetch_array($result)){
						
						?>
						<tr>
							<td><?php echo $row['P_ID']; ?></td>
							<td><?php echo $row['C_ID']; ?></td>
                            <td><?php echo $row['B_QTY']; ?></td>
                            <td><?php echo $row['B_DATE']; ?></td>
							<td><?php echo $row['P_PRICE']; ?></td>
                            <td><?php echo $row['total_price']; ?></td>
							
							<td>
							    <a href="editbuy.php?id=<?php echo $row['P_ID']; ?>">Update</a>
								<a href="deletebuy.php?id=<?php echo $row['P_ID']; ?>">Delete</a>
							</td>
						</tr>
						<?php
						if(mysqli_num_rows($result)<1){
							echo "<script>alert('Negative Quantity not accepted. Please enter a valid quantity.');</script>";
						}
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>