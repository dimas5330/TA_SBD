<?php 
    // include database connection file 
    include_once("config.php"); 
    
    // Check if form is submitted for data update, then redirect to homepage after update 
    if(isset($_POST['update'])) { 
        $id = $_POST['id'];
        $nama_sparepart = $_POST['nama_sparepart'];
        $merk_sparepart = $_POST['merk_sparepart']; 
        $harga_sparepart=$_POST['harga_sparepart']; 
        
        // update data 
        $result = mysqli_query($link, "UPDATE sparepart SET nama_sparepart='$nama_sparepart', merk_sparepart='$merk_sparepart', harga_sparepart='$harga_sparepart' WHERE id_sparepart=$id"); 
        
        // Redirect to homepage to display updated data in list 
        header("Location: homeadmin.php"); }
?>

<?php
    // Display selected sparepart based on id 
    // Getting id from url 
    $id = $_GET['id']; 
    
    // Fetch data based on id 
    $result = mysqli_query($link, "SELECT * FROM sparepart WHERE id_sparepart=$id");

    while($sparepart = mysqli_fetch_array($result)) { 
        $id = $sparepart['id_sparepart']; 
        $nama_sparepart = $sparepart['nama_sparepart'];
        $merk_sparepart = $sparepart['merk_sparepart']; 
        $harga_sparepart = $sparepart['harga_sparepart'];

    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Sparepart</title>
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
    <h2>Edit Sparepart</h2> 
        <form name="update_sparepart" method="post" action="editsparepart.php">
            <table border="0"> 
                <tr>
                    <td>Nama Sparepart</td> 
                    <td><input type="text" name="nama_sparepart" value=<?php echo $nama_sparepart;?>></td>
                </tr> 
                
                <tr>
                    <td>Merk Sparepart</td> 
                    <td><input type="text" name="merk_sparepart" value=<?php echo $merk_sparepart;?>></td>
                </tr> 

                <tr>
                    <td>Harga Sparepart</td> 
                    <td><input type="text" name="harga_sparepart" value=<?php echo $harga_sparepart;?>></td> 
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