<?php
include_once('conn.php');

// Proses pembaruan data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Ambil data baru dari formulir
  $newData = [
    'Ruangan' => $_POST['nama_ruangan'],
    'NamaDosen' => $_POST['nama_dosen'],
    'Matkul' => $_POST['nama_matkul'],
    'Kelas' => $_POST['id_kelas'],
    'JamMulai1' => $_POST['jam_mulai1'],
    'JamMulai2' => $_POST['jam_mulai2'],
    'JamAkhir1' => $_POST['jam_akhir1'],
    'JamAkhir2' => $_POST['jam_akhir2'],
    'Hari' => $_POST['nama_hari']
  ];

  // Bangun query UPDATE
  $insertQuery = "INSERT INTO jadwal(id_ruangan, id_dosen, id_matkul, id_kelas, jam_mulai, jam_akhir, hari) VALUES (
  '{$newData['Ruangan']}',
  (SELECT id FROM dosen WHERE nama = '{$newData['NamaDosen']}'),
  (SELECT id FROM mata_kuliah WHERE nama = '{$newData['Matkul']}'),
  '{$newData['Kelas']}',
  CONCAT('{$newData['JamMulai1']}', ' - ', '{$newData['JamMulai2']}'),
  CONCAT('{$newData['JamAkhir1']}', ' - ', '{$newData['JamAkhir2']}'),
  '{$newData['Hari']}')";


  // Eksekusi query UPDATE
  $insertResult = mysqli_query($conn, $insertQuery);

  if ($insertResult) {
    echo "Data berhasil dimasukkan.";
    header("Location: admin.php");
  } else {
    echo "Gagal memasukkan data: " . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta tags and stylesheet links -->
  <title>Insert Data</title>
  <link rel="stylesheet" href="admin.css">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 500px;
      margin: 30px auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    .title {
      text-align: center;
      margin-bottom: 5px;
      color: #333;
    }

    .form {
      justify-content: center;
      margin-left: 50px;
      display: flex;
      flex-direction: column;
    }

    .label {
      
      margin-top: 10px;
      font-weight: bold;
    }

    select,
    input[type="time"],
    button {
      margin-top: 5px;
      padding: 8px;
      width: 100%;
      box-sizing: border-box;
    }

    .button {
      width: 100px;
      cursor: pointer;
      background-color: #398887;
      color: #fff;
      border: none;
      padding: 10px;
      margin-left: 100px;
      margin-top: 20px;
      border-radius: 5px;
    }

    button a {
      text-decoration: none;
      color: #fff;
    }

    button:hover {
      background-color: #073B3A;
    }
  </style>
</head>

<body>
  <div class="navbar">
    <h2 class="admin-title">Admin</h2>
    <button class="logoutbtn">
      <a class="logout" href="logout.php">LogOut</a></button>
  </div>

  <h2 class="title">Insert Data</h2>
  <form class="form" method="post">
    <div class="container">
      <div class="label">
        <label for="ruangan">Ruangan:</label>
        <select name="nama_ruangan" required>
          <?php
          // Fetch options for ruangan from the database
          $ruanganQuery = "SELECT DISTINCT id AS 'NAMA RUANGAN' FROM ruangan ORDER BY id";
          $ruanganResult = mysqli_query($conn, $ruanganQuery);
          while ($ruanganRow = mysqli_fetch_assoc($ruanganResult)) {
            $selected = ($ruanganRow['NAMA RUANGAN'] == $row['NAMA RUANGAN']) ? 'selected' : '';
            echo "<option value='{$ruanganRow['NAMA RUANGAN']}' $selected>{$ruanganRow['NAMA RUANGAN']}</option>";
          }
          ?>
        </select><br>

        <label for="dosen">Dosen:</label>
        <select name="nama_dosen" required>
          <?php
          // Fetch options for dosen from the database
          $dosenQuery = "SELECT DISTINCT nama AS 'NAMA DOSEN', id AS 'ID DOSEN' FROM dosen ORDER BY nama";
          $dosenResult = mysqli_query($conn, $dosenQuery);
          while ($dosenRow = mysqli_fetch_assoc($dosenResult)) {
            $selected = ($dosenRow['NAMA DOSEN'] == $row['NAMA DOSEN']) ? 'selected' : '';
            echo "<option value='{$dosenRow['NAMA DOSEN']}' $selected>{$dosenRow['NAMA DOSEN']}</option>";
          }
          ?>
        </select><br>

        <label for="matkul">Matkul:</label>
        <select name="nama_matkul" required>
          <?php
          // Fetch options for dosen from the database
          $matkulQuery = "SELECT DISTINCT nama AS 'NAMA MATKUL', id AS 'ID MATKUL' FROM mata_kuliah ORDER BY nama";
          $matkulResult = mysqli_query($conn, $matkulQuery);
          while ($matkulRow = mysqli_fetch_assoc($matkulResult)) {
            $selected = ($matkulRow['NAMA MATKUL'] == $row['NAMA MATKUL']) ? 'selected' : '';
            echo "<option value='{$matkulRow['NAMA MATKUL']}' $selected>{$matkulRow['NAMA MATKUL']}</option>";
          }
          ?>
        </select><br>

        <label for="kelas">Kelas:</label>
        <select name="id_kelas" required>
          <?php
          // Fetch options for kelas from the database
          $kelasQuery = "SELECT DISTINCT id AS 'ID KELAS', CONCAT(nama, ' ',semester) AS 'NAMA KELAS' FROM kelas ORDER BY id";
          $kelasResult = mysqli_query($conn, $kelasQuery);
          while ($kelasRow = mysqli_fetch_assoc($kelasResult)) {
            $selected = ($kelasRow['NAMA KELAS'] == $row['NAMA KELAS']) ? 'selected' : '';
            echo "<option value='{$kelasRow['ID KELAS']}' $selected>{$kelasRow['NAMA KELAS']}</option>";
          }
          ?>
        </select><br>

        <label for="jam_mulai">Jam Mulai:</label>
        <input type="time" name="jam_mulai1" value="<?php echo $row['jam_mulai']; ?>" required> -
        <input type="time" name="jam_mulai2" value="<?php echo $row['jam_mulai']; ?>" required><br>


        <label for="jam_akhir">Jam Akhir:</label>
        <input type="time" name="jam_akhir1" value="<?php echo $row['jam_akhir']; ?>" required> -
        <input type="time" name="jam_akhir2" value="<?php echo $row['jam_akhir']; ?>" required><br>

        <label for="hari">Hari:</label>
        <select name="nama_hari">
          <option selected disabled value=""></option>
          <option value="1 - SENIN">Senin</option>
          <option value="2 - SELASA">Selasa</option>
          <option value="3 - RABU">Rabu</option>
          <option value="4 - KAMIS">Kamis</option>
          <option value="5 - JUMAT">Jumat</option>
          <option value="6 - SABTU">Sabtu</option>
        </select>
        <br>

        <button class="button" type="submit">Tambah</button>
        <button class="button" type="button" style="background-color: red;"><a href="admin.php">Batal</a></button>
      </div>
    </div>
  </form>

  <div class="footer">
    <footer>
      <div>
        <div> TEKNIK INFORMATIKA DAN KOMPUTER
        </div>
        <div style="padding: 10px">
          POLITEKNIK NEGERI JAKARTA
        </div>
    </footer>
</body>

</html>