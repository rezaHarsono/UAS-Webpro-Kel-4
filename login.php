<?php

if (isset($_POST['admin_login'])) {
    // Login as Admin
    $user_type = 'admin';
} elseif (isset($_POST['guest_login'])) {
    // Login as Guest
    $user_type = 'guest';
} else {
    // Redirect to login page if no button is clicked
    header("Location: index.php");
    exit();
}

// Set user type in session (you might want to use a more secure method in a real application)
session_start();
$_SESSION['user_type'] = $user_type;

// Redirect to the appropriate page based on user type
if ($user_type === 'admin') {
    header("Location: admin.php");
} elseif ($user_type === 'guest') {
    header("Location: user.php");
} else {
    // Redirect to login page if something unexpected happens
    header("Location: index.php");
}

?>
