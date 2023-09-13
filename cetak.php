<?php
session_start();

include 'konek.php';
?>

<head>
    <script>
        window.onload = function() {
            window.print();
        };
        window.onafterprint = function() {
            window.location.href = "index.php";
        }
    </script>
</head>

<table>
    <tr>
        <th>Nama</th>
        <th>Tipe Kamar</th>
        <th>Jumlah Kamar</th>
        <th>Check in</th>
        <th>Check Out</th>
    </tr>
    <?php
    $id = $_SESSION['id'];
    $nama = $_GET['nama'];
    foreach (mysqli_query($conn, "select * from reservasi where id_user = $id and nama = '$nama'") as $res) : ?>
        <tr>
            <td><?= $res['nama'] ?></td>
            <td><?= $res['tipe_kamar'] ?></td>
            <td><?= $res['jumlah_kamar'] ?></td>
            <td><?= $res['cek_in'] ?></td>
            <td><?= $res['cek_out'] ?></td>
        </tr>
    <?php endforeach ?>
</table>