<?php
    $host = 'sql6.freesqldatabase.com';
    $user = 'sql6680060';
    $pass = 'gUmGNVk9pE';
    $db = 'sql6680060';
    $conn = mysqli_connect($host, $user, $pass, $db);

    if (!$conn) {
        die("Koneksi error: ".mysqli_connect_error());
    }
?>