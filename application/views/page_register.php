<?php $this->load->view('page_header'); ?>
<br>
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
      <div class="card card-block" id="register">
      <div class="divider-new">
          <h2 class="h2-responsive">สมัครสมาชิก</h2>
      </div>

      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">

          <div class="row">
            <div class="col-md-1"></div>
                  <div class="col-md-6">
                    <div class="md-form">
                      <i class="fa fa-envelope prefix"></i>
                      <input type="email" class="form-control" name="email" required>
                      <label>อีเมล์ :</label>
                    </div>
                  </div>
            <div class="col-md-5"></div>
          </div>

          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5">
              <div class="md-form">
                <i class="fa fa-lock prefix"></i>
                <input type="password" class="form-control" name="password" required>
                <label>รหัสผ่าน :</label>
              </div>
            </div>
            <div class="col-md-5">
              <div class="md-form">
                <i class="fa fa-lock prefix"></i>
                <input type="password" class="form-control" name="confirm_password" required>
                <label>ยืนยันรหัสผ่าน :</label>
              </div>
            </div>
            <div class="col-md-1"></div>
          </div>

          <div class="row">
            <div class="col-md-1"></div>
                  <div class="col-md-10">
                    <div class="md-form">
                      <input type="text" class="form-control" name="idno" required>
                      <label>เลขประจำตัวประชาชน :</label>
                    </div>
                  </div>
            <div class="col-md-1"></div>
          </div>

          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2">
              <div class="md-form">
                <select class="mdb-select">
                  <option value="" disabled selected>คำนำหน้า :</option>
                  <option value="1">php query</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="md-form">
                <input type="text" name="fname" class="form-control" required>
                <label>ชื่อ :</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="md-form">
                <input type="text" name="lname" class="form-control" required>
                <label>นามสกุล :</label>
              </div>
            </div>
            <div class="col-md-1"></div>
          </div>

          <div class="row">
            <div class="col-md-1"></div>
                  <div class="col-md-10">
                    <div class="md-form">
                      <textarea type="text" name="address" class="md-textarea" required></textarea>
                      <label for="form7">ที่อยู่ :</label>
                    </div>
                  </div>
            <div class="col-md-1"></div>
          </div>

          <div class="row">
            <div class="col-md-1"></div>
                  <div class="col-md-6">
                    <div class="md-form">
                      <input type="text" name="tel" class="form-control" required>
                      <label>เบอร์โทร :</label>
                    </div>
                  </div>
            <div class="col-md-5"></div>
          </div>

          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5">
              <div class="md-form">
                <select class="mdb-select">
                  <option value="" disabled selected>คำถามของคุณ :</option>
                  <option value="1">php query</option>
                </select>
              </div>
            </div>
            <div class="col-md-5">
              <div class="md-form">
                <input type="text" name="answer" class="form-control" required>
                <label>คำตอบ</label>
              </div>
            </div>
            <div class="col-md-1"></div>
          </div>



        </div>
        <div class="col-md-1"></div>
      </div>

    </div>
  </div>
  <div class="col-lg-1"></div>
</div>
<br>
<script>
  $(document).ready(function() {
    $('.mdb-select').material_select();
  });
</script>
<?php $this->load->view('page_footer'); ?>
