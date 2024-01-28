<?php
include_once('conn.php');

if (isset($_GET['error'])) {
  $error_message = $_GET['error'];
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

  <style>
  .error {
    text-align: center;
    color: red;
    margin-bottom: 10px;
  }
  </style>
</head>

<body>
  <div class="container">
    <div class="wrapper">
      <div class="title"><span>Login</span></div>
      <form action="login.php" method="post">
        <?php if (isset($error_message)) { ?>
        <p class="error"><?php echo $error_message; ?></p>
        <?php } ?>
        <div class="row">
          <i class="fas fa-user"></i>
          <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="row">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="row button">
          <input type="submit" value="Login">
        </div>
      </form>
    </div>
  </div>

</body>

</html>