<div class="center_content">
        <div class="left_content">
          <div class="title"><span class="title_icon"><img src="<?php echo base_url('asset/images/bullet1.gif'); ?>" alt="" title="" /></span>Checkout</div>
          <div class="feat_prod_box_details">
<?php echo $this->session->flashdata('msg'); ?>
<table cellspacing="0" cellpadding="0" align="center">
    <table width="99%" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #ececec;">
<form action="<?php echo base_url().'index.php/konfirmasi/save_konfirmasi/' ?>" method="post" class="cssform" id="myform">
  <?php
   $tgl = date('d-m-Y');
   $tgl2 = date('Y-m-d');
    ?>
                <tr bgcolor="#f0f0f0" >
                <td colspan="3" bgcolor="#f0f0f0"><span class="style20 style2 style16">Silahkan isi Form Konfirmasi di bawah ini dengan lengkap , kemudian tunggu SMS atau Email Konfirmasi bahwa pembayaran anda Sudah di terima !!!</span></td>
        </tr>
        <tr>
          <td colspan="3"></td>
        </tr>
             <tr>
                <td align="left"><span class="style15">NO TRANSAKSI ANDA*</span></td>
               <td>&nbsp;</td>
                <td><?php echo form_error('no_pesan'); ?>
                  <input type="text" name="no_pesan" size="20" id="no_pesan" value="<?php echo $no_transaksi; ?>" />
                    <div class="errormessage"></div></td>
        </tr>
              <tr bgcolor="#f0f0f0">
                <td align="left" valign="top"><span class="style15">Tanggal Konfirmasi</span></td>
                <td bgcolor="#f0f0f0">&nbsp;</td>
                <td bgcolor="#f0f0f0"><span style="font-size:14px; font-weight:bold;"><?php echo $tgl;?></span>
                <input name="tgl_pesan" type="hidden" id="tgl_pesan" value="<?php echo $tgl2;?>" /> </td>
              </tr>
                   <tr>
                <td align="left"><span class="style15">Nama Lengkap Anda*</span></td>
                <td>&nbsp;</td>
                <td><?php echo $this->session->userdata('nama_customer');; ?>
                  </td>
              </tr>

              <tr bgcolor="#f0f0f0" >
                <td align="left"><span class="style15">Alamat Email Anda*</span></td>
                <td bgcolor="#f0f0f0">&nbsp;</td>
                <td bgcolor="#f0f0f0"><?php echo $this->session->userdata('email_costumer'); ?></td>
              </tr>
              <tr>
                <td align="left"><span class="style15">No Telepon Anda</span></td>
                <td>&nbsp;</td>
                <td><?php echo form_error('no_tlp'); ?>
                  <input type="text" name="no_tlp" size="40" value="<?php echo set_value('no_tlp'); ?>" id="no_tlp" />                </td>
              </tr>
              <tr bgcolor="#f0f0f0">
                <td align="left"><span class="style15">Tanggal Transfer Pembayaran*</span></td>
                <td bgcolor="#f0f0f0">&nbsp;</td>
                <td bgcolor="#f0f0f0"><?php echo form_error('tgl'); ?><?php echo form_error('bln'); ?><?php echo form_error('thn'); ?>
                  <select name="tgl" class="BoxmainLogin">
                  <?php
          for ($i=1; $i<=31; $i++) {
            $tg = ($i<10) ? "0$i" : $i;
            echo "<option value='$tg'>$tg</option>";  
          }
        ?>
                </select>
-
<select name="bln" class="BoxmainLogin">
  <option value="01">Jan </option>
                                                  <option value="02">Feb </option>
                                                  <option value="03">Mar </option>
                                                  <option value="04">Apr </option>
                                                  <option value="05">May </option>
                                                  <option value="06">Jun </option>
                                                  <option value="07">Jul </option>
                                                  <option value="08">Aug </option>
                                                  <option value="09">Sep </option>
                                                  <option value="10">Oct </option>
                                                  <option value="11">Nov </option>
                                                  <option value="12">Dec </option>
</select>
-
<select name="thn" class="BoxmainLogin">
  <?php
          for ($i=2010; $i<=2015; $i++) {
            echo "<option value='$i'>$i</option>";  
          }
        ?>
</select>
<br /></td>
              </tr>
              <tr>
                <td align="left"><span class="style15">Jumlah Pembayaran (Rp.)*</span></td>
                <td>&nbsp;</td>
                <td><?php echo form_error('jum_bayar'); ?>
                  <input type="text" name="jum_bayar" size="40" value="<?php echo set_value('jum_bayar'); ?>" id="jum_bayar" />
                    <div class="errormessage"></div></td>
              </tr>
              <tr bgcolor="#f0f0f0">
                <td align="left"><span class="style15">No Rekening</span></td>
                <td bgcolor="#f0f0f0">&nbsp;</td>
                <td bgcolor="#f0f0f0">
                  <?php echo form_error('no_rek'); ?>
                  <input type="text" name="no_rek" size="40" value="<?php echo set_value('no_rek'); ?>" id="no_rek" />
                <div class="errormessage"></div></td>
              </tr>
              <tr bgcolor="#f0f0f0">
                <td align="left"><span class="style15">Pembayaran dari bank (mis: BCA                                                   &amp; Mandiri)*</span></td>
                <td bgcolor="#f0f0f0">&nbsp;</td>
                <td bgcolor="#f0f0f0">
                  <?php echo form_error('dari_bank'); ?>
                  <input type="text" name="dari_bank" size="40" value="<?php echo set_value('dari_bank'); ?>" id="dari_bank" />
                <div class="errormessage"></div></td>
              </tr>
              <tr>
                <td align="left" valign="top">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="top"><span class="style15"><br />
                </span></td>
                <td>&nbsp;</td>
                <td><div style="text-decoration:blink;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="3">
                      <tr bgcolor="#f4f4f4">
                        <td bgcolor="#f4f4f4" class="carttitlelist style1">&nbsp;</td>
                        <td class="carttitlelist"><span class="carttitlelist style1 style11">Silahkan Masukan Pesan Atau Catatan Anda</span></td>
                        <td bgcolor="#f4f4f4" class="carttitlelist">&nbsp;</td>
                      </tr>
                    </table>
                </div>
                    <!--BEGIN SHOW PRODUCTS CART -->
                    <textarea name="catatan" cols="30" rows="6" id="catatan"></textarea>
                    <!--END SHOW PRODUCTS CART -->
<div class="errormessage"></div></td>
              </tr>
              <tr bgcolor="#f0f0f0" >
                <td align="left"><span class="style15">Pemberitahuan*</span></td>
                <td bgcolor="#f0f0f0">&nbsp;</td>
                <td bgcolor="#f0f0f0">
                    <span class="style20 style2">Setelah di Lakukan Konfirmasi Pembayaran Tunggu SMS atau Email Balasan dari Kami.</span></td>
        </tr>
              <tr>
                <td colspan='3'> Submit the word you see below: <br/>
                <?php echo $captcha.'<br/>';
                echo '<input type="text" name="captcha" value="" />';
                ?>
              </td>
              </tr>
              <tr>
                <td align="left">&nbsp;</td>
                <td>&nbsp;</td>
                <td><input type="submit" name="submit" value="Kirim Data Konfirmasi" />                </td>
              </tr>
              <tr>
                <td colspan="5" align="right">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="5" align="right">&nbsp;</td>
              </tr>
            </form>
          </table>
    </td>
  </tr>
</table>
            </div>
        <div class="clear"></div>
        </div><!--end of left content-->