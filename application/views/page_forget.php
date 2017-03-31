<h2 class="h2-responsive" align="center"><?= $head ?></h2>
<main>

    <!--Main layout-->
    <div class="container">
        <div class="row">

            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="card card-block" id="loginForm">
              <form action="<?= base_url() ?>index.php/home/reset_password" method="post" id="forgetForm">
                <div class="row">
                  <div class="col-md-1"></div>
                        <div class="col-md-6">
                          <div class="input-group">
                            <span class="input-group-addon">
                        			<b>อีเมล์ :</b>
                        		</span>
                            <input type="email" class="form-control" name="email" id="emailforget"  required>
                          </div>
                        </div>
                  <div class="col-md-5"><font color="red" size="3px"><div id="emailpattern"></div></font></div>
                </div>
                <div class="row">
                  <div class="col-md-1"></div>
                        <div class="col-md-6">
                          <div class="input-group">
                            <span class="input-group-addon">
                              <b>คำถาม :</b>
                            </span>
                          <select required="" class="select form-control" name="question" id="question">
                          <option value="" selected="true" disabled="">กรุณาเลือกคำถาม</option>
                              <?php
                              foreach ($qustion_list as $row){
                                echo "<option value='".$row->question_id."'>".$row->question_name."</option>";
                              }
                               ?>
                          </select>
                        </div>
                        </div>
                  <div class="col-md-5"></div>
                </div>
                <div class="row">
                  <div class="col-md-1"></div>
                        <div class="col-md-6">
                          <div class="input-group">
                            <span class="input-group-addon">
                              <b>คำตอบ :</b>
                            </span>
                            <input type="text" class="form-control" name="answer" id="answer"  required>
                          </div>
                        </div>
                  <div class="col-md-5"></div>
                </div>
                <div class="row"><div class="col-md-2"></div><div class="col-md-6"><font size="3px" color="red" id="alert_error"></font></div></div><br>
                <div class="row">
                  <div class="col-md-2"></div>
                        <div class="col-md-3">
                          <button type="submit" id="submitForm" class="btn btn-info">Submit</button>
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

       $("#emailforget").blur(function(event){
          event.preventDefault();
          var email = $('#emailforget').val();
          var regExp = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
          var match = email.match(regExp);
          console.log("QA: " + match);
          if(email==''){
            $("#emailpattern").html('อีเมล์ห้ามว่าง');
          }else if(match==null){
            $("#emailpattern").html('รูปแบบอีเมล์ไม่ถูกต้อง');
          }else{
            $("#emailpattern").html('');
          }

       });
     });

</script>
