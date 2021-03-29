<?php
    require_once "koneksi.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Login</title>
    <style>
        body{
            background-color: ghostwhite;
        }
        .container{
            padding: 150px;
            width: 40%;
        }
        .card-header{
            background: lightpink;
            color: white;
        }
        .btn{
            background-color: lightpink;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Login Buku Tamu</h3>
            </div>
            <div class="card-body">
                <form action="proses_login.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username/Email Anda" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="password" id="password" class="form-control" placeholder="Masukan Password Anda" required/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-block" value="Masuk"/>
                    </div>
                </form>
                <?php
                    if(isset($_SESSION['Masuk'])) {?>
                    <?php
                        if($_SESSION['Masuk'] == 0){ ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"><?=$_SESSION['login_message'];?>
                            </div>
                       <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    <script>
    $(document).ready(function(){
        $('.alert').delay(500).fadeOut(500)
    });
    </script>
    
</body>  
</html>