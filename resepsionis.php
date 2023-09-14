<?php
session_start();
include 'konek.php';
$no = 1;


if (isset($_POST['konfir'])) {
    $sts = $_POST['sts'];
    $id = $_POST['id'];

    mysqli_query($conn, "update reservasi set status = $sts where id_reservasi = $id");
}
if (isset($_POST['btl'])) {
    $sts = $_POST['sts'];
    $id = $_POST['id'];

    mysqli_query($conn, "update reservasi set status = $sts where id_reservasi = $id");
}
if (isset($_POST['cekout'])) {
    $sts = $_POST['cek'];
    $id = $_POST['id'];

    mysqli_query($conn, "update reservasi set status = $sts where id_reservasi = $id");
}
if (isset($_POST['cetak'])) {
    echo "<script>
    window.onload = function() {
        window.print();
    }
    </script>";
    header('refresh: 0');
}

?>

<head>
    <style>
        @media print {
            form {
                display: none;
            }

            a {
                display: none;
            }

            h1 {
                text-align: center;
            }

            table {
                width: 100%;
            }

            th,
            td {
                padding: 2.5rem;
            }

            table,
            th,
            tr,
            td {
                border: 1px solid black;
                border-collapse: collapse;
                text-align: center;
            }

            .aksi {
                display: none;
            }
        }
    </style>
    <link rel="stylesheet" href="output.css">
</head>

<body>
    <div class="cont">
        <h1 class='text-center p-5 text-3xl font-bold'>Data Reservasi</h1>
        <form action="" method="post" class='capitalize flex px-5 gap-3 items-center'>
            <input type="date" name="date" class='border-2 p-2 border-black rounded'>
            <input type="text" name="name" class='border-2 p-2 border-black rounded'>
            <button name="cari" class='capitalize p-2 rounded bg-black hover:bg-slate-800 text-white'>cari</button>
            <a href="logout.php" class='ms-auto capitalize p-2 rounded bg-black hover:bg-slate-800 text-white'>logout</a>
        </form>
        <table class='w-full text-center border-2 border-collapse'>
            <tr class='p-5 border-2 border-collapse'>
                <th class='p-5 border-2 border-collapse'>No</th>
                <th class='p-5 border-2 border-collapse'>Nama</th>
                <th class='p-5 border-2 border-collapse'>Check-in</th>
                <th class='p-5 border-2 border-collapse'>Check-out</th>
                <th class='p-5 border-2 border-collapse'>Tipe Kamar</th>
                <th class='p-5 border-2 border-collapse'>Jumlah Kamar</th>
                <th class='p-5 border-2 border-collapse'>Aksi</th>
            </tr>
            <?php if (isset($_POST['cari'])) :
                $cekin = $_POST['date'];
                $nama = $_POST['name'];
                if ($_POST['date'] == '') {
                    $ress = mysqli_query($conn, "select * from reservasi where nama = '$nama'");
                } else if ($_POST['name'] == '') {
                    $ress = mysqli_query($conn, "select * from reservasi where cek_in = '$cekin'");
                } else if ($_POST['date'] != '' and $_POST['name'] != '') {
                    $ress = mysqli_query($conn, "select * from reservasi where cek_in = '$cekin' and nama = '$nama'");
                }
                foreach ($ress as $res) : ?>
                    <tr class='p-5 border-2 border-collapse'>
                        <td class='p-5 border-2 border-collapse'><?= $no++ ?></td>
                        <td class='p-5 border-2 border-collapse'><?= $res['nama'] ?></td>
                        <td class='p-5 border-2 border-collapse'><?= $res['cek_in'] ?></td>
                        <td class='p-5 border-2 border-collapse'><?= $res['cek_out'] ?></td>
                        <td class='p-5 border-2 border-collapse'><?= $res['tipe_kamar'] ?></td>
                        <td class='p-5 border-2 border-collapse'><?= $res['jumlah_kamar'] ?></td>
                        <td class="aksi p-5 border-2 border-collapse">
                            <?php if ($res['status'] == 0) : ?>
                                <form action="" method="post">
                                    <input type="hidden" name="sts" value="1">
                                    <input type="hidden" name="id" value="<?= $res['id_reservasi'] ?>">
                                    <button name="konfir">konfirmasi</button>
                                </form>
                            <?php endif;
                            if ($res['status'] == 1) : ?>
                                <form action="" method="post">
                                    <input type="hidden" name="sts" value="0">
                                    <input type="hidden" name="id" value="<?= $res['id_reservasi'] ?>">
                                    <input type="hidden" name="cek" value="2">
                                    <button name="btl">batal</button>
                                    <button name="cekout">cekout</button>
                                </form>
                            <?php endif;
                            if ($res['status'] == 2) : ?>
                                <form action="" method="post">
                                    <button disabled>sudah cek out</button>
                                </form>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach;
            else : ?>
                <?php foreach (mysqli_query($conn, "select * from reservasi") as $res) : ?>
                    <tr>
                        <td class='p-5 border-2 border-collapse'><?= $no++ ?></td>
                        <td class='p-5 border-2 border-collapse'><?= $res['nama'] ?></td>
                        <td class='p-5 border-2 border-collapse'><?= $res['cek_in'] ?></td>
                        <td class='p-5 border-2 border-collapse'><?= $res['cek_out'] ?></td>
                        <td class='p-5 border-2 border-collapse'><?= $res['tipe_kamar'] ?></td>
                        <td class='p-5 border-2 border-collapse'><?= $res['jumlah_kamar'] ?></td>
                        <td class='p-5 border-2 border-collapse'>
                            <?php if ($res['status'] == 0) : ?>
                                <form action="" method="post">
                                    <input type="hidden" name="sts" value="1">
                                    <input type="hidden" name="id" value="<?= $res['id_reservasi'] ?>">
                                    <button name="konfir" class='capitalize p-2 hover:bg-black hover:text-white transition duration-500 rounded'>konfirmasi</button>
                                </form>
                            <?php endif ?>
                            <?php if ($res['status'] == 1) : ?>
                                <form action="" method="post">
                                    <input type="hidden" name="sts" value="0">
                                    <input type="hidden" name="id" value="<?= $res['id_reservasi'] ?>">
                                    <input type="hidden" name="cek" value="2">
                                    <button name="btl" class='p-2 capitalize hover:bg-red-900 hover:text-white transition duration-500 rounded'>batal</button>
                                    <button name="cekout" class='p-2 capitalize hover:bg-blue-950 hover:text-white transition duration-500 rounded'>cekout</button>
                                </form>
                            <?php endif ?>
                            <?php if ($res['status'] == 2) : ?>
                                <form action="" method="post">
                                    <button disabled class='p-2 bg-blue-950 text-white capitalize rounded'>sudah cek out</button>
                                </form>
                            <?php endif ?>
                        </td>
                    </tr>
            <?php endforeach;
            endif; ?>
        </table>
        <form action="" method="post">
            <button name="cetak" class='p-2 bg-black hover:bg-slate-700 text-white capitalize transition duration-500 rounded'>cetak</button>
        </form>
    </div>
</body>