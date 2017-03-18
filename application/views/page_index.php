<?php $this->load->view('page_header'); ?>
<main>

    <!--Main layout-->
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <br>
              <br>
              <div class="card card-block" id="loginForm">
                <div class="divider-new">
                    <h2 class="h2-responsive">News</h2>
                </div>
              </div>
              <br>
              <br>
              <br>
              <br>
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
