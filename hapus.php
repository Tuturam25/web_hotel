<?php
include 'konek.php';

$id = $_GET['id'];
if ($_GET['tbl'] == 'kamar') {
    mysqli_query($conn, "delete from kamar where id_kamar = $id");
    header('location: admin.php');
} else if ($_GET['tbl'] == 'fasilitas') {
    mysqli_query($conn, "delete from fasilitas_hotel where id_fasilitas = $id");
    header('location: admin.php');
} else if ($_GET['tbl'] == 'fasilitaskmr') {
    mysqli_query($conn, "delete from fasilitas_kamar where id_faskamar = $id");
    header('location: admin.php');
}
