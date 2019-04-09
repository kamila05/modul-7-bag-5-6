<?php

include '../connect.php';

$kode = $_POST['kode'];
$nama_matkul = $_POST['nama_matkul'];
$sks = $_POST['sks'];
$semester = $_POST['semester']

$query = "INSERT INTO matakuliah
          VALUES ('$kode' , '$nama_matkul' , '$sks' , '$semester' , '$id_dosen)";

$result = mysqli_query($connect, $query);

$num = mysqli_affected_rows($connect);

if($num > 0)
{
    echo "Berhasil tambah data <br>";
}
else
{
    echo "Gagal tambah data <br>";
}
echo "<a href='read.php'>Lihat data</a>";
?>