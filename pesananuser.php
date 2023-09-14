<?php
session_start();
include 'konek.php';

?>

<head>
    <link rel="stylesheet" href="output.css">
</head>

<table class='w-full text-center border-2 border-collapse'>
    <tr class='p-5 border-2 border-collapse'>
        <th class='p-5 border-2 border-collapse'>Nama</th>
        <th class='p-5 border-2 border-collapse'>Tipe Kamar</th>
        <th class='p-5 border-2 border-collapse'>Jumlah Kamar</th>
        <th class='p-5 border-2 border-collapse'>Check in</th>
        <th class='p-5 border-2 border-collapse'>Check Out</th>
        <th class='p-5 border-2 border-collapse'>Aksi</th>
    </tr>
    <?php
    $id = $_SESSION['id'];
    $cek = mysqli_query($conn, "select * from reservasi where id_user = $id");
    if (mysqli_num_rows($cek) == 0) {
        header('location: index.php?msg=pesan dlu bro');
    }
    // else {
    foreach ($cek as $res) : ?>
        <tr class='p-5 border-2 border-collapse'>
            <td class='p-5 border-2 border-collapse'><?= $res['nama'] ?></td>
            <td class='p-5 border-2 border-collapse'><?= $res['tipe_kamar'] ?></td>
            <td class='p-5 border-2 border-collapse'><?= $res['jumlah_kamar'] ?></td>
            <td class='p-5 border-2 border-collapse'><?= $res['cek_in'] ?></td>
            <td class='p-5 border-2 border-collapse'><?= $res['cek_out'] ?></td>
            <td class='p-5 border-2 border-collapse'>
                <a href="cetak.php?nama=<?= $res['nama'] ?>" class='bg-black text-white p-2 rounded hover:bg-slate-800 capitalize'>cetak</a>
            </td>
        </tr>
    <?php endforeach  ?>
    <a href="index.php">kembali</a>
</table>