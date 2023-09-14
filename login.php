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
    } else {
        header("?msg=username atau password salah");
    }
}

if (isset($_GET['msg'])) {
    $dulu = $_GET['msg'];
    echo "<script>
            alert('$dulu');
            window.location.href='login.php';
        </script>";
}
?>


<head>
    <link rel="stylesheet" href="output.css">
</head>
<div class="bungkus h-screen flex justify-center">
    <form action="" method="post" class='m-auto flex justify-center flex-col w-1/3 p-5 shadow-2xl border-4 overflow-hidden rounded-lg capitalize gap-5 '>
        <label for="">username</label>
        <input type="text" name="user" class='rounded h-10 border-2 p-2'>
        <label for="">password</label>
        <input type="password" name="pass" class='rounded h-10 border-2 p-2'>
        <button name="lgn" class='capitalize bg-black text-white p-2 rounded hover:bg-slate-700 transition duration-500'>login</button>
        <div class="flex justify-between">
            <a href="regis.php" class='p-2 hover:bg-black hover:text-white transition duration-500 rounded'>registrasi</a>
            <a href="index.php" class='p-2 hover:bg-black hover:text-white transition duration-500 rounded'>Halaman Utama</a>
        </div>
    </form>
</div>