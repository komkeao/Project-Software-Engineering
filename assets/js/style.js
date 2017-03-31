function check_donate(){
  var name = document.getElementById("dname").value;
  var detail = document.getElementById("ddetail").value;
  var description = document.getElementById("ddescription").value;
  var length = document.getElementById("dlength").value;
  var width = document.getElementById("dwidth").value;
  var height = document.getElementById("dheight").value;
  var weight = document.getElementById("dweight").value;
  var type = document.getElementById("dtype").value;
  var amount = document.getElementById("damount").value;
  var file = document.getElementById("dfile").value;
  if(name==""){
    document.getElementById("alertInputName").innerHTML = "กรุณาใส่ชื่อของที่จะบริจาค";
  }else{
    document.getElementById("alertInputName").innerHTML = "";
  }
  if(detail==""){
    document.getElementById("alertInputDetail").innerHTML = "กรุณาใส่รายละเอียด";
  }else{
    document.getElementById("alertInputDetail").innerHTML = "";
  }
  if(description==""){
    document.getElementById("alertInputDescription").innerHTML = "กรุณาใส่คำอธิบาย";
  }else{
    document.getElementById("alertInputDescription").innerHTML = "";
  }
  if(length==""){
    document.getElementById("alertInputLength").innerHTML = "กรุณาใส่ความกว้าง";
  }else{
    document.getElementById("alertInputLength").innerHTML = "";
  }
  if(width==""){
    document.getElementById("alertInputWidth").innerHTML = "กรุณาใส่ความยาว";
  }else{
    document.getElementById("alertInputWidth").innerHTML = "";
  }
  if(height==""){
    document.getElementById("alertInputHeight").innerHTML = "กรุณาใส่ความสูง";
  }else{
    document.getElementById("alertInputHeight").innerHTML = "";
  }
  if(weight==""){
    document.getElementById("alertInputWeight").innerHTML = "กรุณาใส่น้ำหนัก";
  }else{
    document.getElementById("alertInputWeight").innerHTML = "";
  }
  if(type==""){
    document.getElementById("alertInputType").innerHTML = "กรุณาเลือกประเภท";
  }else{
    document.getElementById("alertInputType").innerHTML = "";
  }
  if(amount==""){
    document.getElementById("alertInputAmount").innerHTML = "กรุณาใสจำนวน";
  }else{
    document.getElementById("alertInputAmount").innerHTML = "";
  }
  if(file==""){
    document.getElementById("alertInputFile").innerHTML = "กรุณาเลือกรูปภาพ";
  }else{
    document.getElementById("alertInputFile").innerHTML = "";
  }
}
