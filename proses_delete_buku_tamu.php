<?php
    require_once "connection.php";
    session_start();
    //start session
    

    $id= $_GET['idTamu'];

    // perintah SQL
    $sql= "DELETE FROM tb_tamu WHERE id_tamu='$id'";

    // eksekusi perintah
    if($conn->query($sql) === true){
        $_SESSION['update_status']=1;
        // $_SESSION['gagal_deh']= "alert alert-success alert-dismissible fade show";
        $_SESSION['update_message']= '<strong> Berhasil!! </strong> Data berhasil dihapus';
        header("location: halaman_buku_tamu.php" );

        // echo "<script>
        // alert('Berhasil terhapus');
        // location.assign('halaman_buku_tamu.php');
        
        // </script>";
    }else{
        $_SESSION['update_status']=1;
        // $_SESSION['gagal_deh']= "alert alert-danger alert-dismissible fade show";
        $_SESSION['update_message']= '<strong> Gagal!! </strong> Data gagal dihapus';
        $conn->error;
        header("location: halaman_buku_tamu.php" );

        // echo "<script>
        // alert('Gagal terhapus');
        // location.assign('halaman_buku_tamu.php');
        
        // </script>";
    }


?>
