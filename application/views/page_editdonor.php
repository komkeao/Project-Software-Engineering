<h2 class="h2-responsive" align="center"><?= $head ?></h2>
<?php foreach ($edit as $editrow){ ?>
<form action="<?= base_url() ?>index.php/donation/editdo_donor" method="post" enctype="multipart/form-data">
<div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-6">
    <div class="input-group">
		<span class="input-group-addon">
			<b>ชื่อของที่จะบริจาค :</b>
		</span>
    <input type="hidden" name="did" id="did" value="<?= $editrow->donate_id ?>">
		<input type="text" class="form-control" name="dname" id="dname" placeholder="Baby heart ผ้าอ้อมสำลี" value="<?= $editrow->donate_name ?>" required >
	</div>
  </div>
  <div class="col-lg-4"><font color="red" size="3px"><div id="alertInputName"></div></font></div>
</div>
<div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-6">
    <div class="input-group">
		<span class="input-group-addon">
			<b>รายละเอียด :</b>
		</span>
		<input type="text" class="form-control" name="ddetail" id="ddetail" placeholder="ผ้าอ้อมสำหรับเด็ก" value="<?= $editrow->donate_detail ?>" required >
	</div>
  </div>
  <div class="col-lg-4"><font color="red" size="3px"><div id="alertInputDetail"></div></font></div>
</div>
<div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-6">
    <div class="input-group">
		<span class="input-group-addon">
			<b>คำอธิบาย :</b>
		</span>
		<textarea class="form-control" name="ddescription" id="ddescription" rows="5" placeholder="เหมาะสำหรับห่อตัว ปูรองนอนได้ ให้ความอบอุ่น พ้งริมเรียบร้อยคงทนใช้ได้ยาวนาน พิมพ์ลายน่ารัก ยิ่งซักผ้ายิ่งฟูนุ่ม ซึมซับน้ำได้ดี ช่วยลดปัญหาผื่นผ้าอ้อมจากการใส่ผ้าอ้อมสำเร็จรูปนานเกินไป" required ><?= $editrow->donate_description ?></textarea>
	</div>
  </div>
  <div class="col-lg-4"><font color="red" size="3px"><div id="alertInputDescription"></div></font></div>
</div>
<div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-6">
    <div class="input-group">
    <span class="input-group-addon">
			<b>กว้าง (เซนติเมตร):</b>
		</span>
		<input type="number" class="form-control" name="dlength" id="dlength" placeholder="20" value="<?= $editrow->donate_length ?>" min="0" max="99999" required >
	</div>
  </div>
  <div class="col-lg-4"><font color="red" size="3px"><div id="alertInputLength"></div></font></div>
</div>
<div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-6">
    <div class="input-group">
    <span class="input-group-addon">
			<b>ยาว (เซนติเมตร):</b>
		</span>
		<input type="number" class="form-control" name="dwidth" id="dwidth" placeholder="20" value="<?= $editrow->donate_width ?>" min="0" max="99999" required >
	</div>
  </div>
  <div class="col-lg-4"><font color="red" size="3px"><div id="alertInputWidth"></div></font></div>
</div>
<div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-6">
    <div class="input-group">
    <span class="input-group-addon">
			<b>สูง (เซนติเมตร):</b>
		</span>
		<input type="number" class="form-control" name="dheight" id="dheight" placeholder="30" value="<?= $editrow->donate_height ?>" min="0" max="99999" required >
	</div>
  </div>
  <div class="col-lg-4"><font color="red" size="3px"><div id="alertInputHeight"></div></font></div>
</div>
<div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-6">
    <div class="input-group">
    <span class="input-group-addon">
			<b>น้ำหนัก (กรัม):</b>
		</span>
		<input type="number" class="form-control" name="dweight" id="dweight" placeholder="320" value="<?= $editrow->donate_weight ?>" min="0" max="99999" required >
	</div>
  </div>
  <div class="col-lg-4"><font color="red" size="3px"><div id="alertInputWeight"></div></font></div>
</div>
<div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-6">
    <div class="input-group">
		<span class="input-group-addon">
			<b>ประเภท :</b>
		</span>
      <select required class="select form-control" name="dtype" id="dtype" >
        <option value="" disabled selected>กรุณาเลือกประเภท</option>
            <?php foreach ($donate_type as $row){
              if($row->type_id===$editrow->donatetype_id){
                echo "<option value='".$row->type_id."' selected>".$row->type_name_th.' : '.$row->type_name_en."</option>";
              }else{
                echo "<option value='".$row->type_id."'>".$row->type_name_th.' : '.$row->type_name_en."</option>";
              }
              } ?>
      </select>
	</div>
  </div>
  <div class="col-lg-4"><font color="red" size="3px"><div id="alertInputType"></div></font></div>
</div>
<div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-6">
    <div class="input-group">
		<span class="input-group-addon">
			<b>จำนวน (ชิ้น):</b>
		</span>
		<input type="number" class="form-control" name="damount" id="damount" placeholder="3" value="<?= $editrow->donate_amount ?>" min="0" max="99999" required >
	</div>
  </div>
  <div class="col-lg-4"><font color="red" size="3px"><div id="alertInputAmount"></div></font></div>
</div>
<div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-6">
    <div class="input-group">
		<span class="input-group-addon">
			<b>ภาพประกอบ :</b>
		</span>
    <input type="file" name="dfile" id="dfile" accept="image/*">
    <img src="<?= base_url().'assets/uploads/'.$editrow->donate_image ?>" id="imgfile" height="200" />
</div>
	</div>
  <div class="col-lg-4"></div>
</div>
<div class="row">
  <div class="col-lg-5"></div>
  <div class="col-lg-2">
    <input type="submit" id="donorSubmit" class="btn btn-info" value="แก้ไข" onclick="check_donate()">
	</div>
  <div class="col-lg-5"></div>
</div>
</form>
<?php } ?>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imgfile').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#dfile").change(function(){
        readURL(this);
    });
</script>
