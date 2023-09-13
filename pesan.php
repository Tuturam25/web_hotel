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

<form action="" method="post">
    <label for="">No kamar</label>
    <input type="text" disabled value="<?= $_GET['id'] ?>">
    <label for="">Tipe kamar</label>
    <input type="text" disabled value="<?= $_GET['tipe'] ?>">
    <label for="">fasilitas kamar</label>
    <input type="text" disabled value="<?= $_GET['fasil'] ?>">
    <label for="">check-in</label>
    <input type="date" name="cekin">
    <label for="">check-out</label>
    <input type="date" name="cekout">
    <label for="">jumlah kamar</label>
    <input type="number" name="jumlah">
    <label for="">atas nama</label>
    <input type="text" name="nama">
    <button name="psn">buat pesanan</button>
</form>