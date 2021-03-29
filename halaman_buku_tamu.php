<?php
    require_once "connection.php";
    session_start();
    
    if(!isset($_SESSION['Masuk'])){
        header("location: halaman_login.php");
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

    <style>
        body{
            background: ghostwhite;
        }
        .container{
            padding: 150px;
        }
    
    </style>

    <title>Buku Tamu</title>
    
</head>
<body>
    <div class="container container mt-2">
        <div class="card">
            <div class="card-header">
                <a href="proses_logout.php">
                    <button type="button" class="btn btn-warning btn-sm">LOG OUT</button>
                </a><hr/> 
                <h3>Form Input Buku Tamu</h3>
                
            </div>
            <?php 
            if(isset($_SESSION['Masuk'])) {?>
            <?php 
            if($_SESSION['Masuk'] == 1){ ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert"><?=$_SESSION['login_message'];?>
                </div>
            <?php } ?>
        <?php } ?>
            <div class="card-body">
                <form action="proses_insert_buku_tamu.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Anda" required/>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Masukan email Anda" required/>
                    </div>
                    <div class="form-group">
                        <textarea name="pesan" class="form-control" placeholder="Masukan pesan dan kesan Anda" required>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-danger btn-block" value="kirim"/>
                    </div>
                </form>
                <hr/>

                <?php
                    if(isset($_SESSION['update_status'])){ ?>
                        <div class="<?=$_SESSION['gagal_deh'];?>" role="alert">
                            <?=$_SESSION['update_message'];?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                <?php }
                    unset($_SESSION['update_status']);
                ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <h5 align="center">BUKU TAMU</h5>
                            <tr align="center">
                                <th>No</th><th>No Id</th><th>Nama</th><th>Email</th><th>Pesan</th><th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM tb_tamu ORDER BY id_tamu ASC";
                                $result = $conn->query($sql);
                                    $no= 1;
                                if($result->num_rows> 0){
                                    while($row= $result->fetch_assoc()){?>
                                    <tr>
                                        <td><?=$no;?></td>
                                        <td><?=$row['id_tamu'];?></td>
                                        <td><?=$row['nama_tamu'];?></td>
                                        <td><?=$row['email_tamu'];?></td>
                                        <td><?=$row['pesan_tamu'];?></td>
                                        <td align="center">
                                            <a href="proses_delete_buku_tamu.php?idTamu=<?=$row['id_tamu'];?>" title="Hapus" class="btn btn-success btn-sm" onclick="return confirm('apakah anda yakin?')">
                                                <i class="fa fa-trash"></i>
                                            </a>

                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" data-id="<?=$row['id_tamu'];?>" data-nama="<?=$row['nama_tamu'];?>" data-email="<?=$row['email_tamu'];?>" data-pesan="<?=$row['pesan_tamu'];?>">
                                                <i class="fa fa-edit"></i>
                                            </button>

                                            <!-- <a href="halaman_edit_buku_tamu.php?idTamu=<?=$row['id_tamu'];?>" title="Ubah" class="btn btn-primary btn-sm disabled">
                                                <i class="fa fa-edit"></i>
                                            </a> -->
                                        </td>
                                    </tr>

                                <?php 
                                        $no++;
                            }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Edit Buku Tamu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="proses_update_buku_tamu.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="id" class="form-control edit-id" required readonly >
                        </div>
                        <div class="form-group">
                            <input type="text" name="nama" class="form-control edit-nama" placeholder="Masukan Nama Anda" required />
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control edit-email" placeholder="Masukan email Anda" required />
                        </div>
                        <div class="form-group">
                            <textarea name="pesan" class="form-control edit-pesan" placeholder="Masukan pesan dan kesan Anda" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-warning btn-block" value="update"/>
                        </div>  
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Send message</button> -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    <script>
        
    </script>

    <script>
        $(document).ready(function(){
            $('#myTable').DataTable({
                pageLength:5,
            });

            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var id = button.data('id')
                var nama = button.data('nama')
                var email = button.data('email')
                var pesan = button.data('pesan')

                var modal = $(this)
                // modal.find('.modal-title').text('New message to ' + recipient)
                modal.find('.modal-body .edit-id').val(id)
                modal.find('.modal-body .edit-nama').val(nama)
                modal.find('.modal-body .edit-email').val(email)
                modal.find('.modal-body .edit-pesan').html(pesan)

            })

            $('.alert').delay(500).fadeOut(500)
        });

    </script>
</body>
</html>
