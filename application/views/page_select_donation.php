<?php if($_SESSION['utype']==1){ ?>
  <!-- <table>
    <tr>
      <img src="<?= base_url() ?>assets/img/donor.png">
    </tr>
    <tr>
      <img src="<?= base_url() ?>assets/img/recipient.png">
    </tr>
  <table> -->
  <div class="row" >
    <form id="donation" method="post" action="<?= base_url() ?>index.php/donation/select_donation">
    <div class="col-lg-6" align="center">
      <button type="submit" id="donorType" ><img src="<?= base_url() ?>assets/img/donor.png" height="450"></button>
      <input type="hidden" name="donation" value="donor">
    </div>
  </form>
    <form id="donation" method="post" action="<?= base_url() ?>index.php/donation/select_donation">
    <div class="col-lg-6" align="center">
      <button type="submit" id="recipientType"><img src="<?= base_url() ?>assets/img/recipient.png" height="450"></button>
      <input type="hidden" name="donation" value="recipient">
    </div>
  </form>
  </div>
  </div>
<?php }else{ ?>
admin
<?php } ?>
