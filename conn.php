<?php
    $host = 'sql6.freesqldatabase.com';
    $user = 'sql6680060';
    $pass = 'gUmGNVk9pE';
    $name = 'sql6680060';
    $conn = mysqli_connect($host, $user, $pass, $name);

    if (!$conn) {
        die("Koneksi error: ".mysqli_connect_error());
    }
?>