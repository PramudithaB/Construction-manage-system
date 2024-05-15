<?php
	session_start();

include("./config/database.php");

if (isset($_POST['update'])) {
    $pname = $_POST['pname'];
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];
    $cname = $_POST['cname'];
    $budget = $_POST['budget'];
    $description = $_POST['description'];
    $ID = $_POST['ID'];


    $sql = "UPDATE `order` SET pname ='$pname', sdate = '$sdate', edate = '$edate',
        cname = '$cname', budget = '$budget', description = '$description' WHERE ID = '$ID'";


    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "Record update suceesfully!";
        header('Location: orderdashboard.php');

    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $sql = "SELECT * FROM `order` WHERE ID = '$id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $pname = $row['pname'];
            $sdate = $row['sdate'];
            $edate = $row['edate'];
            $cname = $row['cname'];
            $budget = $row['budget'];
            $description = $row['description'];

            $ID = $row['ID'];
        }
    

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/updateorder.css"/>
</head>
<body>
    <form action="updateorder.php" method="post">
        <fieldset class="fieldset">

           <legend><h2>Update Order</h2></legend>
            <div1>
              <table >
                 <tr>
                 <input type="hidden" name="ID" value="<?php echo $ID; ?>">

                    <td><label><b>Project Name:</b></label></td>
                    <td><input type="text" name="pname"size="40" placeholder="Project name" value="<?php echo $pname; ?>"><br></td> 
                 </tr>
                 <tr>
                    <td><label><b>Order Start Date:</b></label></td>
                    <td><input type="date" name="sdate" value="<?php echo $sdate; ?>"><br></td>
                 </tr>
                 <tr>
                    <td><label><b>Order End Date:</b></label></td>
                    <td><input type="date"name="edate" value="<?php echo $edate; ?>"><br></td>
                 </tr>
                 <tr>
                    <td><label><b>Client Name:</b> </lable></td>
                    <td><input type="text"name="cname"size="40" placeholder="Name"value="<?php echo $cname; ?>"><br></td>
                 </tr> 
                 <tr>
                    <td><label><b>Budget  Rs.</b></lable></td>
                    <td><input type="text"name="budget" size="40" placeholder="Enter amount" value="<?php echo $budget; ?>"><br><br></td>
                 </tr>
                 <tr>
                    <td><label><b>Order Description:</b></label></td>
                    <td><input type="text"name="description" size="40" placeholder="Description" value="<?php echo $description; ?>"><br></td>
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
        header('Location: orderdashboard.php');
    }
}
?>