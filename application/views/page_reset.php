<?php $this->load->view('page_header'); ?>
<main>

    <!--Main layout-->
    <div class="container">
        <div class="row">

            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="card card-block" id="loginForm">
                <div class="divider-new">
                    <h2 class="h2-responsive">รีเซ็ตรหัสผ่าน</h2>
                </div>
                <br>
              <form action="<?= base_url() ?>user/update_password" method="post" >
                <div class="row">
                  <div class="col-md-1"></div>
                        <div class="col-md-5">
                          <div class="md-form">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" class="form-control" name="password"  required>
                            <label>รหัสผ่านใหม่ :</label>
                          </div>
                        </div>
                  <div class="col-md-5">
                    <div class="md-form">
                      <i class="fa fa-lock prefix"></i>
                      <input type="password" class="form-control" name="confirm_password"  required>
                      <input type="hidden" class="form-control" name="email"  value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email']; }else{ echo $_POST['email']; } ?>" required>
                      <label>ยืนยันรหัสผ่านใหม่ :</label>
                    </div>
                  </div>
                  <div class="col-md-1"></div>
                </div>
                <div class="row"><div class="col-md-2"></div><div class="col-md-6">
                  <font color="green" size="3px">
                      <?php if(validation_errors()) { ?>
                      <div class="alert alert-warning">
                      <?php echo validation_errors(); ?>
                      </div>
                      <?php }else{ ?>
                      <p><?= $msgerror ?></p>
                      <?php } ?>
                  </font>
                </div></div><br>
                <div class="row">
                  <div class="col-md-2"></div>
                        <div class="col-md-3">
                          <button type="submit"  class="btn btn-primary">Submit</button>
                        </div>
                  <div class="col-md-7"></div>
                </div>
            </form>
          </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</main>
<?php $this->load->view('page_footer'); ?>
