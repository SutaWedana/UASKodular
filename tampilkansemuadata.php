<?php
$hostname = "localhost";
$user = "root";
$password = "";
$database = "mahasiswa";
 
 $koneksi = mysqli_connect($hostname, $user, $password, $database);
$sqlSelect = "SELECT * FROM curd";
 $result = mysqli_query($koneksi, $sqlSelect);
 
 if (mysqli_num_rows($result) > 0) {
 header('Content-Type: text/csv; charset=utf-8'); 
 header('Content-Disposition: attachment; filename=data.csv'); 
 $output = fopen("php://output", "w"); 
 fputcsv($output, array('id', 'nama', 'prodi', 'telepon')); 
 while($row = mysqli_fetch_assoc($result)) {
 fputcsv($output, $row); 
 } 
 fclose($output); 
 }else{
 echo "Data mahasiswa kosong";
 }
mysqli_close($koneksi); 
?>