<?php
    include_once("config.php");
    
    //Inisialisasi sesi
    session_start();
    
    //Mengecek apakah user telah login, jika tidak akan kembali ke halaman login
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: loginadmin.php");
        exit;
    }

    $listsparepart = mysqli_query($link, "SELECT * FROM sparepart WHERE is_delete = 0 ORDER BY id_sparepart");
    $listpembeli = mysqli_query($link, "SELECT * FROM pembeli WHERE is_delete=0 ORDER BY id_pembeli");
    $listnota = mysqli_query($link, "SELECT nota_pembayaran.id_pesanan, pembeli.nama_pembeli, sparepart.harga_sparepart, sparepart.nama_sparepart, nota_pembayaran.total_harga, nota_pembayaran.tanggal_pesanan from nota_pembayaran inner join pembeli on nota_pembayaran.id_pembeli=pembeli.id_pembeli inner join sparepart on nota_pembayaran.id_sparepart=sparepart.id_sparepart");
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
            p {
                text-align: center;
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
            <h1>Data Sparepart dan Pembeli</h1>
        </div>
        
        <div class='Tabel'>
        <h3>Katalog Sparepart</h3>
        <table width='80%' border=1>
        <p>
            <a href="addsparepart.php">Tambah Sparepart</a>
        </p> 
            <tr>
                <th>ID Sparepart</th> <th>Nama Sparepart</th> <th>Merk Sparepart</th> <th>Harga Sparepart</th> <th>Aksi</th>   
            </tr>

            <?php
                while($item = mysqli_fetch_array($listsparepart)) {
                    echo "<tr>"; 
                    echo "<td>".$item['id_sparepart']."</td>"; 
                    echo "<td>".$item['nama_sparepart']."</td>";
                    echo "<td>".$item['merk_sparepart']."</td>"; 
                    echo "<td>".$item['harga_sparepart']."</td>"; 
                    echo "<td><a href='editsparepart.php?id=$item[id_sparepart]'>Edit</a> 
                    | 
                    <a href='deletesparepart.php?id=$item[id_sparepart]'>Delete</a></td></tr>";
                }
            ?>
        </table><br>
        </div>

        <div class='Tabel'>
        <h3>Data Pembeli</h3>
        <table width='80%' border=1>
        <p>
            <a href="addpembeli.php">Tambah Data Pembeli</a>
        </p> 
            <tr>
                <th>ID Pembeli</th> <th>Nama Pembali</th> <th>Tipe Motor</th> <th>Nomor Polisi</th> <th>Aksi</th> 
            </tr>
        
            <?php
                while($item = mysqli_fetch_array($listpembeli)) {
                    echo "<tr>"; 
                    echo "<td>".$item['id_pembeli']."</td>"; 
                    echo "<td>".$item['nama_pembeli']."</td>"; 
                    echo "<td>".$item['tipe_motor']."</td>";
                    echo "<td>".$item['nomor_polisi']."</td>"; 
                    echo "<td><a href='editpembeli.php?id=$item[id_pembeli]'>Edit</a> 
                    | 
                    <a href='deletepembeli.php?id=$item[id_pembeli]'>Delete</a></td></tr>"; 
                }
            ?>
        </table><br>
        </div>
        
        <div class='Tabel'>
        <h3>Data Pembayaran</h3>
        <table width='80%' border=1>
        <p>
            <a href="addnota.php">Tambah Data Pembayaran</a>
        </p>
            <tr>
            <th>ID Pembayaran</th> <th>Nama Sparepart</th> <th>Harga Sparepart</th> <th>Nama Pembeli</th> <th>Tanggal Pesanan</th> <th>Aksi</th>
            </tr>
            
            <?php
                while($item = mysqli_fetch_array($listnota)) {
                    echo "<tr>";
                    echo "<td>".$item['id_pesanan']."</td>";
                    echo "<td>".$item['nama_sparepart']."</td>";
                    echo "<td>".$item['harga_sparepart']."</td>";
                    echo "<td>".$item['nama_pembeli']."</td>";
                    echo "<td>".$item['tanggal_pesanan']."</td>";
                    echo "<td><a href='editnota.php?id=$item[id_pesanan]'>Edit</a> 
                    | 
                    <a href='deletenota.php?id=$item[id_pesanan]'>Delete</a></td></tr>";
                } 
            ?>
        </table><br>
        </div>
        
        <div style="text-align: center">
            <b><a href="viewSoftDelete.php">Recycle Bin</a></b>
        </div>

        <p>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out</a>
        </p>
    </body>
</html>