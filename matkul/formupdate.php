<?php

include '../connect.php';

$kode = $_GET['kode'];

$query = "SELECT kode, nama_matkul, sks, semester, matakuliah.id_dosen, nama_dosen
          FROM matakuliah LEFT JOIN dosen USING(id_dosen)
          WHERE kode = '$kode' " ;

$result = mysqli_query($connect, $query);

$data_dosen = mysqli_fetch_assoc($result);

?>

<html>

<body>
<h1>Ubah Data Matakuliah</h1>
<form action="update.php" method="post">
<table>
<tr>
<td><label for="kode">Kode</label></td> <td> : </td>
<td> <input type="text" name="kode" id="kode" readonly
value="<?php echo $data_dosen['kode']; ?>"></td>
</tr>
<td><label for="nama_matkul">Matakuliah</label></td> <td> : </td>
<td> <input type="text" name="nama_matkul" id="nama_matkul" readonly
value="<?php echo $data_dosen['nama_matkul']; ?>"></td>
</tr>
<td><label for="sks">Kode</label></td> <td> : </td>
<td> <input type="text" name="sks" id="sks" readonly
value="<?php echo $data_dosen['sks']; ?>" ></td>
</tr>
<td><label for="semester">Kode</label></td> <td> : </td>
<td> <input type="text" name="semester" id="semester" readonly
value="<?php echo $data_dosen['semester']; ?>"></td>
</tr>
<tr>
<td><label for="nama_dosen">Dosen Pengajar</label></td><td> : <td>
<select name="id_dosen" id="nama_dosen">
<option value="-">--Pilih Salah Satu--</option>
<?php
$query2 = "SELECT id_dosen, nama_dosen FROM dosen";
$result2 = mysqli_query($connect, $query2);
while ($data = mysqli_fetch_assoc($result2)) { ?>
<option value="<?php echo $data['id_dosen']; ?>">
<?php echo $data['nama_dosen']; ?>
<?php if($data_dosen['id_dosen'] == $data['id_dosen']) {echo "selected";}?>
</option>

<?php}
?> 
</select>
</tr>
<tr>
<td></td> <td></td> <td><input type="submit" value="Simpan"><td>
</tr>
</form>
</table>
</body>