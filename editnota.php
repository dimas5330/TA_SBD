<?php 
    // include database connection file 
    include_once("config.php"); 
    
    // Check if form is submitted for data update, then redirect to homepage after update 
    if(isset($_POST['update'])) { 
        $id = $_POST['id_pesanan'];
        $id_pembeli = $_POST['id_pembeli']; 
        $id_sparepart =$_POST['id_sparepart'];
        $total_harga =$_POST['total_harga']; 
        $tanggal_pesanan =$_POST['tanggal_pesanan']; 
        
        // update data 
        $result = mysqli_query($link, "UPDATE nota_pembayaran SET id_pembeli='$id_pembeli', id_sparepart='$id_sparepart', total_harga='$total_harga', tanggal_pesanan='$tanggal_pesanan' WHERE id_pesanan=$id"); 
        
        // Redirect to homepage to display updated data in list 
        header("Location: homeadmin.php"); }
?>

<?php
    // Display selected minuman based on id 
    // Getting id from url 
    $id = $_GET['id']; 
    
    // Fetch data based on id 
    $result = mysqli_query($link, "SELECT * FROM nota_pembayaran WHERE id_pesanan=$id");

    while($pesanan = mysqli_fetch_array($result)) { 
        $id = $pesanan['id_pesanan']; 
        $id_pembeli = $pesanan['id_pembeli']; 
        $id_sparepart = $pesanan['id_sparepart'];
        $total_harga = $pesanan['total_harga'];
        $tanggal_pesanan = $pesanan['tanggal_pesanan'];


    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Nota Pembayaran</title>
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
    <body><a href="homeadmin.php">Home Admin</a> 
    <br/><br/> 
    
    <div class="Tabel">
    <h2>Edit Nota Pembayaran</h2> 
        <form name="update_nota" method="post" action="editnota.php">
            <table border="0"> 
                <tr>
                    <td>ID Pembeli</td> 
                    <td><input type="text" name="id_pembeli" value=<?php echo $id_pembeli;?>></td>
                </tr> 
                
                <tr>
                    <td>ID Sparepart</td> 
                    <td><input type="text" name="id_sparepart" value=<?php echo $id_sparepart;?>></td> 
                </tr> 

                <tr>
                    <td>Total Harga</td> 
                    <td><input type="text" name="total_harga" value=<?php echo $total_harga;?>></td> 
                </tr>

                <tr>
                    <td>Tanggal Pesanan</td> 
                    <td><input type="text" name="tanggal_pesanan" value=<?php echo $tanggal_pesanan;?>></td> 
                </tr> 

                <tr> 
                    <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td> 
                    <td><input type="submit" name="update" value="Update"></td> 
                </tr> 
            </table> 
        </form>
        </div>
    </body>
</html>