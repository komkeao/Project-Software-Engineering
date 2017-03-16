<?php $this->load->view('page_header'); ?>
<main>

    <!--Main layout-->
    <div class="container">
        <div class="row">

            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="card card-block" id="loginForm">
                <div class="divider-new">
                    <h2 class="h2-responsive">ลืมรหัสผ่าน</h2>
                </div>
                <br>
              <form action="" method="post" >
                <div class="row">
                  <div class="col-md-1"></div>
                        <div class="col-md-6">
                          <div class="md-form">
                            <i class="fa fa-envelope prefix"></i>
                            <input type="email" class="form-control" name="email" autocomplete="off" required>
                            <label>อีเมล์ :</label>
                          </div>
                        </div>
                  <div class="col-md-5"></div>
                </div>
                <div class="row">
                  <div class="col-md-1"></div>
                        <div class="col-md-6">
                          <label>ประเภท</label>
                          <select required="" class="mdb-select colorful-select dropdown-primary">
                          <option value="" selected="true" disabled="">กรุณาเลือกคำถาม</option>
                              <?php
                              foreach ($qustion_list as $row){
                                echo "<option value='".$row->question_id."'>".$row->question_name."</option>";
                              }
                               ?>
                          </select>
                        </div>
                  <div class="col-md-5"></div>
                </div>
                <div class="row">
                  <div class="col-md-1"></div>
                        <div class="col-md-6">
                          <div class="md-form">
                            <i class="fa fa-lock prefix"></i>
                            <input type="text" class="form-control" name="answer" autocomplete="off" required >
                            <label>คำตอบ :</label>
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
                  </div>
                </div>
            </form>
          </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</main>
<script>
    // Material Select Initialization
    $(document).ready(function() {
       $('.mdb-select').material_select();
     });

</script>
<?php $this->load->view('page_footer'); ?>
