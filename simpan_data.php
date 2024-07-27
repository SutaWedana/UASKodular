<!DOCTYPE html>
<html>
<head>
  <title>Form Input Data Mahasiswa</title>
</head>
<body>

<form method="POST" action="">
  <label for="id">ID:</label><br>
  <input type="text" id="id" name="id"><br>
  <label for="nama">Nama:</label><br>
  <input type="text" id="nama" name="nama"><br>
  <label for="prodi">Prodi:</label><br>
  <input type="text" id="prodi" name="prodi"><br>
  <label for="telepon">Telepon:</label><br>
  <input type="text" id="telepon" name="telepon"><br>
  <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $hostname = "localhost";
  $user = "root";
  $password = "";
  $database = "mahasiswa";

  $koneksi = mysqli_connect($hostname, $user, $password, $database);

  if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
  }

  $Id = isset($_POST['id']) ? $_POST['id'] : '';
  $Nama = isset($_POST['nama']) ? $_POST['nama'] : '';
  $Prodi = isset($_POST['prodi']) ? $_POST['prodi'] : '';
  $Telepon = isset($_POST['telepon']) ? $_POST['telepon'] : '';

  if (!empty($Id) && !empty($Nama) && !empty($Prodi) && !empty($Telepon)) {
    // Check if the ID already exists
    $checkQuery = "SELECT * FROM curd WHERE id='$Id'";
    $checkResult = mysqli_query($koneksi, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
      echo "Error: ID sudah ada. Harap gunakan ID yang berbeda.";
    } else {
      $query = "INSERT INTO curd (id, nama, prodi, telepon) VALUES ('$Id', '$Nama', '$Prodi', '$Telepon')";
      $result = mysqli_query($koneksi, $query); 

      if ($result) {
        echo "Data berhasil disimpan.";
      } else {
        echo "Data gagal disimpan: " . mysqli_error($koneksi);
      }
    }
  } else {
    echo "Data tidak lengkap.";
  }

  mysqli_close($koneksi); 
}
?>

</body>
</html>
