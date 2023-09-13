<?php

include 'konek.php';





if ($_GET['tabel'] == 'kamar') {
    $id = $_GET['id'];
    $tipe = $_GET['tipe'];
    // $fasilitas = $_GET['fasilitas'];
    $gambar = $_GET['gambar'];
    if (isset($_POST['ubahkmr'])) {
        $id = $_POST['id'];
        $tipe = $_POST['tipe'];
        $gambar = $_FILES['img']['name'];
        $temp = $_FILES['img']['tmp_name'];
        $folder = 'img/' . $gambar;
        if ($gambar == '') {
            mysqli_query($conn, "update kamar set tipe_kamar = '$tipe' where id_kamar = $id");
        } else {
            mysqli_query($conn, "update kamar set tipe_kamar = '$tipe', gambar = '$gambar' where id_kamar = $id");
            move_uploaded_file($temp, $folder);
        }
        header('location: admin.php');
    }
    echo "<form action='' method='post' enctype='multipart/form-data'>
            <label>No Kamar</label>
            <input type='hidden' value='$id' name='id'>
            <input type='text' disabled value=' $id' name='id'>
            <label>Tipe kamar</label>
            <select name='tipe'>
                <option value='$tipe'></option>
                <option value='tunggal'>tunggal</option>
                <option value='double'>double</option>
                <option value='king'>king</option>
                <option value='queen'>queen</option>
            </select>
            <label>Gambar lama</label>
            <img width='100' src='img/$gambar'>
            <label>Gambar baru</label>
            <input type='file' value='$gambar' name='img'>
            <button name='ubahkmr'>ubah</button>
        </form>";
}

if ($_GET['tabel'] == 'fasilitas') {
    $id = $_GET['id'];
    $nama = $_GET['nama'];
    $desk = $_GET['desk'];
    $gambar = $_GET['gambar'];
    if (isset($_POST['ubahhtl'])) {
        $nama = $_POST['nama'];
        $desk = $_POST['desk'];
        $gambar = $_FILES['img']['name'];
        $temp = $_FILES['img']['tmp_name'];
        $folder = 'img/' . $gambar;
        if ($gambar == '') {
            mysqli_query($conn, "update fasilitas_hotel set nama = '$nama', deskripsi = '$desk' where id_fasilitas = $id");
        } else {
            mysqli_query($conn, "update fasilitas_hotel set nama = '$tipe', deskripsi = '$desk', gambar = '$gambar' where id_kamar = $id");
            move_uploaded_file($temp, $folder);
        }
        header('location: admin.php');
    }
    echo "<form action='' method='post' enctype='multipart/form-data'>
            <label>Nama Fasilitas</label>
            <input type='text' value='$nama' name='nama'>
            <label>Deskripsi</label>
            <input type='text' value='$desk' name='desk'>
            <label>Gambar lama</label>
            <img width='100' src='img/$gambar'>
            <label>Gambar baru</label>
            <input type='file' value='$gambar' name='img'>
            <button name='ubahhtl'>ubah</button>
        </form>";
}
if ($_GET['tabel'] == 'fasilitaskmr') {
    $id = $_GET['id'];
    $fasilitas = $_GET['fasilitas'];
    $gambar = $_GET['gambar'];
    $tipe = $_GET['tipe'];
    if (isset($_POST['ubahfas'])) {
        $fasilitas = $_POST['fasilitas'];
        $tipe = $_POST['tipe'];
        mysqli_query($conn, "update fasilitas_kamar set fasilitas = '$fasilitas' where id_faskamar = $id");
        $gambar = $_FILES['img']['name'];
        $temp = $_FILES['img']['tmp_name'];
        $folder = 'img/' . $gambar;
        if ($gambar == '') {
            mysqli_query($conn, "update fasilitas_kamar set fasilitas = '$fasilitas' where id_faskamar = $id");
        } else {
            mysqli_query($conn, "update fasilitas_kamar set fasilitas = '$fasilitas', gambar = '$gambar' where id_faskamar = $id");
            move_uploaded_file($temp, $folder);
        }
        header('location: admin.php');
    }
    echo "<form action='' method='post' enctype='multipart/form-data'>
            <label>Tipe kamar</label>
            <input type='text' disabled value='$tipe' name='tipe'>
            <label>Deskripsi</label>
            <input type='text' value='$fasilitas' name='fasilitas'>
            <label>Gambar lama</label>
            <img width='100' src='img/$gambar'>
            <label>Gambar baru</label>
            <input type='file' value='$gambar' name='img'>
            <button name='ubahfas'>ubah</button>
        </form>";
}
