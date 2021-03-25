<?php
    require_once "connection.php";

    $id= $_POST['id'];
    $nama= $_POST['nama'];
    $email= $_POST['email'];
    $pesan= $_POST['pesan'];

    // perintah SQL
    $sql= "UPDATE tb_tamu SET nama_tamu='$nama', email_tamu='$email', pesan_tamu='$pesan' WHERE id_tamu='$id'";

    // eksekusi perintah
    if($conn->query($sql) === true){
        echo "<script>
        alert('Berhasil update');
        location.assign('halaman_buku_tamu.php');
        
        </script>";
    }else{
        echo "<script>
        alert('Gagal update');
        location.assign('halaman_buku_tamu.php');
        
        </script>";
    }


?>
