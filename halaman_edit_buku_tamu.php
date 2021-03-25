<?php
    require_once "connection.php";

    $id=$_GET['idTamu'];
    $sql="SELECT * FROM tb_tamu WHERE id_tamu='$id'";
    $result= $conn->query($sql);
        while($row= $result->fetch_assoc()){
            $nama= $row['nama_tamu'];
            $email= $row['email_tamu'];
            $pesan= $row['pesan_tamu'];
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Buku Tamu</title>

</head>
<body>
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h3>Form  Edit Buku Tamu</h3>
            </div>
            <div class="card-body">
                <form action="proses_update_buku_tamu.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="id" class="form-control" required readonly value="<?=$_GET['idTamu'];?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Anda" required value="<?=$nama;?>"/>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Masukan email Anda" required value="<?=$email;?>"/>
                    </div>
                    <div class="form-group">
                        <textarea name="pesan" class="form-control" placeholder="Masukan pesan dan kesan Anda" required><?=$pesan;?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-warning btn-block" value="update"/>
                    </div>
                    <div>
                        <a href="halaman_buku_tamu.php">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</body>
</html>