<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/mdb.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">

    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-3.1.1.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <link rel="icon" href="<?php echo base_url(); ?>images/img_form/logo.png">
</head>

<body>
  <div class="main-holder">
  <div class="header-row" id="header-row">
    <div class="container">
      <div class="row">
        <div class="col-md-2"> <a class="navbar-brand logo" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>/images/img_form/logo.png" width="80px"></a> </div>

        <?php if(isset($_SESSION['email'])){ ?>
        <div class="col-md-5 contact-info">
        </div>
        <div class="col-md-5" align="center">
          <ul>
              <div>สวัสดีคุณ <a href="<?php echo base_url(); ?>index.php/user/profile">  <?= $_SESSION['fname']." ".$_SESSION['lname'] ?>   </a>
              <button onclick="location.href='<?php echo base_url(); ?>index.php/home/logout';" class="btn btn-primary">ออกจากระบบ</button> </div>

            <?php }else{ ?>
              <div class="col-md-8 contact-info">
              </div>
              <div class="col-md-2" align="center">
                <ul class="social-icon pull-right">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-login" id="loginModal">เข้าสู่ระบบ</button>
              <a href="#" >สมัครสมาชิก</a>
            <?php } ?>

          </ul>
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

<?php if(!isset($_SESSION['email'])){ ?>
    <!-- login form -->
    <div class="modal fade modal-ext" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="w-100"><i class="fa fa-user"></i> เข้าสู่ระบบ</h3>
                </div>
                <!--Body-->
                <form action="<?= base_url() ?>index.php/home/check_login_ajax" method="post" id="loginForm">
                <div class="modal-body">
                    <div class="md-form">
                        <i class="fa fa-envelope prefix"></i>
                        <input type="email" name="email" class="form-control" id="email" required>
                        <label for="form2">อีเมล์</label>
                    </div>
                    <div class="md-form">
                        <i class="fa fa-lock prefix"></i>
                        <input type="password" name="password" class="form-control" id="password" required>
                        <label for="form3">รหัสผ่าน</label>
                    </div>
                    <div class="md-form">
                      <div class="g-recaptcha" id="g-recaptcha-response" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" align="center"></div>
                    </div>
                    <div class="md-form">
                      <div id="alert_login" align="center"></div>
                    </div>
                    <br>
                    <div class="text-center">
                        <button type="submit" id="submitLogin" class="btn btn-primary btn-lg">เข้าสู่ระบบ</button>
                        <p><a id="forgetLink" href="<?php echo base_url(); ?>index.php/home/forget_password">ลืมรหัสผ่านใช่หรือไม่?</a></p>
                    </div>
                </div>
              </form>

            </div>
            <!--/.Content-->
        </div>
    </div>

    <script>
        $(document).ready(function() {
           $("#submitLogin").click(function(event){
             event.preventDefault();
             var email = $('#email').val();
             var password = $('#password').val();
             var captcha = $('#g-recaptcha-response').val();
             console.log(captcha);
             $.ajax({
               url: "<?= base_url() ?>index.php/home/check_login_ajax",
               type : "POST",
               data : {'email': email, 'password': password, 'captcha': captcha},
               success: function(data) {
                 console.log(data);
                 if(data=='true'){
               window.location = "<?= base_url() ?>index.php/home/donation";
                 }else if(data=='false'){
                   $("#alert_login").html("<font color='red' size='3px'>อีเมล์ หรือรหัสผ่านไม่ถูกต้อง</font>");
                 }else{
                   $("#alert_login").html("<font color='red' size='3px'>captcha ห้ามว่าง</font>");
                 }
               }
             });
           });
         });
    </script>
    <!-- end login form -->
    <?php } ?>
</div>
</div>
