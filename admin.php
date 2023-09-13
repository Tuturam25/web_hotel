<?php
session_start();
include 'konek.php';


// if (isset($_POST['tmbhfasil'])) {
//     $nama = $_POST['nama'];
//     $desk = $_POST['desk'];
//     $gambar = $_FILES['img']['name'];
//     $temp = $_FILES['img']['tmp_name'];
//     $folder = 'img/' . $gambar;

//     mysqli_query($conn, "insert into fasilitas_hotel values ('', '$nama', '$desk', '$gambar')");
//     move_uploaded_file($temp, $folder);
//     header('refresh: 0');
// }
// if (isset($_POST['tmbhkmr'])) {
//     $id = $_POST['no'];
//     $tipe = $_POST['tipe'];
//     // $fasilitas = $_POST['fasilitas'];
//     $gambar = $_FILES['img']['name'];
//     $temp = $_FILES['img']['tmp_name'];
//     $folder = 'img/' . $gambar;

//     $cek = mysqli_query($conn, "select * from kamar where id_kamar = $id");
//     if (mysqli_num_rows($cek) == 1) {
//         echo "<script>
//                 alert('data kamar sudah diisi');
//             </script>";
//     } else {
//         mysqli_query($conn, "insert into kamar values ($id, '$tipe', '$gambar', '')");
//         move_uploaded_file($temp, $folder);
//         header('refresh: 0');
//     }
// }
// if (isset($_POST['tmbhfas'])) {
//     $tipe = $_POST['tipe'];
//     $fasilitas = $_POST['fasilitas'];

//     if (mysqli_num_rows(mysqli_query($conn, "select * from fasilitas_kamar where tipe_kamar = '$tipe'")) == 1) {
//         echo "<script>
//                 alert('data fasilitas kamar sudah diisi');
//             </script>";
//     } else {
//         mysqli_query($conn, "insert into fasilitas_kamar value ('', '$tipe', '$fasilitas', '')");
//     }
// }

?>

<h1>
    <a href="kamar.php">jumlah kamar <?= mysqli_num_rows(mysqli_query($conn, "select * from kamar")) ?></a>
</h1>
<h1>
    <a href="fasilitaskmr.php">jumlah fasilitas kamar <?= mysqli_num_rows(mysqli_query($conn, "select * from fasilitas_kamar")) ?></a>
</h1>
<h1>
    <a href="fasilitas.php">jumlah fasilitas hotel <?= mysqli_num_rows(mysqli_query($conn, "select * from fasilitas_hotel")) ?></a>
</h1>
<!-- <h1>Data kamar</h1>
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
<br>


<h1>Fasilitas Kamar</h1>
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
<br> -->


<!-- <h1>Fasilitas</h1>
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
</table> -->