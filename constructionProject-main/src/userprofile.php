<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: logIn.php'); // Redirect to the login page or any other page
    exit;
}

// Retrieve user data from the database

require_once './config/database.php';

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM user WHERE id='$user_id'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
}

// Handle form submission

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nic = $_POST['nic'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $mobile = $_POST['mobile'];

    // Update the user's details in the database

    $query = "UPDATE user SET fullname='$fullname', username='$username', password='$password', nic='$nic', address='$address', email='$email', dob='$dob', mobile='$mobile' WHERE ID='$user_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Update user data in session
        $_SESSION['user']['fullname'] = $fullname;
        $_SESSION['user']['username'] = $username;
        $_SESSION['user']['password'] = $password;
        $_SESSION['user']['nic'] = $nic;
        $_SESSION['user']['address'] = $address;
        $_SESSION['user']['email'] = $email;
        $_SESSION['user']['dob'] = $dob;
        $_SESSION['user']['mobile'] = $mobile;

        // Redirect to profile page or any other page
        header('Location: userProfile.php');
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="./style/userprofile.css">
</head>
<body>
    <div class="container">
        <h2>User Profile</h2>
        <center><img src="./images/userprofile.jpeg" alt="User Profile"></center>
        <form action="" method="POST">
            <div class="form-group">
                <label for="fullname">Name:</label>
                <input type="text" id="fullname" name="fullname" value="<?php echo $user['fullname']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="username">User Name:</label>
                <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="<?php echo $user['password']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nic">NIC:</label>
                <input type="text" id="nic" name="nic" value="<?php echo $user['nic']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?php echo $user['address']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" value="<?php echo $user['dob']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile Number:</label>
                <input type="tel" id="mobile" name="mobile" value="<?php echo $user['mobile']; ?>" readonly>
            </div>
            <div class="button-group">
                <button type="button" class="edit-button" onclick="enableEdit()">Edit</button>
                <button type="submit" class="save-button" style="display: none;">Save</button>
                <br/>
                <button type="button" class="delete-button" onclick="enableDelete()">Delete Account</button>
                
            </div>
        </form>
        <div id="notification"></div>
    </div>

    <script>
        function enableEdit() {
            const inputs = document.querySelectorAll('input[readonly]');
            inputs.forEach(input => {
                input.removeAttribute('readonly');
            });

            // Hide edit button, show save button
            document.querySelector('.edit-button').style.display = 'none';
            document.querySelector('.save-button').style.display = 'block';
        }
        function enableDelete() {
        window.location.href = 'deleteuser.php'; // Corrected 'login.php' to 'login.php'
    }

      
        function showNotification(message, type) {
            const notification = document.getElementById('notification');
            notification.textContent = message;
            notification.classList.add(type);
            setTimeout(() => {
                notification.textContent = '';
                notification.classList.remove(type);
            }, 3000); // Remove notification after 3 seconds
        }
    </script>
</body>
</html>
