<?php
session_start();
include 'konek.php';

$kamar = mysqli_query($conn, "select * from kamar");


if (isset($_POST['tmbhkmr'])) {
    $id = $_POST['no'];
    $tipe = $_POST['tipe'];
    // $fasilitas = $_POST['fasilitas'];
    $gambar = $_FILES['img']['name'];
    $temp = $_FILES['img']['tmp_name'];
    $folder = 'img/' . $gambar;

    $cek = mysqli_query($conn, "select * from kamar where id_kamar = $id");
    if (mysqli_num_rows($cek) == 1) {
        echo "<script>
                alert('data kamar sudah diisi');
            </script>";
    } else {
        mysqli_query($conn, "insert into kamar values ($id, '$tipe', '$gambar', '')");
        move_uploaded_file($temp, $folder);
        header('refresh: 0');
    }
}
?>

<h1>Data kamar</h1>
<a href="admin.php">balik</a>

<h3>tambah kamar:</h3>
<form action="" method="post" enctype="multipart/form-data">
    <label for="">Tipe kamar</label>
    <select name="tipe" id="">
        <option value="tunggal">tunggal</option>
        <option value="double">double</option>
        <option value="king">king</option>
        <option value="queen">queen</option>
    </select>
    <label for="">No Kamar</label>
    <input type="text" name="no">
    <label for="">gambar</label>
    <input type="file" name="img">
    <button name="tmbhkmr">tambah</button>
</form>
<table border="1">
    <tr>
        <th>No kamar</th>
        <th>Tipe kamar</th>
        <th>Fasilitas</th>
        <th>Gambar</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($kamar as $kmr) :
        $type = $kmr['tipe_kamar'];
    ?>
        <tr>
            <td><?= $kmr['id_kamar'] ?></td>
            <td><?= $kmr['tipe_kamar'] ?></td>
            <td>
                <?php foreach (mysqli_query($conn, "select fasilitas from fasilitas_kamar where tipe_kamar = '$type'") as $fas) : ?>
                    <?= $fas['fasilitas'] ?>
                <?php endforeach ?>
            </td>
            <td><img src="img/<?= $kmr['gambar'] ?>" width="150" alt=""></td>
            <td><?= $kmr['status'] ?></td>
            <td>
                <a href="ubah.php?tabel=kamar&id=<?= $kmr['id_kamar'] ?>&tipe=<?= $kmr['tipe_kamar'] ?>&gambar=<?= $kmr['gambar'] ?>">ubah</a>
                <a href="hapus.php?tbl=kamar&id=<?= $kmr['id_kamar'] ?>">hapus</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>