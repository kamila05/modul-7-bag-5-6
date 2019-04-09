<?php

session_start();

if(!(isset($_SESSION['user'])))
{
    header("location:../siuniv/dosen/search.php";)
}

include '../connect.php';

$query = "SELECT * FROM dosen";
$result = mysqli_query($connect, $query);
$num = mysqli_num_rows($result);

?>

<form action= "search.php" method="get">
    <input type="search" name="cari" placeholder="Masukkan pencarian....">
    <input type="submit" value="Cari">
</form>

<!DOCTYPE html>
<body>
<table border='1'>
<h2>Data dosen</h2>
<tr>
<th>No.</th>
<th>Nama Dosen</th>
<th>Telepon</th>
<th>Aksi</th>
</tr>

</table>

<?php
if($num > 0)
{
    $no = 1;
    while($data = mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td>" . $data['nama_dosen'] . "</td>";
        echo "<td>" . $data['telp'] . "</td>";
        echo "<td><a href='form-update.php?id_dosen=" . $data['id_dosen'] . "'>edit</a> | ";
        echo "<td><a href='delete.php?id_dosen=" . $data['id_dosen'] . "'onclick='return confirm(\"Apakah Anda yakin ingin mengahapus data?\")' >Hapus</a></td>";
        echo "</tr>";
        $no++;
    }
}
else
{
    echo "<td colspan='3'> Tidak ada data </td>";
}
?>