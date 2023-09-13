<?php
session_start();
include 'konek.php';

$kamar = mysqli_query($conn, "select * from kamar");
if (isset($_SESSION['logg'])) {
    $idd = $_SESSION['id'];
}

if (isset($_POST['pes'])) {
    echo "<script>
            alert('login dlu');
        </script>
    ";
}
if (isset($_POST['pesann'])) {
    echo "<script>
            alert('tipe kamar tidak boleh sama');
        </script>
    ";
}

?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="output.css">
</head>


<div class="md:text-xl text-xs w-full flex p-5 bg-sky-900 capitalize gap-5 justify-around text-white font-bold tracking-[.25rem]">
    <a href="">hothel</a>
    <a href="login.php">login</a>
    <a href="logout.php">logout</a>
    <a href="pesananuser.php">pesanan</a>
</div>

<h1 class="font-mono text-center p-5 text-[25px]">Fasilitas Hotel</h1>
<div class="fasil flex gap-5 overflow-x-auto">
    <?php foreach (mysqli_query($conn, "select * from fasilitas_hotel") as $fas) : ?>
        <div class="card flex-shrink-0 flex relative mx-5 rounded-md overflow-hidden group">
            <img src="img/<?= $fas['gambar'] ?>" alt="" class=" w-full h-64 group-hover:blur-sm transition duration-[1s]">
            <div class="text-3xl text-white capitalize bg-opacity-50 bg-slate-500 transition duration-[0.5s] translate-y-full group-hover:translate-y-0 absolute m-auto inset-0 flex flex-col text justify-center items-center ">
                <h1 class="font-bold"><?= $fas['nama'] ?></h1>
                <p class="overflow-hidden group-hover:overflow-auto"><?= $fas['deskripsi'] ?></p>
            </div>
        </div>
    <?php endforeach ?>
</div>

<h1 class="text-center text-[25px] font-mono p-5">Kamar</h1>

<div class="cont p-5 flex flex-wrap gap-20 box-border justify-center">
    <?php foreach ($kamar as $kmr) :
        $tipe = $kmr['tipe_kamar'];
        $idkmr = $kmr['id_kamar'];
    ?>
        <div class="shadow-[0_0_15px_#d9d9d9] overflow-hidden rounded-xl p-0 h-fit relative w-80">
            <img src="img/<?= $kmr['gambar'] ?>" class="object-cover w-full h-40">
            <h2 class="text-center p-2">Tipe kamar: <?= $kmr['tipe_kamar'] ?></h2>
            <h4>Fasilitas Kamar:</h4>
            <div class="flex h-20">
                <?php foreach (mysqli_query($conn, "select * from fasilitas_kamar where tipe_kamar = '$tipe'") as $fas) : ?>
                    <img src="img/<?= $fas['gambar'] ?>" alt="" class="w-1/2 object-cover">
                    <p class="capitalize w-full text-center px-3 overflow-y-auto text-sm">
                        <?= $fas['fasilitas'] ?>
                    </p>
            </div>
            <?php if (!isset($_SESSION['logg'])) { ?>
                <form action="" method="post" class="m-0">
                    <button name="pes" class="p-2 bottom-0 w-full capitalize bg-black text-white text-xs duration-200 hover:bg-slate-700">pesan</button>
                </form>
            <?php } else if (isset($_SESSION['logg']) and mysqli_num_rows(mysqli_query($conn, "select * from reservasi where id_user = $idd and tipe_kamar = '$tipe' "))) { ?>
                <form action="" method="post" class="m-0">
                    <button name="pesann">pesan</button>
                </form>
            <?php } else { ?>
                <form action="pesan.php" method="get">
                    <input type="hidden" name="tipe" value="<?= $kmr['tipe_kamar'] ?>">
                    <input type="hidden" name="fasil" value="<?= $fas['fasilitas'] ?>">
                    <input type="hidden" name="id" value="<?= $kmr['id_kamar'] ?>">
                    <button name="pesan" class="m-0">pesan</button>
                </form>
        <?php }
                endforeach; ?>
        </div>
    <?php endforeach ?>
</div>