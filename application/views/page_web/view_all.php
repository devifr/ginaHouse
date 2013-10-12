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
<a href="<?php echo base_url('index.php/admin/page_web/input/'); ?>"><input type="button" value="Add Data" class="form-input" /></a>
<br/>
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
	<tr>
		<th class="table-header-repeat line-left minwidth-1"><a href="#">No</a></th>
		<th class="table-header-repeat line-left minwidth-1"><a href="#">Judul Page</a></th>
		<th class="table-header-repeat line-left minwidth-1"><a href="#">Status</a></th>
		<th class="table-header-repeat line-left minwidth-1"><a href="#">Action</a></th>
	</tr>
	<?php foreach($page_web->result() as $key => $kate){ ?>
	<tr>
		<td><?php echo $key+1; ?></td>
		<td><?php echo $kate->judul_page; ?></td>
		<td><?php if($kate->status_page=='1') echo 'Aktif';
				   else echo 'Tidak Aktif';	 ?></td>
		<td><a href="<?php echo base_url('index.php/admin/page_web/edit/'.$kate->id_page); ?>" title="Edit" class="icon-1 info-tooltip"> </a>  
			<a href="<?php echo base_url('index.php/admin/page_web/delete/'.$kate->id_page); ?>" title="Delete" class="icon-2 info-tooltip" onclick="return confirm('Apakah anda Akan Menghapus Record ini?')" onclick="return confirm('Apakah anda Akan Menghapus Record ini?')">  </a>
			<a href="<?php echo base_url('index.php/admin/page_web/view/'.$kate->id_page); ?>" title="View Detail" class="icon-5 info-tooltip">  </a>
					
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
