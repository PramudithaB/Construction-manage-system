<?php

session_start();

include "./config/database.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link rel="stylesheet" href="./style/userdashboard.css">
</head>

<body>

    <center>
        <h2>Admin dashboard</h2>
    </center>
    <table>
        <tr>
            <th>Userid</th>
            <th>Name</th>
            <th>Username</th>
            <th>Nic</th>
            <th>Address</th>
            <th>Email</th>
            <th>Date of Birth</th>
            <th>Mobile Number</th>
            <th>Role</th>
            
            
            <th>Action</th>
            
        </tr>
        <?php
        $query = "SELECT * FROM `user`"; // Changed 'order' to 'order_table'
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <td><?php echo $row['ID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['username'] ?></td>
            <td><?php echo $row['nic'] ?></td>
            <td><?php echo $row['address'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['dob'] ?></td>
            <td><?php echo $row['mobile'] ?></td>
            <td><?php echo $row['user_type'] ?></td>
            <td>
                <a href="updateuserprofile.php?ID=<?php echo $row['ID']; ?>"><button class="edit-btn"><i class="fa fa-pencil"></i>Edit</button></a>
                <a href="deleteuserprofile.php?ID=<?php echo $row['ID']; ?>"><button class="edit-btn"><i class="fa fa-pencil"></i>Delete</button></a>

            </td>
            </tr>

        <?php
        }
        ?>
    </table>
    <br />
   

</body>

</html>