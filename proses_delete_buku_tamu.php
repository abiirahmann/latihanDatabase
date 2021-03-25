<?php
    require_once "connection.php";

    $id= $_GET['idTamu'];

    // perintah SQL
    $sql= "DELETE FROM tb_tamu WHERE id_tamu='$id'";

    // eksekusi perintah
    if($conn->query($sql) === true){
        echo "<script>
        alert('Berhasil terhapus');
        location.assign('halaman_buku_tamu.php');
        
        </script>";
    }else{
        echo "<script>
        alert('Gagal terhapus');
        location.assign('halaman_buku_tamu.php');
        
        </script>";
    }


?>
