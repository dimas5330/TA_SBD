<?php 
    // include database connection file 
    include_once("config.php"); 
    
    // Check if form is submitted for data update, then redirect to homepage after update 
    if(isset($_POST['update'])) { 
        $id = $_POST['id'];
        $nama_pembeli = $_POST['nama_pembeli'];
        $tipe_motor = $_POST['tipe_motor'];
        $nomor_polisi =  $_POST['nomor_polisi'];
        
        // update data 
        $result = mysqli_query($link, "UPDATE pembeli SET nama_pembeli='$nama_pembeli', tipe_motor='$tipe_motor', nomor_polisi='$nomor_polisi' WHERE id_pembeli=$id"); 
        
        // Redirect to homepage to display updated data in list 
        header("Location: homeadmin.php"); }
?>

<?php
    // Display selected sparepart based on id 
    // Getting id from url 
    $id = $_GET['id']; 
    
    // Fetch data based on id 
    $result = mysqli_query($link, "SELECT * FROM pembeli WHERE id_pembeli=$id");

    while($pembeli = mysqli_fetch_array($result)) { 
        $id = $pembeli['id_pembeli']; 
        $nama_pembeli = $pembeli['nama_pembeli'];
        $tipe_motor = $pembeli['tipe_motor']; 
        $nomor_polisi = $pembeli['nomor_polisi'];

    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Pembeli</title>
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
    <h2>Edit Pembeli</h2> 
        <form name="update_pembeli" method="post" action="editpembeli.php">
            <table border="0"> 
                <tr>
                    <td>Nama Pembeli</td> 
                    <td><input type="text" name="nama_pembeli" value=<?php echo $nama_pembeli;?>></td>
                </tr> 
                
                <tr>
                    <td>Tipe Motor</td> 
                    <td><input type="text" name="tipe_motor" value=<?php echo $tipe_motor;?>></td>
                </tr> 

                <tr>
                    <td>Nomor Polisi</td> 
                    <td><input type="text" name="nomor_polisi" value=<?php echo $nomor_polisi;?>></td> 
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