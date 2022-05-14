<?php
    include_once("config.php");

//Inisialisasi sesi
    session_start();
    
    //Mengecek apakah user telah login, jika tidak akan kembali ke halaman login
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: loginadmin.php");
        exit;
    }

    $sparepart = mysqli_query($link, "SELECT * FROM sparepart WHERE is_delete=1 ORDER BY id_sparepart");
    $pembeli = mysqli_query($link, "SELECT * FROM pembeli WHERE is_delete=1 ORDER BY id_pembeli");
    $nota_pembayaran = mysqli_query($link, "SELECT nota_pembayaran.id_pesanan, sparepart.nama_sparepart, sparepart.nama_sparepart, pembeli.nama_pembeli, nota_pembayaran.tanggal_pesann FROM sparepart INNER JOIN nota_pembayaran ON sparepart.id_sparepart=nota_pembayaran.id_pesanan INNER JOIN pembeli ON pembeli.id_pembeli=nota_pembayaran.id_pembeli WHERE nota_pembayaran.is_delete = 1");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage Admin</title>
        <style>
            h3 {
                text-align: center;
            }
            table {
                margin-left: auto;
                margin-right: auto;
            }
            th {
                padding: 10px 10px 10px 10px;
                text-align: center;
            }
            tr  {
                text-align: center;
            }
            td {
                padding: 10px 10px 10px 10px;
            }
            .Tabel {
                margin-bottom: 10px;
                margin-left: 20px;
                margin-right: 20px;
                border-style: solid;
            }
        </style>
    </head>
    <body>
        <div style="text-align: center">
            <h1>Recycle Bin</h1>
        </div>
        
        <div class='Tabel'>
        <h3>Katalog Barang</h3>
        <table width='80%' border=1>
            <tr>
                <th>ID Barang</th> <th>Nama Sparepart</th> <th>Merk Sparepart</th> <th>Harga Sparepart</th> <th>Aksi</th>   
            </tr>

            <?php
                while($item = mysqli_fetch_array($sparepart)) {
                    echo "<tr>"; 
                    echo "<td>".$item['id_sparepart']."</td>"; 
                    echo "<td>".$item['nama_sparepart']."</td>"; 
                    echo "<td>".$item['merk_sparepart']."</td>";
                    echo "<td>".$item['harga_sparepart']."</td>"; 
                    echo "<td><a href='restoresparepart.php?id=$item[id_sparepart]'>Restore</a></td></tr>";
                }
            ?>
        </table><br>
        </div>

        <div class='Tabel'>
        <h3>Katalog Pembeli</h3>
        <table width='80%' border=1>
            <tr>
                <th>ID Pembeli</th> <th>Nama Pembeli</th> <th>Tipe Motor</th> <th>Nomor Polisi</th> <th>Aksi</th> 
            </tr>
        
            <?php
                while($item = mysqli_fetch_array($pembeli)) {
                    echo "<tr>"; 
                    echo "<td>".$item['id_pembeli']."</td>"; 
                    echo "<td>".$item['nama_pembeli']."</td>"; 
                    echo "<td>".$item['tipe_motor']."</td>";
                    echo "<td>".$item['nomor_polisi']."</td>"; 
                    echo "<td><a href='restorepembeli.php?id=$item[id_pembeli]'>Restore</a></td></tr>"; 
                }
            ?>
        </table><br>
        </div>
        
        <div class='Tabel'>
        <h3>Katalog Nota</h3>
        <table width='80%' border=1>
            <tr>
                <th>ID Pembayaran</th> <th>Nama Barang</th> <th>Harga</th> <th>Nama</th> <th>Rekening</th> <th>Waktu Beli</th> <th>Aksi</th>
            </tr>
            
            <?php
                while($item = mysqli_fetch_array($pembayaran)) {
                    echo "<tr>";
                    echo "<td>".$item['id_pesanan']."</td>";
                    echo "<td>".$item['nama_sparepart']."</td>";
                    echo "<td>".$item['harga_sparepart']."</td>";
                    echo "<td>".$item['nama_pembeli']."</td>";
                    echo "<td>".$item['tanggal_pesanan']."</td>";
                    echo "<td><a href='restorenota.php?id=$item[id_pesanan]'>Restore</a> 
                    | 
                    <a href='deletepesanan.php?id=$item[id_pesanan]'>Delete</a></td></tr>";
                } 
            ?>
        </table><br>
        </div>
        
        <div style="text-align: center">
            <b><a href="homeadmin.php">Home Admin</a></b>
        </div>
    </body>
</html>