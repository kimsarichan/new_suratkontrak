<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url()?>assets/bootstrap/icon/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <style type="text/css">
    @font-face {
      font-family: 'Cabin';
      font-style: normal;
      font-weight: 400;
      src: local('Cabin Regular'), local('Cabin-Regular'), url(<?php echo base_url(); ?>aset/font/satu.woff) format('woff');
    }
    @font-face {
      font-family: 'Cabin';
      font-style: normal;
      font-weight: 700;
      src: local('Cabin Bold'), local('Cabin-Bold'), url(<?php echo base_url(); ?>aset/font/dua.woff) format('woff');
    }
    @font-face {
      font-family: 'Lobster';
      font-style: normal;
      font-weight: 400;
      src: local('Lobster'), url(<?php echo base_url(); ?>aset/font/tiga.woff) format('woff');
    } 
    
    </style>

    <title>Karyawan Kontrak</title>

    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/bootstrap/css/signin.css" rel="stylesheet">
    <script src="<?php echo base_url('assets/bootstrap/js/ie-emulation-modes-warning.js')?>"></script>

  </head>

  <body>

    <div class="container">

      <form class="form-signin" action=<?php echo base_url()."index.php/Welcome/login"; ?> method="post">
        <h2 class="form-signin-heading">Sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>

        <input type="username" id="inputEmail" class="form-control" placeholder="Username" required autofocus name="username">
            <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>


    </div> 

    <script src="<?php echo base_url('assets/bootstrap/js/ie10-viewport-bug-workaround.js')?>"></script>
  </body>
</html>
