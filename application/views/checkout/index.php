<script type="text/javascript" src="<?php echo base_url('asset/js/jquery-1.7.2.min.js'); ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
// $(".transfer-bank").hide();
// $(".pengiriman_kurir").hide();
  $("#provinsi").on('change',function(event){
    event.preventDefault();
    var provinsi = $(this).val();
      $.post("<?php echo base_url(); ?>index.php/ajax/getKota/",
               { name: provinsi },
               function(data) {
                  $('#kota').html(data);
               });
  });

  $("#kota").on('change',function(event){
    event.preventDefault();
    var kota = $(this).val();
    var total = <?php echo $this->cart->total(); ?>

    // var pro = $("#provinsi").val();
      $.post("<?php echo base_url(); ?>index.php/ajax/getBiaya/",
               { name: kota },
               function(data) {
                  $('#biaya').val(data);
                  $('.biaya').html(data);
                  var total_all = parseInt(total) + parseInt(data);
                  $('#total').val(total_all);
                  $('.total').html(total_all);
                  if(data=='0'){
                    $('.COD').show();
                  }else{
                    $('.COD').hide();
                  }
               });
            $.post("<?php echo base_url(); ?>index.php/ajax/getType/",
               { name: kota },
               function(data) {
                  $('#type_kurir').html(data);
               });
  });

    $("#type_kurir").on('change',function(event){
    event.preventDefault();
    var type = $(this).val();
    var kota = $("#kota").val();
    var total = <?php echo $this->cart->total(); ?>

    // var pro = $("#provinsi").val();
      $.post("<?php echo base_url(); ?>index.php/ajax/getBiayaPengiriman/",
               { kota:kota, type: type },
               function(data) {
                  $('#biaya').val(data);
                  $('.biaya').html(data);
                  var total_all = parseInt(total) + parseInt(data);
                  $('#total').val(total_all);
                  $('.total').html(total_all);
               });
  });
  $(".COD").on('change',function(){
     $(".COD").find('input').attr("checked","checked");
     $(".transfer-bank").hide();
     $(".pengiriman_kurir").hide();
  });
  $(".other").on('change',function(){
     $(".other").find('input').attr("checked","checked");
     $(".transfer-bank").show();
     $(".pengiriman_kurir").show();
  });
});
</script>
<style type="text/css">
.COD{
  display: none;
}
</style>
<div class="center_content">
       	<div class="left_content">
          <div class="title"><span class="title_icon"><img src="<?php echo base_url('images/bullet1.gif'); ?>" alt="" title="" /></span>Checkout</div>
          <div class="feat_prod_box_details">
          <?php if($customer->num_rows()){
          $c = $customer->row();
          $alamat = explode('|', $c->alamat_costumer);
           ?>
          <?php echo form_open('checkout/do_checkout', 'buy'); ?>        
          <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
          <tbody>
          <tr>
            <td class="hapus" width="19%">Masukan Alamat Pengiriman </td>
            <td width="1%">:</td>
            <td colspan="2"><textarea name="alamat" cols="40" rows="3"><?php echo $alamat[0]; ?></textarea></td>
          </tr>
          <tr>
            <td class="hapus" width="19%">Provinsi</td>
            <td width="1%">:</td>
            <td colspan="2">
              <select name="provinsi" id="provinsi">
                <?php 
                   echo "<option value='-' selected='selected'>-Pilih Provinsi-</option>";
                foreach ($provinsi as $prov) {
                   echo "<option>$prov->provinsi_kurir</option>";
                 }
               ?>
              </select>
            </div></td>
          </tr>
          <tr>
            <td class="hapus" width="19%">Kota</td>
            <td width="1%">:</td>
            <td colspan="2">
              <select name="kota" id="kota">
                <?php 
                   echo "<option value='-' selected='selected'>-Pilih Provinsi Dulu-</option>";
               ?>
              </select>
            </td>
          </tr>
        <tr>
            <td class="hapus">Kode Pos </td>
            <td>:</td>
            <td colspan="2"><input name="kdpos" value="<?php echo $alamat[3]; ?>" type="text"></td>
        </tr>
        <tr>
            <td class="hapus">Cara Pembayaran</td>
            <td>:</td>
            <td colspan="2"><?php echo '<span class=other>'.form_radio('cara_pembayaran','Transfer',TRUE).'Transfer Bank </span><span class=COD>'.
            form_radio('cara_pembayaran','COD').'COD </span>'; ?>
              <input name="biaya" class="BoxmainLogin2" id="biaya" class="biaya" value="" type="hidden">  
            </td>
        </tr>
        <tr>
            <td class="hapus">Cara Pengiriman</td>
            <td>:</td>
            <td colspan="2"><?php echo '<span class=other>'.form_radio('cara_pengiriman','Kurir',TRUE).'Kurir JNE </span><span class=COD>'.
            form_radio('cara_pengiriman','COD',false,'id=coba').'COD </span>'; ?>
              <input name="biaya" class="BoxmainLogin2" id="biaya" class="biaya" value="" type="hidden">  
            </td>
        </tr>
        <tr class="transfer-bank">
            <td>Transfer Ke Bank</td>
            <td>:</td>
            <td><select name="transfer_bank">
                  <option>BCA - 327717277177 - Maya Nurhasanah</option>
                  <option>BNO - 573472653472 - Maya Nurhasanah</option>
            </select></td>
        </tr>
        <tr class="pengiriman_kurir">
            <td>Type Pengiriman</td>
            <td>:</td>
            <td><select name="pengiriman_kurir" id="type_kurir">
                  <option value="0">YES</option>
                  <option value="1">Reguler</option>
                  <option value="2">RPX</option>
            </select></td>
        </tr>
        <tr>
            <td class="hapus">Biaya Pengiriman</td>
            <td>:</td>
            <td colspan="2">Rp.          
              <span class="biaya"></span>
              <input name="biaya" class="BoxmainLogin2" id="biaya" class="biaya" value="" type="hidden">  
            </td>
        </tr>
        <tr>
            <td class="hapus">Total Bayar </td>
            <td>:</td>
            <td colspan="2">Rp. <span class="total"></span>
              <input name="total" class="BoxmainLogin2" id="total" value="" type="hidden">  
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input name="simpan" value="Selesai" type="submit"></td>
          </tr>
        </tbody>
      </table>
      <?php echo form_close(); ?>
      <?php }else{
        echo "No Data";
      } ?>
            </div>
        <div class="clear"></div>
        </div><!--end of left content-->