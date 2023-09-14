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
    <link rel="stylesheet" href="output.css">
</head>

<table class='print:w-full print:text-center print:border-2 print:border-collapse'>
    <tr class='print:p-5 print:border-2 print:border-collapse'>
        <th class='print:p-5 print:border-2 print:border-collapse'>Nama</th>
        <th class='print:p-5 print:border-2 print:border-collapse'>Tipe Kamar</th>
        <th class='print:p-5 print:border-2 print:border-collapse'>Jumlah Kamar</th>
        <th class='print:p-5 print:border-2 print:border-collapse'>Check in</th>
        <th class='print:p-5 print:border-2 print:border-collapse'>Check Out</th>
    </tr>
    <?php
    $id = $_SESSION['id'];
    $nama = $_GET['nama'];
    foreach (mysqli_query($conn, "select * from reservasi where id_user = $id and nama = '$nama'") as $res) : ?>
        <tr class='print:p-5 print:border-2 print:border-collapse'>
            <td class='print:p-5 print:border-2 print:border-collapse'><?= $res['nama'] ?></td>
            <td class='print:p-5 print:border-2 print:border-collapse'><?= $res['tipe_kamar'] ?></td>
            <td class='print:p-5 print:border-2 print:border-collapse'><?= $res['jumlah_kamar'] ?></td>
            <td class='print:p-5 print:border-2 print:border-collapse'><?= $res['cek_in'] ?></td>
            <td class='print:p-5 print:border-2 print:border-collapse'><?= $res['cek_out'] ?></td>
        </tr>
    <?php endforeach ?>
</table>