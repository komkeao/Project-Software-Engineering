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
            <form action="<?= base_url() ?>index.php/home/check_login" method="post" id="login_form">
            <div class="modal-body">
                <div class="md-form">
                    <i class="fa fa-envelope prefix"></i>
                    <input type="email" name="email" class="form-control" required>
                    <label for="form2">อีเมล์</label>
                </div>
                <div class="md-form">
                    <i class="fa fa-lock prefix"></i>
                    <input type="password" name="password" class="form-control" required>
                    <label for="form3">รหัสผ่าน</label>
                </div>
                <div class="md-form" align="center">
                  <?php echo $image; ?>
                </div>
                <div class="md-form">
                  <i class="fa fa-lock prefix"></i>
                  <input type="text" class="form-control" name="captcha" required value="<?php echo $word; ?>">
                  <label>Captcha :</label>
                </div>
                <div class="text-center">
                    <button type="submit" id="btn-login" class="btn btn-primary btn-lg">เข้าสู่ระบบ</button>
                    <p><a href="<?php echo base_url(); ?>home/forget_password">ลืมรหัสผ่านใช่หรือไม่?</a></p>
                </div>
            </div>
          </form>

        </div>
        <!--/.Content-->
    </div>
</div>
