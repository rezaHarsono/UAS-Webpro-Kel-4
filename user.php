<?php
include_once('conn.php');

// Tambahkan filter ruangan jika dipilih
$filter_ruangan = isset($_GET['ruangan']) ? $_GET['ruangan'] : '';
$search_query_ruangan = isset($_GET['searchRuangan']) ? $_GET['searchRuangan'] : '';
$search_query_hari = isset($_GET['searchHari']) ? $_GET['searchHari'] : '';

// Modifikasi query SQL dengan filter ruangan dan pencarian
$query = "SELECT * FROM display_jadwal";
if (!empty($filter_ruangan)) {
  $query .= " WHERE Ruangan LIKE '%$filter_ruangan%'";
  if ($filter_ruangan == 'all') {
    $query = "SELECT * FROM display_jadwal";
  }
}

if (!empty($search_query_ruangan)) {
  $query .= (!empty($filter_ruangan)) ? " AND" : " WHERE";
  $query .= " Ruangan LIKE '%$search_query_ruangan%'";
}


if (!empty($search_query_hari)) {
  $query .= (!empty($search_query_ruangan)) ? " AND" : " WHERE";
  $query .= " Hari LIKE '%$search_query_hari%'";
}

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
    <button class="btn btn-primary logoutbtn"><a class="logout" href="logout.php">LogOut</a></button>
  </div>

  <div class="title">
    JADWAL RUANGAN KELAS PROGRAM STUDI TIK
  </div>

  <div class="filter">
    <form method="GET" action="">
      <label for="ruangan">Filter Ruangan:</label>
      <select name="ruangan" id="ruangan">
        <option value="all">SHOW ALL</option>
        <option value="GSG">Ruangan GSG</option>
        <option value="AA">Ruangan AA</option>
        <!-- Add other options as needed -->
      </select>

      <label for="searchRuangan">Cari Nomor Ruangan:</label>
      <input type="text" name="searchRuangan" id="searchRuangan">

      <label for="searchHari">Cari Hari:</label>
      <input type="text" name="searchHari" id="searchHari">

      <button type="submit">Cari</button>
    </form>
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