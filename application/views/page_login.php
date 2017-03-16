<?php $this->load->view('page_header'); ?>
<main>

    <!--Main layout-->
    <div class="container">
        <div class="row">

            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="card card-block" id="loginForm">
                <div class="divider-new">
                    <h2 class="h2-responsive">เข้าสู่ระบบ</h2>
                </div>
                <br>
              <form action="" method="post" >
                <div class="row">
                  <div class="col-md-1"></div>
                        <div class="col-md-5">
                          <div class="md-form">
                            <i class="fa fa-envelope prefix"></i>
                            <input type="email" class="form-control" name="email" autocomplete="off" required>
                            <label>อีเมล์ :</label>
                          </div>
                        </div>
                  <div class="col-md-5">
                    <div class="md-form">
                      <i class="fa fa-lock prefix"></i>
                      <input type="password" class="form-control" name="password" autocomplete="off" required>
                      <label>รหัสผ่าน :</label>
                    </div>
                  </div>
                  <div class="col-md-1"></div>
                </div>
                <div class="row">
                  <div class="col-md-2"></div>
                        <div class="col-md-5">
                          <?php echo $image; ?>
                        </div>
                  <div class="col-md-5"></div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-1"></div>
                        <div class="col-md-6">
                          <div class="md-form">
                            <i class="fa fa-lock prefix"></i>
                            <input type="text" class="form-control" name="captcha" autocomplete="off" required value="<?php echo $word; ?>">
                            <label>Captcha :</label>
                          </div>
                        </div>
                  <div class="col-md-5"></div>
                </div>
                <div class="row">
                  <div class="col-md-2"></div>
                        <div class="col-md-3">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                  <div class="col-md-7">
                    <a href="<?php echo base_url(); ?>index.php/users/forget">ลืมรหัสผ่านใช่หรือไม่ ?</a>
                  </div>
                </div>
            </form>
          </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</main>

<?php $this->load->view('page_footer'); ?>
