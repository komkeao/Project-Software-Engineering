
<?php $this->load->view('page_header'); ?>

    <main>

        <!--Main layout-->
        <div class="container">
            <div class="row">

                <!--Sidebar-->
                <div class="col-lg-3">

                    <div class="widget-wrapper">
                        <div class="list-group">
                            <a href="#" class="list-group-item active">1</a>
                            <a href="#" class="list-group-item">2</a>
                            <a href="#" class="list-group-item">3</a>
                        </div>
                    </div>

                    <div class="widget-wrapper">
                        <div class="card">
                            <div class="card-block">
                                <p>information</p>
                                <p>information</p>
                                <p>information</p>
                                <p>information</p>
                                <p>information</p>
                                <p>information</p>

                            </div>
                        </div>
                    </div>

                </div>
                <!--/.Sidebar-->

                <!--Main column-->
                <div class="col-lg-9">

                    <!--First row-->
                    <div class="row">
                        <div class="col-lg-12">

                          <nav class="navbar navbar-dark stylish-color">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">หน้าแรก</a></li>
                              <li class="breadcrumb-item active">บริจาค</li>
                            </ol>
                          </nav>
                          <br>
                          <div class="card card-block" id="detailupload">
                          <div class="divider-new">
                              <h2 class="h2-responsive">รายละเอียดของที่บริจาค</h2>
                          </div>

                          <!-- alert -->
                          <?php if (isset($success_msg)) { echo $success_msg; } ?>
                          <!-- end alert -->

                         <form action="<?php echo base_url(); ?>index.php/donate/donor_create" method="post" enctype="multipart/form-data">
                          <div class="row">
                            <div class="col-md-1"></div>
                                  <div class="col-md-6">
                                      <div class="md-form">
                                          <input type="text" class="form-control" name="dname" onblur="InvalidTbName(this);" required>
                                          <label>ชื่อของที่บริจาค :</label>
                                      </div>
                                     <font color="red" size="2"> <p id="alertdname" ></p></font> 
                                  </div>
                            <div class="col-md-5"></div>
                            
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-1"></div>
                                  <div class="col-md-10">
                                      <div class="md-form">
                                          <textarea type="text" class="md-textarea" name="ddetail"  oninvalid="InvalidTbDetail(this);" required></textarea>
                                          <label>รายละเอียด :</label>
                                      </div>
                                      <font color="red" size="2"> <p id="alertddetail" ></p></font> 
                                  </div> 
                            <div class="col-md-1"></div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                              <div class="md-form">
                              <input type="text" class="form-control" name="dsize" oninput="validateNumberSize(this);" maxlength="10"  required>
                              <label>ขนาด : (หน่วยเป็นเซนติเมตร)</label>
                            </div>
                            <font color="red" size="2"> <p id="alertdsize" ></p></font> 
                            </div>
                            <div class="col-md-5">
                                <div class="md-form">
                                  <input type="text" class="form-control" name="dweight" oninput="validateNumberWeight(this);" maxlength="10"  required >
                                  <label>น้ำหนัก : (หน่วยเป็นกรัม)</label>
                                </div>
                                <font color="red" size="2"> <p id="alertdweight" ></p></font> 
                            </div>
                            <div class="col-md-1"></div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-1"></div>
                                  <div class="col-md-6">
                                      <div class="md-form">
                                          <input type="number" class="form-control" name="damount" min="0" max="100" required>
                                          <label>จำนวน :</label>
                                      </div>
                                      <font color="red" size="2"> <p id="alertdamount" ></p></font> 
                                  </div>
                            <div class="col-md-5"></div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-1"></div>
                                  <div class="col-md-6">
                                    <label>ประเภท</label>
                                    <select required="" class="mdb-select colorful-select dropdown-primary" name="donate_type" >
                                    <option value="" selected="true" disabled="">กรุณาเลือก</option>
                                        <?php
                                        foreach ($donate_list as $row){
                                          echo "<option value='".$row->type_id."'>".$row->type_name_th." : ".$row->type_name_en."</option>";
                                        }
                                         ?>
                                    </select>
                                    <font color="red" size="2"> <p id="alertdtype" ></p></font> 
                                  </div>
                            <div class="col-md-5"></div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                              <!-- upload here -->
                                  <span>เลือกไฟล์</span>
                                  <input type="file" class="form-control" name="fileUpload[]" multiple >
                                 <font color="red" size="2"> <p id="alertdfile" ></p></font>
                            </div>
                            <div class="col-md-1"></div>
                          </div>
                          <div class="row">
                            <div class="col-md-9"></div>
                            <div class="col-md-2">
                              <input type="submit" value="บริจาค" class="btn btn-primary" onclick="checkValidate()" name="submitBtn">
                            </div>
                          </div>

                        </form>
                      </div>
                        </div>
                    </div>
                    <!--/.First row-->


                </div>
                <!--/.Main column-->

            </div>
        </div>
        <!--/.Main layout-->

    </main>
<script>
function InvalidTbName() {
    if (document.getElementsByName("dname")[0].value == '') {
      document.getElementById("alertdname").innerHTML = "โปรดกรอกชื่อของที่จะบริจาค";
    }else {

      document.getElementById("alertdname").innerHTML = "";
    }
    return true;
  }
  function InvalidTbDetail() {
    if (document.getElementsByName("ddetail")[0].value == '') {
      document.getElementById("alertddetail").innerHTML = "โปรดกรอกรายละเอียดของที่จะบริจาค";
    }else {

      document.getElementById("alertddetail").innerHTML = "";
    }
    return true;
  }
  function InvalidTbSize() {
    if (document.getElementsByName("dsize")[0].value == '') {
      document.getElementById("alertdsize").innerHTML = "โปรดกรอกขนาดของที่บริจาค";
    }else {

      document.getElementById("alertdsize").innerHTML = "";
    }
    return true;
  }
  function InvalidTbWeight() {
    if (document.getElementsByName("dweight")[0].value == '') {
      document.getElementById("alertdweight").innerHTML = "โปรดกรอกน้ำหนักของที่บริจาค";
    }else {
      document.getElementById("alertdweight").innerHTML = "";
    }
    return true;
  }
    function InvalidTbAmount() {
    if (document.getElementsByName("damount")[0].value == '') {
      document.getElementById("alertdamount").innerHTML = "โปรดกรอกน้ำหนักของที่บริจาค";
    }else {
      document.getElementById("alertdamount").innerHTML = "";
    }
    return true;
  }
  function InvalidTbfileUpload() {
    if (document.getElementsByName("fileUpload[]")[0].value == '') {
      document.getElementById("alertdfile").innerHTML = "โปรเลือกรูปภาพสินค้าที่จะบริจาค";
    }else {
      document.getElementById("alertdfile").innerHTML = "";
    }
    return true;
  }
  function InvalidTbType() {
     var selects = document.getElementsByName("donate_type")[0];
    var selectedValue = selects.options[selects.selectedIndex].value;
    if (selectedValue == '') {
      document.getElementById("alertdtype").innerHTML = "โปรเลือกประเภทสินค้าที่จะบริจาค";
    }else {
      document.getElementById("alertdtype").innerHTML = "";
    }
    return true;
  }
   
  function checkValidate(){
    InvalidTbName();
    InvalidTbDetail();
    InvalidTbWeight();
    InvalidTbSize();
    InvalidTbAmount();
    InvalidTbfileUpload();
    InvalidTbType();
  }

/*
  function InvalidTbName(tb) {
    if (tb.value == '') {
      document.getElementById("alertdname").innerHTML = "โปรดกรอกชื่อของที่บริจาค";
    }else {

      document.getElementById("alertdname").innerHTML = "";
    }
    return true;
  }

  function InvalidTbDetail(tb) {
    if (tb.value == '') {
      tb.setCustomValidity('โปรดรายละเอียดของที่บริจาค');
    }else {
      tb.setCustomValidity('');
    }
    return true;
  }

var validNumber = new RegExp(/^\d*\.?\d*$/);
var lastValid = document.getElementById("dsize").value;
function validateNumberSize(elem) {
  if (validNumber.test(elem.value)) {
    lastValid = elem.value;
  } else {
    elem.value = lastValid;
  }
}
function validateNumberWeight(elem) {
  if (validNumber.test(elem.value)) {
    lastValid = elem.value;
  } else {
    elem.value = lastValid;
  }
}*/


 // Material Select Initialization
 $(document).ready(function() {
    $('.mdb-select').material_select();
  });

</script>
<?php $this->load->view('page_footer'); ?>
