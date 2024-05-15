<?php 
	
	session_start();

	include "./config/database.php";
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Details</title>
  <link rel="stylesheet" href="./style/orderdashboard.css">
</head>
<body>
  <div class="container">
    <h2>Order Details</h2>
    <table>
      <thead>
        <tr>
          <th>Order ID</th>
          <th>Project name</th>
          <th>Order Start Date</th>
          <th>Order End Date</th>
          <th>Client Name</th>
          <th>Budget Rs.</th>
          <th>Order Description</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php 
			$query = "SELECT * FROM `order`"; // Changed 'order' to 'order_table'
			$result = mysqli_query($conn, $query);
			while($row = mysqli_fetch_assoc($result)){
		?>
				<tr style="background-color:white;font-size:20px;text-align:center">
					<td><?php echo $row['ID'] ?></td>
					<td><?php echo $row['pname'] ?></td>
					<td><?php echo $row['sdate'] ?></td>
					<td><?php echo $row['edate'] ?></td>
					<td><?php echo $row['cname'] ?></td>
                    <td><?php echo $row['budget'] ?></td>
                    <td><?php echo $row['description'] ?></td>
					<td>
          <a href="updateorder.php?ID=<?php echo $row['ID']; ?>"><button class="edit-btn"><i class="fa fa-pencil"></i>Edit</button></a>
          <a href="deleteorder.php?ID=<?php echo $row['ID']; ?>"><button class="edit-btn"><i class="fa fa-pencil"></i>Delete</button></a>

					</td>
				</tr>
				
				<?php
			}
		?>
      </tbody>
    </table>
  </div>
  <script>
   function enableEdit() {
        window.location.href = 'updateorder.php'; // Corrected 'login.php' to 'login.php'
    }

    function enableDelete() {
        window.location.href = 'deleteorder.php'; // Corrected 'login.php' to 'login.php'
    }
    </script>
</body>
</html>
