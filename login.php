<?php
session_start();

include 'konek.php';

if (isset($_POST['lgn'])) {
    $username = $_POST['user'];
    $pass = $_POST['pass'];
    $kueriuser = mysqli_query($conn, "select * from user where username = '$username'");
    $kueriadmin = mysqli_query($conn, "select * from admin where username = '$username'");

    if (mysqli_num_rows($kueriuser) === 1) {
        $cek = mysqli_fetch_assoc($kueriuser);
        if ($pass == $cek['password']) {
            $_SESSION['logg'] = true;
            $_SESSION['id'] = $cek['id_user'];
            header("location: index.php");
        }
    } else {
        header("?msg=username atau password salah");
    }

    if (mysqli_num_rows($kueriadmin) === 1) {
        $cek = mysqli_fetch_assoc($kueriadmin);
        if ($cek['password'] == $pass and $cek['role'] == 'admin') {
            $_SESSION['logadm'] = true;
            // $_SESSION['id'] = $cek['id_admin'];
            header("location: admin.php");
        } else if ($cek['password'] == $pass and $cek['role'] == 'resepsionis') {
            $_SESSION['logres'] = true;
            // $_SESSION['id'] = $cek['id_admin'];
            header("location: resepsionis.php");
        }
    }
}


?>


<form action="" method="post">
    <label for="">username</label>
    <input type="text" name="user">
    <label for="">password</label>
    <input type="password" name="pass">
    <button name="lgn">login</button>
</form>
<a href="regis.php">registrasi</a>