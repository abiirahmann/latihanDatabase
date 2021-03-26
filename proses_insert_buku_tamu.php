<?php
    require_once "connection.php";
    session_start();

    $nama= $_POST['nama'];
    $email= $_POST['email'];
    $pesan= $_POST['pesan'];

    // perintah SQL
    $sql= "INSERT INTO tb_tamu VALUES('','$nama','$email','$pesan')";

    // eksekusi perintah
    if($conn->query($sql) === true){
        $_SESSION['update_status']=1;
        // $_SESSION['gagal_deh']= "alert alert-success alert-dismissible fade show";
        $_SESSION['update_message']= '<strong> Berhasil!! </strong> Data berhasil tersimpan';
        header("location: halaman_buku_tamu.php" );

        // echo "<script>
        // alert('Berhasil tersimpan');
        // location.assign('halaman_buku_tamu.php');
        
        // </script>";
    }else{
        $_SESSION['update_status']=1;
        // $_SESSION['gagal_deh']= "alert alert-danger alert-dismissible fade show";
        $_SESSION['update_message']= '<strong> Gagal!! </strong> Data gagal tersimpan';
        header("location: halaman_buku_tamu.php" );

        // echo "<script>
        // alert('Gagal tersimpan');
        // location.assign('halaman_buku_tamu.php');
        
        // </script>"; 
    }


?>
