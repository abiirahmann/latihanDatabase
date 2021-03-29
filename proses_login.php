<?php
    require_once "koneksi.php";
    session_start();

    $username= $_POST['username'];
    $password= $_POST['password'];

    $sql= "SELECT * FROM tb_user WHERE (username='$username' OR email_user='$username') AND password_user='$password'";


    $result= $conn->query($sql);


    if($result->num_rows > 0){
        $_SESSION ['Masuk']= 1;
        $_SESSION ['login_message']= "Berhasil Login, Selamat Datang Admin";
        header("location: halaman_buku_tamu.php");

    }else{
        $_SESSION ['Masuk']= 0;
        $_SESSION ['login_message']= "Gagal Login, Coba kembali";
        header("location: halaman_login.php");
    }


?>