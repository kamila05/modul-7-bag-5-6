<?php

include '../connect.php' ;

$query = "SELECT id_dosen, nama_dosen FROM dosen";
$result = mysqli_query($connect, $query);
?>
<html>
<h3>Tambah Data Matakuliah</h3>
<body>
<form method = "post" action="create.php">
<table>
<tr><td>Kode :</td><td><input type="text" name="kode"></td></tr>
<tr><td>Matakuliah :</td><td><input type="text" name="nama_matkul"></td></tr>
<tr><td>SKS :</td><td><input type="text" name="sks"></td></tr>
<tr><td>Semester :</td><td><input type="text" name="semester"></td></tr>
<tr><td>Dosen Pengajar :</td><td><input type="text" name="nama_matkul"></td></tr>
<select nama="id_dosen" id="nama_dosen">
<option value="NULL">--Pilih Salah Satu--</option>
<?php
while ($data = mysqli_fetch_assoc($result)) {
    ?>
    <option value="<?php echo $data['id_dosen']; ?>">
    <?php echo $data['nama_dosen']; ?>
    </option>
    <?php
}
?>
</select>
<tr><td colspan="2"><button type="submit" value="btnSimpan">SIMPAN</td></tr>
</table>
</form>
</body>
</html>

?>