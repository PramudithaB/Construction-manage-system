<?php
    session_start();
    include("./config/database.php");

    if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit'])){
        $ProjectName = mysqli_real_escape_string($conn, $_POST['pname']);
        $StartDate = mysqli_real_escape_string($conn, $_POST['sdate']);
        $EndDate = mysqli_real_escape_string($conn, $_POST['edate']);
        $ClientName = mysqli_real_escape_string($conn, $_POST['cname']);
        $Budget = mysqli_real_escape_string($conn, $_POST['budget']);
        $Description = mysqli_real_escape_string($conn, $_POST['description']);

        if(!empty($ProjectName) && !empty($StartDate) && !empty($EndDate) && !empty($ClientName) && !empty($Budget) && !empty($Description)){
            $query ="INSERT INTO `order` (pname, sdate, edate, cname, budget, description) VALUES('$ProjectName', '$StartDate', '$EndDate', '$ClientName', '$Budget', '$Description')";
            
            mysqli_query($conn, $query);
            echo "<script type='text/javascript'>alert('Successfully Created'); window.location.href = 'orderdashboard.php';</script>";
            exit(); // Ensure no further output after redirection
        }
        else{
            echo "<script type='text/javascript'>alert('Please Enter some Valid Details');</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/createorder.css"/>
</head>
<body>
    <form method="post">
        <fieldset class="fieldset">
           <legend><h2>Create Order</h2></legend>
            <div1>
              <table >
                 <tr>
                    <td><label><b>Project Name:</b></label></td>
                    <td><input type="text"name="pname"size="40" placeholder="Project name"autofocus required autocomplete="off"><br></td> 
                 </tr>
                 <tr>
                    <td><label><b>Order Start Date:</b></label></td>
                    <td><input type="date"name="sdate" required autocomplete="off"><br></td>
                 </tr>
                 <tr>
                    <td><label><b>Order End Date:</b></label></td>
                    <td><input type="date"name="edate" required autocomplete="off"><br></td>
                 </tr>
                 <tr>
                    <td><label><b>Client Name:</b> </lable></td>
                    <td><input type="text"name="cname"size="40" placeholder="Name"required autocomplete="off"><br></td>
                 </tr>
                 
        
                 
                 <tr>
                    <td><label><b>Budget  Rs.</b></lable></td>
                    <td><input type="text"name="budget" size="40" placeholder="Enter amount" required autocomplete="off"><br><br></td>
                 </tr>
                 <tr>
                    <td><label><b>Order Description:</b></label></td>
                    <td><input type="text"name="description" size="40" placeholder="Description"required autocomplete="off"><br></td>
                 </tr>
                
                
                 
                 <tr>
                    <td></td>
                    <td><button class="button1" type="submit" name="submit">Submit</button><br></td>
                 </tr>
                 
              </table> 
            </div1>
        
        </fieldset>
      </form>    
  
    
</body>
</html>