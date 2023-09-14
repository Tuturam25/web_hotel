<?php
session_start();
include 'konek.php';

if (isset($_POST['psn'])) {
    $idd = $_SESSION['id'];
    $cekin = $_POST['cekin'];
    $cekout = $_POST['cekout'];
    $jumlah = $_POST['jumlah'];
    $nama = $_POST['nama'];
    $tipe = $_GET['tipe'];
    $idkmr = $_GET['id'];
    mysqli_query($conn, "insert into reservasi values ('', '$idd', '$idkmr','$tipe','$nama', '$jumlah', '$cekin', '$cekout', '')");
    // mysqli_query($conn, "update kamar set status = 1 where id_kamar = $idkmr");
    header("location: cetak.php?nama=$nama");
}

?>

<head>
    <link rel="stylesheet" href="output.css">
</head>

<a href="index.php" class=' text-9xl fixed p-0 -translate-y-5'>&larr;</a>
<div class="wrap h-screen flex justify-center ">
    <form action="" method="post" class='m-auto flex justify-center flex-col w-1/3 p-5 shadow-2xl border-4 overflow-hidden rounded-lg capitalize gap-5 '>
        <label for="">No kamar</label>
        <input type="text" disabled value="<?= $_GET['id'] ?>" class='rounded h-10 border-2 p-2'>
        <label for="">Tipe kamar</label>
        <input type="text" disabled value="<?= $_GET['tipe'] ?>" class='rounded h-10 border-2 p-2'>
        <label for="">fasilitas kamar</label>
        <input type="text" disabled value="<?= $_GET['fasil'] ?>" class='rounded h-10 border-2 p-2'>
        <label for="">check-in</label>
        <input type="date" name="cekin" class='rounded h-10 border-2 p-2 border-slate-500'>
        <label for="">check-out</label>
        <input type="date" name="cekout" class='rounded h-10 border-2 p-2 border-slate-500'>
        <label for="">jumlah kamar</label>
        <input type="number" name="jumlah" class='rounded h-10 border-2 p-2 border-slate-500'>
        <label for="">atas nama</label>
        <input type="text" name="nama" class='rounded h-10 border-2 p-2 border-slate-500'>
        <button name="psn" class='capitalize bg-black text-white p-2 rounded hover:bg-slate-700 transition duration-500'>buat pesanan</button>
    </form>
</div>