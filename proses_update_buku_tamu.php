<?php
    require_once "connection.php";
    session_start();

    $id= $_POST['id'];
    $nama= $_POST['nama'];
    $email= $_POST['email'];
    $pesan= $_POST['pesan'];

    // perintah SQL
    $sql= "UPDATE tb_tamu SET nama_tamu='$nama', email_tamu='$email', pesan_tamu='$pesan' WHERE id_tamu='$id'";

    // eksekusi perintah
    if($conn->query($sql) === true){
        $_SESSION['update_status']=1;
        // $_SESSION['gagal_deh']= "alert alert-success alert-dismissible fade show";
        $_SESSION['update_message']= '<strong> Berhasil!! <strong> Data berhasil diupdate';
        header("location: halaman_buku_tamu.php" );
        // echo "<script>
        // alert('Berhasil update');
        // location.assign('halaman_buku_tamu.php');
        
        // </script>";
    }else{
        $_SESSION['update_status']=1;
        // $_SESSION['gagal_deh']= "alert alert-danger alert-dismissible fade show";
        $_SESSION['update_message']= '<strong> Gagal!! <strong> Data gagal diupdate';
        header("location: halaman_buku_tamu.php" );
        // echo "<script>
        // alert('Gagal update');
        // location.assign('halaman_buku_tamu.php');
        
        // </script>";
    }

?>
