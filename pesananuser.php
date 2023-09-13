<?php
session_start();
include 'konek.php';


?>

<table>
    <tr>
        <th>Nama</th>
        <th>Tipe Kamar</th>
        <th>Jumlah Kamar</th>
        <th>Check in</th>
        <th>Check Out</th>
        <th>Aksi</th>
    </tr>
    <?php
    $id = $_SESSION['id'];
    foreach (mysqli_query($conn, "select * from reservasi where id_user = $id") as $res) : ?>
        <tr>
            <td><?= $res['nama'] ?></td>
            <td><?= $res['tipe_kamar'] ?></td>
            <td><?= $res['jumlah_kamar'] ?></td>
            <td><?= $res['cek_in'] ?></td>
            <td><?= $res['cek_out'] ?></td>
            <td>
                <a href="cetak.php?nama=<?= $res['nama'] ?>">cetak</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>