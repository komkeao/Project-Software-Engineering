<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>WeShare</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url(); ?>css/mdb.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">

    <link rel="icon" href="<?php echo base_url(); ?>images/img_form/logo.png">
</head>

<body>
  <div class="main-holder">
  <!--header start-->
  <div class="header-row" id="header-row">
    <div class="container">
      <div class="row">
        <!--logo start-->
        <div class="col-md-2"> <a class="navbar-brand logo" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>/images/img_form/logo.png" width="80px"></a> </div>
        <!--logo start close-->


        <?php if(isset($_SESSION['email'])){ ?>
        <div class="col-md-5 contact-info">
        </div>
        <div class="col-md-5" align="center">
          <ul class="social-icon pull-right">
            <!--social icon start-->
              <div>สวัสดีคุณ <a href="<?php echo base_url(); ?>user/profile">  <?= $_SESSION['fname']." ".$_SESSION['lname'] ?>   </a>
              <button onclick="location.href='<?php echo base_url(); ?>home/logout';" class="btn btn-primary">ออกจากระบบ</button> </div>

            <?php }else{ ?>
              <div class="col-md-8 contact-info">
              </div>
              <div class="col-md-2" align="center">
                <ul class="social-icon pull-right">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-login">เข้าสู่ระบบ</button>
              <a href="#" >สมัครสมาชิก</a>
            <?php } ?>




          </ul>
          <!--social icon end-->
        </div>
      </div>
    </div>
  </div>

    <header>

        <!--Navbar-->
        <nav class="navbar navbar-toggleable-md navbar-dark">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                  <strong><h3>WeShare4U </h3></strong>
                </a>
                <div class="collapse navbar-collapse" id="navbarNav1">
                    <ul class="navbar-nav mr-auto">
                      <?php if(isset($_SESSION['email'])){ ?>
                        <li class="nav-item active">
                          <a class="nav-link" href="<?= base_url() ?>"> หน้าแรก </a>
                        </li>
                        <li class="nav-item active">
                          <a class="nav-link"> สถิติ </a>
                        </li>
                        <li class="nav-item active">
                          <a class="nav-link"> คำถามที่พบบ่อย </a>
                        </li>
                        <li class="nav-item active">
                          <a class="nav-link"> เกี่ยวกับเรา </a>
                        </li>
                        <?php } ?>
                    </ul>




                </div>
            </div>
        </nav>
	    <!--/.Navbar-->

    </header>
