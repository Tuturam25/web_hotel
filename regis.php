<?php
session_start();
include 'konek.php';

if (isset($_POST['regis'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];

    $registrasi= mysqli_query($conn, "insert into user values ('', '$username', '$pass', '$telp', '$email')");

    if ($registrasi){
        header("location: login.php");
    }
}


?>

<head>
    <link rel="stylesheet" href="output.css">
</head>
<div class="h-screen flex justify-center">
    <form action="" method="post" class='m-auto flex justify-center flex-col w-1/3 p-5 shadow-2xl border-4 overflow-hidden rounded-lg capitalize gap-5 '>
        <label for="">username</label>
        <input type="text" name="username" class='rounded h-10 border-2 p-2'>
        <label for="">password</label>
        <input type="password" name="pass" class='rounded h-10 border-2 p-2'>
        <label for="">email</label>
        <input type="email" name="email" class='rounded h-10 border-2 p-2'>
        <label for="">no telpon</label>
        <input type="number" name="telp" class='rounded h-10 border-2 p-2'>
        <button name="regis" class='capitalize bg-black text-white p-2 rounded'>registrasi</button>
        <a href="login.php" class='p-1 self-end w-fit hover:bg-black hover:text-white transition duration-500 rounded'>sudah login? sini</a>
    </form>
</div>
