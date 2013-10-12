<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Edit Kurir</h1></div>


<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="<?php echo base_url(); ?>asset/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="<?php echo base_url(); ?>asset/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	
	
		<!--  start step-holder -->
<!-- 		<div id="step-holder">
			<div class="step-no">1</div>
			<div class="step-dark-left"><a href="">Add Kurir details</a></div>
			<div class="step-dark-right">&nbsp;</div>
			<div class="step-no-off">2</div>
			<div class="step-light-left">Select related kurir</div>
			<div class="step-light-right">&nbsp;</div>
			<div class="step-no-off">3</div>
			<div class="step-light-left">Preview</div>
			<div class="step-light-round">&nbsp;</div>
			<div class="clear"></div>
		</div>
 -->		<!--  end step-holder -->
	
		<!-- start id-form -->
<?php
if($rows->num_rows()>0){
$row = $rows->row(); ?><form action="<?php echo base_url("index.php/admin/kurir/update_data/$row->id_kurir") ?>" method="post" nama="form_edit">
<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
	<tr>
	<th>Provinsi Kurir :</th>
	<td><input type="text" name="provinsi_kurir" value="<?php echo $row->provinsi_kurir; ?>" class="inp-form"/></td>
	</tr>
	<tr>
	<th>Kota Kurir :</th>
	<td><input type="text" name="kota_kurir" value="<?php echo $row->kota_kurir; ?>" class="inp-form"/></td>
	</tr>
	<tr>
	<th>Biaya Kurir :</th>
	<td><input type="text" name="biaya_kurir" value="<?php echo $row->biaya_kurir; ?>" class="inp-form"/></td>
	</tr>
	<tr>
	<th>Lama Pengiriman : </th>
	<td>
		<select name="lama_kurir">
				<option value="0">YES</option>
				<option value="1" <?php if($row->lama_kurir=='1') echo "selected='selected'"; ?>>Reguler</option>
				<option value="2" <?php if($row->lama_kurir=='2') echo "selected='selected'"; ?>>RPX</option>
		</select>
	</tr>
	<tr>
	<td colspan="2"><input type="submit" name="simpan" value="Simpan" class="form-submit" /></td>
	</tr>
	</table>
	</form>
	<?php }else{
	echo "data Tidak ADa";
	}?>
<!-- end id-form  -->

	</td>
	<td>

	<!--  start related-activities -->
	<!-- end related-activities -->

</td>
</tr>
<tr>
<td><img src="<?php echo base_url(); ?>asset/images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>









 





<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->
