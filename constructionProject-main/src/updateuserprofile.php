<?php
	session_start();

include("./config/database.php");

if (isset($_POST['update'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nic = $_POST['nic'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $mobile = $_POST['mobile'];
    $ID = $_POST['ID'];
    


    $sql = "UPDATE `user` SET fullname ='$fullname', username = '$username', password = '$password',
        nic = '$nic', address = '$address', email = '$email', dob = '$dob', mobile = '$mobile' WHERE ID = '$ID'";


    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "Record update suceesfully!";
        header('Location: userdashboard.php');

    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $sql = "SELECT * FROM `user` WHERE ID = '$id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $fullname = $row['fullname'];
            $username = $row['username'];
            $password = $row['password'];
            $nic = $row['nic'];
            $address = $row['address'];
            $email = $row['email'];
            $dob = $row['dob'];
            $mobile = $row['mobile'];


            $ID = $row['ID'];
        }
    

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="./style/updateorder.css"/>
</head>
<body>
    <form action="updateuserprofile.php" method="post">
        <fieldset class="fieldset">

           <legend><h2>Update User</h2></legend>
            <div1>
              <table >
                 <tr>
                 <input type="hidden" name="ID" value="<?php echo $ID; ?>">

                    <td><label><b> Name:</b></label></td>
                    <td><input type="text" name="fullname"size="40" placeholder="Full name" value="<?php echo $fullname; ?>"><br></td> 
                 </tr>
                 <tr>
                    <td><label><b>User Name:</b></label></td>
                    <td><input type="text" name="username" value="<?php echo $username; ?>"><br></td>
                 </tr>
                 <tr>
                    <td><label><b>Password:</b></label></td>
                    <td><input type="password"name="password" value="<?php echo $password; ?>"><br></td>
                 </tr>
                 <tr>
                    <td><label><b>NIC:</b></label></td>
                    <td><input type="text"name="nic" value="<?php echo $nic; ?>"><br></td>
                 </tr>
                 <tr>
                    <td><label><b>Address:</b></label></td>
                    <td><input type="text"name="address" value="<?php echo $address; ?>"><br></td>
                 </tr>
                 <tr>
                    <td><label><b>Email:</b> </lable></td>
                    <td><input type="email"name="email"size="40" placeholder="Email"value="<?php echo $email; ?>"><br></td>
                 </tr> 
                 <tr>
                    <td><label><b>Date of Birth:</b></lable></td>
                    <td><input type="date"name="dob" size="40" value="<?php echo $dob; ?>"><br><br></td>
                 </tr>
                 <tr>
                    <td><label><b>Mobile Number:</b></label></td>
                    <td><input type="tel" name="mobile" size="40" value="<?php echo $mobile; ?>"><br></td>
                 </tr>
                 <tr>
                    <td></td>
                    <td><button class="button1" type="submit" value="update" name="update">Update</button><br></td>
                 </tr>
                 
              </table> 
            </div1>
        
        </fieldset>
      </form>    
  
    
</body>
</html>
<?php
    } else {
        header('Location: userdashboard.php');
    }
}
?>