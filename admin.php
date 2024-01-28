<?php
include_once('conn.php');
$query = "SELECT * FROM display_jadwal";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin</title>

    <style>
        table,
        th,
        td {
            margin: auto;
            margin-top: 50px;
            border: 1px solid black;
            border-collapse: collapse;
            padding: 15px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2 class="admin-title">Admin</h2>
        <div class="dropdown">
            <button class="dropbtn">PILIH SECTION</button>
            <div class="dropdown-content">
                <a href="#">SHOW ALL</a>
                <a href="#">GEDUNG GSG</a>
                <a href="#">GEDUNG AA</a>
            </div>
        </div>
    </div>

    <div>
        <table id="jadwal_ruangan" class="jadwal">
            <tbody>
                <tr>
                    <th>RUANGAN</th>
                    <th>NAMA DOSEN</th>
                    <th>KELAS</th>
                    <th>SEMESTER</th>
                    <th>JAM MULAI</th>
                    <th>JAM AKHIR</th>
                    <th>HARI</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['Ruangan']; ?></td>
                        <td><?php echo $row['Nama Dosen']; ?></td>
                        <td><?php echo $row['Kelas']; ?></td>
                        <td><?php echo $row['Smt']; ?></td>
                        <td><?php echo $row['Jam Mulai']; ?></td>
                        <td><?php echo $row['Jam Akhir']; ?></td>
                        <td><?php echo $row['Hari']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>