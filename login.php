<?php
// Fungsi untuk memeriksa login admin
function adminLogin($username, $password) {
    // Gantilah ini dengan logika pemeriksaan login admin sesuai kebutuhan
    return $username === 'admin' && $password === 'admin';
}

// Fungsi untuk memeriksa login user
function userLogin($username, $password) {
    // Gantilah ini dengan logika pemeriksaan login user sesuai kebutuhan
    return $username === 'user' && $password === 'user';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

     // Pemeriksaan login admin
     if (adminLogin($username, $password)) {
        header("Location: admin.php");
        exit();
    } 
    // Pemeriksaan login user
    elseif (userLogin($username, $password)) {
        header("Location: user.php");
        exit();
    } 
    // Jika login gagal
    else {
        echo "Login gagal. Silakan coba lagi.";
    }
}
?>
