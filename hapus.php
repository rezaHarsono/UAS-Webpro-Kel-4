<?php
include_once('conn.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];

  $query = "DELETE FROM jadwal WHERE id = $id";
  $result = mysqli_query($conn, $query);

  if ($result) {
    echo "Data berhasil dihapus.";
    header("Location: admin.php");
  } else {
    echo "Gagal menghapus data: " . mysqli_error($conn);
  }
} else {
  echo "ID tidak valid.";
}

mysqli_close($conn);
