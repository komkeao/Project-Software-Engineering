<!doctype html>
<html lang="th">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/logo.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?= $title ?></title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
	<link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/css/material-kit.css" rel="stylesheet"/>
	<link href="<?= base_url() ?>assets/css/demo.css" rel="stylesheet" />
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script src="<?= base_url() ?>assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/js/style.js" type="text/javascript"></script>
</head>

<body class="tutorial-page">
	<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll" role="navigation">
  	<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="logo-container">
            <div class="logo">
              <img src="<?= base_url() ?>assets/img/logo.png">
            </div>
          </div>
				</div>
				<?php if(!isset($_SESSION['email'])){ ?>
					<div class="col-md-6">
					</div>
				<div class="col-md-3">
					<div align="center"><button class="btn btn-info" data-toggle="modal" data-target="#modal-login" id="loginModal">เข้าสู่ระบบ</button></div>
					<div align="center"><a href="#" style="color: #ffffff;">สมัครสมาชิก</a></div>
				</div>
				<?php }else{ ?>
					<div class="col-md-5">
					</div>
					<div class="col-md-4">
						<p>
							<?php if(isset($_SESSION['donationtype'])){
								if($_SESSION['donationtype']=='recipient'){
							 ?>
							<i class="material-icons">shopping_cart</i>&nbsp;&nbsp;
							<?php }} ?>
							สวัสดีคุณ <b><a href="<?php echo base_url(); ?>index.php/user/profile" style="color: #ffffff;"><?= $_SESSION['fname'].' '.$_SESSION['lname'] ?></a>&nbsp;</b>
						<button onclick="location.href='<?php echo base_url(); ?>index.php/user/logout';" class="btn btn-info">ออกจากระบบ</button></p>
					</div>
				<?php } ?>
				</div>
		</div>
	</nav>
<?php if(!isset($_SESSION['email'])){ ?>
	<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="w-100"><i class="fa fa-user"></i> เข้าสู่ระบบ</h3>
      </div>
      <div class="modal-body">
				<form action="<?= base_url() ?>index.php/home/login" method="post" id="loginForm">
				<div class="input-group">
					<span class="input-group-addon">
							<i class="material-icons">email</i>
						</span>
						<input type="text" name="email" id="email" class="form-control" placeholder="อีเมล์" required>
				</div>
				<div class="input-group">
					<span class="input-group-addon">
							<i class="material-icons">lock_outline</i>
						</span>
						<input type="text" name="password" id="password" class="form-control" placeholder="รหัสผ่าน" required>
				</div>
				<div class="text-center">
					<div class="g-recaptcha" id="g-recaptcha-response" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" align="center"></div>
				</div>
				<div class="text-center">
					<font color="red" size="3px"><div id="alert_login"></div></font>
				</div>
				<div class="text-center">
          <button type="submit" id="submitLogin" class="btn btn-info btn-lg">เข้าสู่ระบบ</button>
            <p><a id="forgetLink" href="<?php echo base_url(); ?>index.php/home/forget_password">ลืมรหัสผ่านใช่หรือไม่?</a></p>
        </div>
			</form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<?php } ?>
<div class="wrapper">
	<div class="header header-filter" style="background-color: #e82e2e;">
	</div>
		<div class="main main-raised">
			<nav class="navbar navbar-danger" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?= base_url() ?>">WeShare4U</a>
					</div>
					<?php if(isset($_SESSION['email'])){ ?>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="active"><a href="#">หน้าแรก</a></li>
							<?php if($_SESSION['utype']==1){ ?>
								<li><a href="#">สถิติ</a></li>
								<li><a href="#">คำถามที่พบบ่อย</a></li>
								<li><a href="#">เกี่ยวกับเรา</a></li>
							<?php }else{ ?>
								<li><a href="#">จัดการผู้ใช้</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">จัดการข่าว<b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="#">เพิ่มข่าว</a></li>
										<li><a href="#">เพิ่มประกาศ</a></li>
									</ul>
								</li>

							<?php } ?>
						</ul>
					</div>
					<?php } ?>
				</div>
			</nav>
			<script>
			$("#submitLogin").click(function(event){
			             event.preventDefault();
			             var email = $('#email').val();
			             var password = $('#password').val();
			             var captcha = $('#g-recaptcha-response').val();
									 var regExp = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
				           var match = email.match(regExp);
			             //console.log(captcha);
			             $.ajax({
			               url: "<?= base_url() ?>index.php/home/check_login",
			               type : "POST",
			               data : {'email': email, 'password': password, 'captcha': captcha},
			               success: function(data) {
			                 console.log(data);
											 if(data=='true'){
												 $('#loginForm').submit();
											 }else if(match==null){
												 $("#alert_login").html("รูปแบบอีเมล์ไม่ถูกต้อง");
											 }else if(data=='emailnull'){
												 $("#alert_login").html("อีเมลล์ห้ามว่าง");
											 }else if(data=='emailinv'){
												 $("#alert_login").html("ไม่มีที่อยู่อีเมลล์นี้ในระบบ");
											 }else if(data=='passnull'){
												 $("#alert_login").html("รหัสผ่านห้ามว่าง");
											 }else if(data=='captnull'){
												 $("#alert_login").html("กรุณากด CAPTCHA");
											 }else{
												 $("#alert_login").html("อีเมล์หรือรหัสผ่านไม่ถูกต้อง");
											 }
			               }
			             });
			});
			</script>
			<div class="section">
				<div class="container">
