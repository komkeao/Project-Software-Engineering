<main>

    <!--Main layout-->
    <div class="container">
        <div class="row">

            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="card card-block" id="loginForm">
                <div class="divider-new">
                    <h2 class="h2-responsive"><?= $head ?></h2>
                </div>
                <br>
              <form action="<?= base_url() ?>index.php/home/reset_password" method="post" id="forgetForm">
                <div class="row">
                  <div class="col-md-1"></div>
                        <div class="col-md-6">
                          <div class="md-form">
                            <i class="fa fa-envelope prefix"></i>
                            <input type="email" class="form-control" name="email" id="emailforget"  required>
                            <label>อีเมล์ :</label>
                          </div>
                        </div>
                  <div class="col-md-5"></div>
                </div>
                <div class="row">
                  <div class="col-md-1"></div>
                        <div class="col-md-6">
                          <label>คำถาม</label>
                          <select required="" class="mdb-select colorful-select dropdown-danger" name="question" id="question">
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
                            <input type="text" class="form-control" name="answer" id="answer"  required>
                            <label>คำตอบ :</label>
                          </div>
                        </div>
                  <div class="col-md-5"></div>
                </div>
                <div class="row"><div class="col-md-2"></div><div class="col-md-6"><font size="3px" color="red" id="alert_error"></font></div></div><br>
                <div class="row">
                  <div class="col-md-2"></div>
                        <div class="col-md-3">
                          <button type="submit" id="submitForm" class="btn btn-primary">Submit</button>
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
    $(document).ready(function() {
       $("#submitForm").click(function(event){
         event.preventDefault();
         var email = $('#emailforget').val();
         var question = $('#question').val();
         var answer = $('#answer').val();
         console.log(email + ' ' + question + '   ' + answer)
         $.ajax({
           url: "<?= base_url() ?>index.php/home/do_forget",
           type : "POST",
           data : {'email': email, 'question': question,'answer': answer},
           success: function(data) {
             console.log(data);
             if(data=='Yes'){
               $('#forgetForm').submit();
             }else if(data=='No'){
               $("#alert_error").html('อีเมล์ คำถาม หรือคำตอบไม่ถูกต้อง');
             }
           }
         });
       });
     });
</script>
