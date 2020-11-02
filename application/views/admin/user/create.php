<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PRAKTIK DOKTER MANDIRI</title>
    <link href="<?php echo base_url();?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="<?=base_url()?>/assets/upload/logo/logo1.png" type="image/png" />

    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            background: url("<?php echo base_url('assets/upload/logo/alatkesehatan.png');?>");
            background-size: cover;
            font-family: sans-serif;
        }

        .loginBox {
            position: absolute;
            top: 55%;
            left: 50%;
            width: 220px;
            height: 700px;
            transform: translate(-50%, -50%);
            width: 530px;
            padding: 80px 40px;
            /* height: 420px; */
            box-sizing: border-box;
            background: #808080;
            border-radius: 0.5em;
        }

        .user {
            width: 60px;
            height: 60px;
            /* border-radius: 50%; */
            overflow: hidden;
            position: absolute;
            top: calc(10px);
            left: calc(57% - 60px);
        }

        h2 {
            margin: 0;
            padding: 0 0 20px;
            color: #000000;
            text-align: center;
        }

        .loginBox p {
            margin: 0;
            padding: 0;
            font-weight: bold;
            color: #000000;
        }

        .loginBox input {
            width: 100%;
            margin-bottom: 20px;
        }

        .loginBox input[type="text"],
        .loginBox input[type="password"] {
            border: none;
            border-bottom: 1px solid #fff;
            background: transparent;
            outline: none;
            height: 35px;
            color: #fff;
            font-size: 16px;
        }

        ::placeholder {
            color: rgba(255, 255, 255, .5);
        }

        .loginBox input[type="submit"] {
            border: none;
            outline: none;
            height: 40px;
            color: #944906;
            font-size: 16px;
            background: #C0C0C0;
            cursor: pointer;
            border-radius: 20px;
        }

        .loginBox input[type="submit"]:hover {
            background: #efed40;
            color: #262626;
        }
        .alertErr {
            opacity: 0.85;
        }
    </style>
</head>
<br><br><br>

<!-- <h2><font size ="6px" color='#000000'>Sistem Informasi Manajemen Rekam Medis </font></h2>
<h2><font size ="5px" color='#000000'>Praktik Dokter Mandiri</font></h2> -->
<br>
<body>

    <div class="loginBox">

        <h2>Sign Up</h2>
       <?php
            if (isset($error)){
                echo '<p class="alert alert-warning">';
                echo $error;
                echo '</p>';

            }
            echo validation_errors('<div class="alert-warning">','</div>');

            //Form open
            echo form_open_multipart(base_url('admin/user/create'), 'class="form-horizontal"');
            ?>

            <div class="form-group">
                <label class="col-md-2 control-label"> Nama</label> 
                <div class="col-md-5">
                    <input type="text" name="nama" class="form-control" placeholder="Nama " value="<?php echo set_value('nama') ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label"> Email</label> 
                <div class="col-md-5">
                    <input type="text" name="email" class="form-control" placeholder="Email " value="<?php echo set_value('email') ?>" required>
                </div>
            </div>
             <div class="form-group">
                <label class="col-md-2 control-label"> No HP</label> 
                <div class="col-md-5">
                    <input type="text" name="no_hp" class="form-control" placeholder="No HP " value="<?php echo set_value('no_hp') ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Gambar </label> 
                <div class="col-md-5">
                    <input type="file" name="gambar" required="required">
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-2 control-label"> Username </label> 
                <div class="col-md-5">
                    <input type="text" name="username" class="form-control" placeholder="Username " value="<?php echo set_value('username') ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label"> Password </label> 
                <div class="col-md-5">
                    <input type="password" name="password" class="form-control" placeholder="Password " value="<?php echo set_value('password') ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label"> Level </label> 
                <div class="col-md-5">
                    <input type="text" name="level" class="form-control" placeholder="Level " value="<?php echo set_value('level') ?>" required>
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-2 control-label"></label> 
                <div class="col-md-5">
                    <button class="btn btn-success btn-xm" name="submit" type="submit">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                    <button class="btn btn-info btn-xm" name="reset" type="reset">
                        <i class="fa fa-times"></i> Reset
                    </button>
                </div>
            </div>
            <?php echo form_close(); ?>

    </div>
<div>


    <script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>