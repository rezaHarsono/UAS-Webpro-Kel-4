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
  <link rel="stylesheet" href="user.css">
  <title>User</title>

    <style>
    table {
      margin: auto;
      margin-top: 50px;
      margin-bottom: 50px;
      border-collapse: collapse;
      border-radius: 0 0 10px 10px;
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
    </style>
  </head>

<body>
  <div class="navbar">
    <h2 class="user-title">User</h2>
    
  
    <button class="logoutbtn">
      <a class="logout" href="logout.php">LogOut</a>
    </button>
  </div>

  <div class="title">
    JADWAL RUANGAN KELAS PROGRAM STUDI TIK
  </div>

  <div>
    <table id="jadwal_ruangan" class="jadwal">
      <tbody>
        <tr>
          <th>RUANGAN</th>
          <th>NAMA DOSEN</th>
          <th>MATA KULIAH</th>
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
          <td><?php echo $row['Mata Kuliah']; ?></td>
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
  <div class="footer">
    <footer>
      <div>
        <div class="text-xs text-[#E7F6F2]"> TEKNIK INFORMATIKA DAN KOMPUTER
        </div>
        <div style="padding: 10px">
          POLITEKNIK NEGERI JAKARTA
        </div>
    </footer>
  </div>
</body>


</html>

</html>