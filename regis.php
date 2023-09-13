<?php
session_start();
include 'konek.php';

if (isset($_POST['regis'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];

    mysqli_query($conn, "insert into user values ('', '$username', '$pass', '$telp', '$email')");
}


?>

<form action="" method="post">
    <label for="">username</label>
    <input type="text" name="username">
    <label for="">password</label>
    <input type="password" name="pass">
    <label for="">email</label>
    <input type="email" name="email">
    <label for="">no telpon</label>
    <input type="number" name="telp">
    <button name="regis">registrasi</button>
</form>

<a href="login.php">sudah login? sini</a>