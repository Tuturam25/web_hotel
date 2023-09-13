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
</head>

<body>
    <div class="cont">
        <h1>Data Reservasi</h1>
        <a href="logout.php">logout</a>
        <form action="" method="post">
            <input type="date" name="date">
            <input type="text" name="name">
            <button name="cari">cari</button>
        </form>
        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Tipe Kamar</th>
                <th>Jumlah Kamar</th>
                <th>Aksi</th>
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
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $res['nama'] ?></td>
                        <td><?= $res['cek_in'] ?></td>
                        <td><?= $res['cek_out'] ?></td>
                        <td><?= $res['tipe_kamar'] ?></td>
                        <td><?= $res['jumlah_kamar'] ?></td>
                        <td class="aksi">
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
                        <td><?= $no++ ?></td>
                        <td><?= $res['nama'] ?></td>
                        <td><?= $res['cek_in'] ?></td>
                        <td><?= $res['cek_out'] ?></td>
                        <td><?= $res['tipe_kamar'] ?></td>
                        <td><?= $res['jumlah_kamar'] ?></td>
                        <td>
                            <?php if ($res['status'] == 0) : ?>
                                <form action="" method="post">
                                    <input type="hidden" name="sts" value="1">
                                    <input type="hidden" name="id" value="<?= $res['id_reservasi'] ?>">
                                    <button name="konfir">konfirmasi</button>
                                </form>
                            <?php endif ?>
                            <?php if ($res['status'] == 1) : ?>
                                <form action="" method="post">
                                    <input type="hidden" name="sts" value="0">
                                    <input type="hidden" name="id" value="<?= $res['id_reservasi'] ?>">
                                    <input type="hidden" name="cek" value="2">
                                    <button name="btl">batal</button>
                                    <button name="cekout">cekout</button>
                                </form>
                            <?php endif ?>
                            <?php if ($res['status'] == 2) : ?>
                                <form action="" method="post">
                                    <button disabled>sudah cek out</button>
                                </form>
                            <?php endif ?>
                        </td>
                    </tr>
            <?php endforeach;
            endif; ?>
        </table>
        <form action="" method="post">
            <button name="cetak">cetak</button>
        </form>
    </div>
</body>