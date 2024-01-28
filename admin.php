<?php
include_once('conn.php');
$query = "SELECT * FROM jadwal order by id_ruangan, hari";
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
        table {
            margin: auto;
            margin-top: 50px;
            margin-bottom: 50px;
            border-collapse: collapse;
            width: 80%;
        }

        th,
        td {
            border: 2px solid black;
            padding: 13px;
            text-align: center;
        }

        th {
            background-color: #073B3A;
            color: white;
        }

        .btn-tambah {
            font-family: 'Poppins', sans-serif;
            border: none;
            color: white;
            background-color: #75c4d2;
            padding: 10px;
            margin-left: 48%;
            margin-top: 10px;
        }
        .caption{
            font-family: 'Poppins', sans-serif;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2 class="admin-title">Admin</h2>
        <button class="logoutbtn"><a class="logout" href="logout.php">LogOut</a></button>
        <div class="dropdown">
            <button class="dropbtn">PILIH SECTION</button>
            <div class="dropdown-content">
                <a href="#">SHOW ALL</a>
                <a href="#">GEDUNG GSG</a>
                <a href="#">GEDUNG AA</a>
            </div>
        </div>
    </div>

    <div class="title">
        JADWAL RUANGAN KELAS PROGRAM STUDI TIK
    </div>
    <div class="caption">Klik tambah untuk menambahkan data ruangan kelas:</div>
    <button class="btn-tambah"><a href="tambah.php">Tambah</a></button>
    <div>
        <table id="jadwal_ruangan" class="jadwal">
            <tbody>
                <tr>
                    <th>RUANGAN</th>
                    <th>NAMA DOSEN</th>
                    <th>KELAS</th>
                    <th>JAM MULAI</th>
                    <th>JAM AKHIR</th>
                    <th>HARI</th>
                    <th>ATUR</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td>
                            <?php echo $row['id_ruangan']; ?>
                        </td>
                        <td>
                            <?php echo $row['id_dosen']; ?>
                        </td>
                        <td>
                            <?php echo $row['id_kelas']; ?>
                        </td>
                        <td>
                            <?php echo $row['jam_mulai']; ?>
                        </td>
                        <td>
                            <?php echo $row['jam_akhir']; ?>
                        </td>
                        <td>
                            <?php echo $row['hari']; ?>
                        </td>
                        <td>
                            <a href="update.php?id=<?php echo $row['id']; ?>">Edit</a> ||
                            <a href="hapus.php?id=<?php echo $row['id']; ?>"
                                onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="footer">
        <footer>
            <div>
                <div> TEKNIK INFORMATIKA DAN KOMPUTER
                </div>
                <div style="padding: 10px">
                    POLITEKNIK NEGERI JAKARTA
                </div>
        </footer>
    </div>
</body>

</html>