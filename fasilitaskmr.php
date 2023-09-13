<?php

session_start();
include 'konek.php';
$fasilitas = mysqli_query($conn, "select * from fasilitas_hotel");


if (isset($_POST['tmbhfas'])) {
    $tipe = $_POST['tipe'];
    $fasilitas = $_POST['fasilitas'];

    if (mysqli_num_rows(mysqli_query($conn, "select * from fasilitas_kamar where tipe_kamar = '$tipe'")) == 1) {
        echo "<script>
                alert('data fasilitas kamar sudah diisi');
            </script>";
    } else {
        mysqli_query($conn, "insert into fasilitas_kamar value ('', '$tipe', '$fasilitas', '')");
    }
}
?>

<h1>Fasilitas Kamar</h1>
<a href="admin.php">balik</a>

<h3>tambah fasilitas kamar</h3>
<form action="" method="post">
    <label for="">Tipe kamar</label>
    <select name="tipe" id="">
        <option value="tunggal">tunggal</option>
        <option value="double">double</option>
        <option value="king">king</option>
        <option value="queen">queen</option>
    </select>
    <label for="">Fasilitas</label>
    <input type="text" name="fasilitas">
    <button name="tmbhfas">tambah</button>
</form>
<table border="1">
    <tr>
        <th>Tipe kamar</th>
        <th>Fasilitas</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>

    <?php foreach (mysqli_query($conn, "select * from fasilitas_kamar") as $kmr) : ?>
        <tr>
            <td><?= $kmr['tipe_kamar'] ?></td>
            <td><?= $kmr['fasilitas'] ?></td>
            <td><img src="img/<?= $kmr['gambar'] ?>" width="150" alt=""></td>
            <td>
                <a href="ubah.php?tabel=fasilitaskmr&id=<?= $kmr['id_faskamar'] ?>&tipe=<?= $kmr['tipe_kamar'] ?>&fasilitas=<?= $kmr['fasilitas'] ?>&gambar=<?= $kmr['gambar'] ?>">ubah</a>
                <a href="hapus.php?tbl=fasilitaskmr&id=<?= $kmr['id_faskamar'] ?>">hapus</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>