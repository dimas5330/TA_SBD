<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Pembeli</title>
        <style>
            table {
            margin-left: auto;
            margin-right: auto;
            }
            h2 {
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
                padding: 10px 10px 10px 10px;
            }
            td  {
                text-align: center;
                padding: 7px 10px 7px 10px;
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
        <a href="homeadmin.php">Home Admin</a> 
        <br/><br/>

        <div class="Tabel">
        <h2>Tambah Pembeli</h2>
        <form action="addpembeli.php" method="post" name="form1"> 
            <table width="25%" border="0"> 
                <tr>
                    <td>Nama Pembeli</td>
                    <td><input type="text" name="nama_pembeli"></td> 
                </tr> 
                <tr>
                    <td>Tipe Motor</td> 
                    <td><input type="text" name="tipe_motor"></td> 
                </tr>
                <tr>
                    <td>Nomor Polisi</td>
                    <td><input type="text" name="nomor_polisi"></td>
                <tr>
                    <td></td> 
                    <td><input type="submit" name="Submit" value="Add"></td> 
                </tr> 
            </table> 
        </form>
        </div>

        <?php
            // Check If form submitted, insert form data into users table.
            if(isset($_POST['Submit'])) { 
                $nama_pembeli = $_POST['nama_pembeli']; 
                $tipe_motor = $_POST['tipe_motor'];
                $nomor_polisi = $_POST['nomor_polisi'];


                // include database connection file 
                include_once("config.php");

                // Insert user data into table 
                $result = mysqli_query($link, "INSERT INTO pembeli(nama_pembeli, tipe_motor, nomor_polisi) VALUES('$nama_pembeli', '$tipe_motor', '$nomor_polisi')"); 
                // Show message when user added 
                echo "Berhasil menambahkan $nama_pembeli ke Katalog Barang! <br><a href='homeadmin.php'>Kembali ke Home Admin</a>"; 
            }
        ?>
    </body>
</html>