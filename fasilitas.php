<?php
session_start();
include 'konek.php';

$fasilitas = mysqli_query($conn, "select * from fasilitas_hotel");


if (isset($_POST['tmbhfasil'])) {
    $nama = $_POST['nama'];
    $desk = $_POST['desk'];
    $gambar = $_FILES['img']['name'];
    $temp = $_FILES['img']['tmp_name'];
    $folder = 'img/' . $gambar;

    mysqli_query($conn, "insert into fasilitas_hotel values ('', '$nama', '$desk', '$gambar')");
    move_uploaded_file($temp, $folder);
    header('refresh: 0');
}
?>

<h1>Fasilitas</h1>
<a href="admin.php">balik</a>

<h3>tambah fasilitas:</h3>
<form action="" method="post" enctype="multipart/form-data">
    <label for="">nama fasilitas</label>
    <input type="text" name="nama">
    <label for="">deskripsi</label>
    <input type="text" name="desk">
    <label for="">gambar</label>
    <input type="file" name="img">
    <button name="tmbhfasil">tambah</button>
</form>

<table border="1">
    <tr>
        <th>Nama Fasilitas</th>
        <th>Deskripsi</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($fasilitas as $fas) : ?>
        <tr>
            <td><?= $fas['nama'] ?></td>
            <td><?= $fas['deskripsi'] ?></td>
            <td><img width="250" src="img/<?= $fas['gambar'] ?>" alt=""></td>
            <td>
                <a href="ubah.php?tabel=fasilitas&id=<?= $fas['id_fasilitas'] ?>&nama=<?= $fas['nama'] ?>&desk=<?= $fas['deskripsi'] ?>&gambar=<?= $fas['gambar'] ?>">ubah</a>
                <a href="hapus.php?tbl=fasilitas&id=<?= $fas['id_fasilitas'] ?>">hapus</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>