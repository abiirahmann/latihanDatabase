<?php
    require_once "connection.php";

    $nama= $_POST['nama'];
    $email= $_POST['email'];
    $pesan= $_POST['pesan'];

    // perintah SQL
    $sql= "INSERT INTO tb_tamu VALUES('','$nama','$email','$pesan')";

    // eksekusi perintah
    if($conn->query($sql) === true){
        echo "<script>
        alert('Berhasil tersimpan');
        location.assign('halaman_buku_tamu.php');
        
        </script>";
    }else{
        echo "<script>
        alert('Gaga; tersimpan');
        location.assign('halaman_buku_tamu.php');
        
        </script>";
    }


?>
