<?php

include("./config/database.php");
session_start();

$error = ""; // Initialize error variable

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $UserName = $_POST['username_email']; // Changed to username_email to accommodate both username and email
  $Password = $_POST['password']; // Changed to password

  // Updated the query to check both email and username
  $query = "SELECT * FROM user WHERE (email='$UserName' OR username='$UserName') AND Password='$Password'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    $user_data = mysqli_fetch_array($result);
    $_SESSION['user_id'] = $user_data['ID'];

    if ($user_data['user_type'] == 'admin') {
      header("location:adminPage.php");
      die;
    } else if ($user_data['user_type'] == 'pmanager') {
      header("location: ./admin/projectDashboard.php");
      die;
    }
    else if ($user_data['user_type'] == 'engineer') {
      header("location: ./admin/taskdashboard.php");
      die;
    }
    else if ($user_data['user_type'] == 'accountant') {
      header("location:userdashboard.php");
      die;
    }
    else if ($user_data['user_type'] == 'subcontracter') {
      header("location:ordermaindashboard.php");
      die;
    }
  } else {
    $error = "Incorrect email or password"; // Set error message
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="./style/login.css" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body class="align">

  <div class="grid align__item">

    <div class="register">

      <svg xmlns="http://www.w3.org/2000/svg" class="site__logo" width="56" height="84" viewBox="77.7 214.9 274.7 412">
        <defs>
          <linearGradient id="a" x1="0%" y1="0%" y2="0%">
            <stop offset="0%" stop-color="#8ceabb" />
            <stop offset="100%" stop-color="#378f7b" />
          </linearGradient>
        </defs>
        <path fill="url(#a)" d="M215 214.9c-83.6 123.5-137.3 200.8-137.3 275.9 0 75.2 61.4 136.1 137.3 136.1s137.3-60.9 137.3-136.1c0-75.1-53.7-152.4-137.3-275.9z" />
      </svg>

      <h2>Login</h2>

      <?php if (!empty($error)) : ?>
        <div class="error"><?php echo $error; ?></div> <!-- Display error message -->
      <?php endif; ?>

      <form  method="post">

        <div class="form__field">
          <input type="text" name="username_email" placeholder="Username or Email"> <!-- Changed input name to username_email -->
        </div>

        <div class="form__field">
          <input type="password" name="password" placeholder="Password"> <!-- Changed input name to password -->
        </div>

        <div class="form__field">
          <input type="submit" >
        </div>

      </form>

      <p>Already have an account? <a href="register.php">Sign up now</a></p>
    </div>

  </div>

</body>

</html>