<?php
include_once('conn.php');

// Fungsi untuk memeriksa login admin
function adminLogin($username, $password)
{
    global $conn;
    // Gantilah ini dengan logika pemeriksaan login admin sesuai kebutuhan
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    return $result->num_rows === 1;
}

// Fungsi untuk memeriksa login user
function userLogin($username, $password)
{
    global $conn;
    // Gantilah ini dengan logika pemeriksaan login user sesuai kebutuhan
    $stmt = $conn->prepare("SELECT * FROM dosen WHERE nama = ? AND id = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    return $result->num_rows === 1;
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
        header("Location: index.php?error=Incorrect Password or Username");
        exit();
    }
}
