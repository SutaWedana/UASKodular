<?php
$hostname = "localhost";
$user = "root";
$password = "";
$database = "mahasiswa";
 
 $koneksi = mysqli_connect($hostname, $user, $password, $database);
$id = $_POST['id'];
$Nama = $_POST['nama'];
$Prodi = $_POST['prodi'];
$Telepon = $_POST['telepon'];
$query="UPDATE curd SET nama='$Nama', prodi='$Prodi', telepon='$Telepon' WHERE 
id='$id'";
$result = mysqli_query($koneksi, $query); 
if($result){
echo"1";
}
else
{
echo"2";
}
mysqli_close($koneksi); 
?>