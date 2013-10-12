<script type="text/javascript" src="<?php echo base_url('asset/js/jquery-1.7.2.min.js'); ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("#print").on("click",function(event){
    event.preventDefault();
    alert($("#print-order").text());

  });
});
</script>
<?php echo anchor('checkout/finish/#', 'Print', "id='print'"); ?>
<div class="center_content">
       	<div class="left_content">
          <div class="title"><span class="title_icon"></span>Checkout</div>
          <div class="feat_prod_box_details">
          <?php if($rows->num_rows()){
          $row = $rows->row();
          $alamat = str_replace('|',', ', $row->alamat_pengiriman);
          $pembayaran = str_replace('-',', ', $row->jenis_pembayaran);
           ?>
          <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" id="print-order">
          <tbody>
          <tr>
            <td class="hapus" width="19%">No Transaksi</td>
            <td width="1%">:</td>
            <td><?php echo $row->no_transaksi; ?></td>
          </tr>
          <tr>
            <td class="hapus" width="19%">Alamat Pengiriman </td>
            <td width="1%">:</td>
            <td><?php echo $alamat; ?></td>
        </tr>
        <tr>
            <td class="hapus">Cara Pembayaran</td>
            <td>:</td>
            <td><?php echo $pembayaran; ?></td>
        </tr>
        <tr>
            <td class="hapus">Cara Pemngiriman</td>
            <td>:</td>
            <td><?php echo $row->jenis_pengiriman; ?></td>
        </tr>
        <tr>
            <td class="hapus">Total Bayar </td>
            <td>:</td>
            <td>Rp. <span class="total"><?php echo $this->cart->format_number($row->total); ?></span>
            </td>
        </tr>
        <tr>
            <?php 
            if($row->jenis_pembayaran=="COD")
            {
              $keterangan = "Silahkan Hubungi Ke No : 085659912347 An Maya Nurhasanah";
            }
            else{ 
              $keterangan = "Anda Bisa Melakukan Pembayaran dengan $pembayaran";
            }
            ?>
            <td colspan="3"><?php echo $keterangan; ?></td>
        </tr>
        </tbody>
      </table>
      <?php }else{
        echo "No Data";
      } ?>
            </div>
        <div class="clear"></div>
        </div><!--end of left content-->