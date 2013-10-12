<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1></h1>
	</div>
	<!-- end page-heading -->

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
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
				<!--  start message-green -->
				<?php if($this->session->flashdata('msg')){  ?>
					<div id="message-green">
					<table border="0" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td class="green-left"><?php echo $this->session->flashdata('msg'); ?></td>
						<td class="green-right"><a class="close-green"><img src="<?php echo base_url(); ?>asset/images/table/icon_close_green.gif"   alt="" /></a></td>
					</tr>
					</table>
					</div>
				<?php } ?>
				<!--  end message-green -->
		
		 
				<!--  start product-table ..................................................................................... -->
<?php echo $this->session->flashdata('msg'); ?> <br/>
<a href="<?php echo base_url('index.php/admin/konfirmasi/input/'); ?>"><input type="button" value="Add Data" class="form-input" /></a>
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
	<tr>
		<th class="table-header-repeat line-left minwidth-1"><a href="#">No</th>
		<th class="table-header-repeat line-left minwidth-1"><a href="#">No Transaksi</th>
		<th class="table-header-repeat line-left minwidth-1"><a href="#">Costumer Id</th>
		<th class="table-header-repeat line-left minwidth-1"><a href="#">Nama Bank</th>
		<th class="table-header-repeat line-left minwidth-1"><a href="#">No Rekening </th>
		<th class="table-header-repeat line-left minwidth-1"><a href="#">Action</th>
	</tr>
	<?php foreach($konfirmasi->result() as $kate){ ?>
	<tr>
		<th><?php echo $kate->id_konfirmasi; ?></th>
		<th><?php echo $kate->no_transaksi; ?></th>
		<th><?php echo $kate->costumer_id; ?></th>
		<th><?php echo $kate->nama_bank; ?></th>
		<th><?php echo $kate->no_rekening; ?></th>
		<th><a href="<?php echo base_url('index.php/admin/konfirmasi/edit/'.$kate->id_konfirmasi); ?>" title="Edit" class="icon-1 info-tooltip"> </a>  
			<a href="<?php echo base_url('index.php/admin/konfirmasi/delete/'.$kate->id_konfirmasi); ?>" title="Delete" class="icon-2 info-tooltip" onclick="return confirm('Apakah anda Akan Menghapus Record ini?')">  </a>
			<a href="<?php echo base_url('index.php/admin/konfirmasi/view/'.$kate->id_konfirmasi); ?>" title="View Detail" class="icon-5 info-tooltip">  </a>
		</tr>
	<?php } ?>
  </table>             
				<!--  end product-table................................... --> 
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			<!-- <div id="actions-box">
				<a href="" class="action-slider"></a>
				<div id="actions-box-slider">
					<a href="" class="action-edit">Edit</a>
					<a href="" class="action-delete">Delete</a>
				</div>
				<div class="clear"></div>
			</div>
			 --><!-- end actions-box........... -->
			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				<?php echo $pagination; ?>
			</td>
			</tr>
			</table>
			<!--  end paging................ -->
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
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
<!--  end content-outer........................................................END -->
