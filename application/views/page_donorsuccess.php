<div class="row">
  <?php foreach ($edit as $row){ ?>
  <h2 class="h2-responsive" align="center"><?= $head ?></h2>
  <div class="col-lg-4">
    <div align="center">
      <img src="<?php echo base_url().'assets/uploads/'.$row->donate_image; ?>" class="img-rounded img-responsive img-raised" height="200">
    </div>
  </div>
  <div class="col-lg-4">
    <div class="row">
      <b>ชื่อของที่บริจาค : </b><?= $row->donate_name ?>
    </div>
    <div class="row">
      <b>รายละเอียด : </b><?= $row->donate_detail ?>
    </div>
    <div class="row">
      <b>คำอธิบาย : </b><?= $row->donate_description ?>
    </div>
    <div class="row">
      <b>กว้าง : </b><?= $row->donate_length ?><b>&nbsp;เซนติเมตร</b>
    </div>
    <div class="row">
      <b>ยาว : </b><?= $row->donate_width ?><b>&nbsp;เซนติเมตร</b>
    </div>
    <div class="row">
      <b>สูง : </b><?= $row->donate_height ?><b>&nbsp;เซนติเมตร</b>
    </div>
    <div class="row">
      <b>น้ำหนัก : </b><?= $row->donate_weight ?><b>&nbsp;กรัม</b>
    </div>
    <div class="row">
      <b>ประเภท : </b>[<?= $row->donatetype_id ?>]&nbsp;
      <?php foreach ($donate_type as $rowtype){
        if($rowtype->type_id===$row->donatetype_id){
          echo $rowtype->type_name_th;}
        } ?>
    </div>
    <div class="row">
      <b>จำนวน : </b><?= $row->donate_amount ?><b>&nbsp;ชิ้น</b>
    </div>
    <div class="row">
      <button onclick="location.href='<?php echo base_url(); ?>index.php/donation/edit_donor/<?= $row->donate_id ?>';" id="btnEditDonate" class="btn btn-info">แก้ไข</button>
      <button onclick="location.href='<?php echo base_url(); ?>index.php/user/index';" id="btnAddDonate" class="btn btn-info">เพิ่ม</button>
    </div>
  </div>
  <div class="col-lg-4"></div>
  <?php } ?>
</div>
