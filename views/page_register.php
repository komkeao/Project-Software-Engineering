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
              <form action="<?= base_url() ?>index.php/user/update_password" method="post" id="formPassword">
                <div class="row">
                  <div class="col-md-1"></div>
                        <div class="col-md-5">
                          <div class="md-form">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" class="form-control" name="password" id="reset_password"  required>
                            <label>รหัสผ่านใหม่ :</label>
                          </div>
                        </div>
                  <div class="col-md-5">
                    <div class="md-form">
                      <i class="fa fa-lock prefix"></i>
                      <input type="password" class="form-control" name="confirm_password" id="confirm_reset_password" required>
                      <input type="hidden" class="form-control" name="email"  value="
                      <?php if(isset($_SESSION['email']))
                        {
                          echo $_SESSION['email'];
                        }else{
                          if(isset($_POST['email'])){
                            echo $_POST['email'];
                          }else{
                            redirect(base_url().'index.php/home/forget_password');
                          }
                        }
                        ?>" required>
                      <label>ยืนยันรหัสผ่านใหม่ :</label>
                    </div>
                  </div>
                  <div class="col-md-1"></div>
                </div>
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-5">
                    <div id="alert_regex"></div>
                  </div>
                  <div class="col-md-5">
                    <div id="alert_password"></div>
                  </div>
              </div>
              <br>
                <div class="row">
                  <div class="col-md-2"></div>
                        <div class="col-md-3">
                          <button type="submit" id="submitPassword"  class="btn btn-primary">Submit</button>
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
<script>
    $(document).ready(function() {
       $("#reset_password").blur(function(event){
         event.preventDefault();
         var password = $('#reset_password').val();
         var confirm_password = $('#confirm_reset_password').val();
         console.log(password + "              " + confirm_password);
         $.ajax({
           url: "<?= base_url() ?>index.php/home/check_regex",
           type : "POST",
           data : {'password': password, 'confirm_password': confirm_password},
           dataType: "json",
           success: function(response) {
             $("#alert_regex").html(response.msg1);
             $("#alert_password").html(response.msg3);
           }
         });
       });
       $("#confirm_reset_password").blur(function(event){
         event.preventDefault();
         var password = $('#reset_password').val();
         var confirm_password = $('#confirm_reset_password').val();
          console.log(password + "              " + confirm_password);
         $.ajax({
           url: "<?= base_url() ?>index.php/home/check_regex",
           type : "POST",
           data : {'password': password, 'confirm_password': confirm_password},
           dataType: "json",
           success: function(response) {
             $("#alert_regex").html(response.msg1);
             $("#alert_password").html(response.msg3);
           }
         });
       });
       $("#submitPassword").click(function(event){
         event.preventDefault();
         var password = $('#reset_password').val();
         var confirm_password = $('#confirm_reset_password').val();
          console.log(password + "              " + confirm_password);
         $.ajax({
           url: "<?= base_url() ?>index.php/home/check_regex",
           type : "POST",
           data : {'password': password, 'confirm_password': confirm_password},
           dataType: "json",
           success: function(response) {
             $("#alert_regex").html(response.msg1);
             $("#alert_password").html(response.msg3);
             if(response.msg2=='TTTTTT'){
                $('#formPassword').submit();
             }
           }
         });
       });


     });
</script>
