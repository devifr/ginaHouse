<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>View Detail</h1></div>


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
	
	
		<!-- start id-form -->
<?php echo $this->session->flashdata('msg'); ?>
<?php
if($rows->num_rows()>0){
$row = $rows->row(); ?>
<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
	<tr>
		<th>Total </th>
		<th><?php echo $row->total; ?></th>
	</tr>
	<tr>
		<th>Quantity</th>
		<th><?php echo $row->quantity; ?></th>
		</td>
	</tr>
	<tr>
		<th>No Transaksi</th>
		<th><?php echo $row->no_transaksi; ?></th>
	</tr>
	</table>
	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
	<tr>
		<th class="table-header-repeat line-left minwidth-1"><a href="#">No Pembelian</th>
		<th class="table-header-repeat line-left minwidth-1"><a href="#">No Transaksi</th>
		<th class="table-header-repeat line-left minwidth-1"><a href="#">Product Id</th>
		<th class="table-header-repeat line-left minwidth-1"><a href="#">Sub Total</th>
		<th class="table-header-repeat line-left minwidth-1"><a href="#">Quantity</th>
		<th class="table-header-repeat line-left minwidth-1"><a href="#">Name Costumer</th>
	</tr>
	<?php foreach($pembeliandetail->result() as $key => $kate){ ?>
	<tr>
		<td><?php echo $kate->id_pembeliandetail; ?></td>
		<td><?php echo $kate->no_transaksi; ?></td>
		<td><?php echo $kate->product_id; ?></td>
		<td><?php echo $kate->sub_total; ?></td>
		<td><?php echo $kate->quantity; ?></td>
		<td><?php echo $kate->nama_costumer; ?></td>
	</tr>
	<?php } ?>
  </table>
	</form>
	<?php }else{
	echo "data Tidak ADa";
	}?>
	<!-- end id-form  -->

	</td>
	<td>
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
