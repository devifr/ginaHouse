<!--  date picker script -->
<link rel="stylesheet" href="<?php echo base_url('asset/css/datepicker/zebra_datepicker.css'); ?>" type="text/css" />
<script src="<?php echo base_url('asset/js/datepicker/jquery-1.9.0.js'); ?>"></script>
<script src="<?php echo base_url('asset/js/datepicker/zebra_datepicker.js'); ?>"></script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
	$("#date_start").Zebra_DatePicker();
	$("#date_finish").Zebra_DatePicker();
});
</script>

<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Add product</h1></div>


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
		<div id="step-holder">
			<div class="step-no">1</div>
			<div class="step-dark-left"><a href="">Add product details</a></div>
			<div class="step-dark-right">&nbsp;</div>
			<div class="step-no-off">2</div>
			<div class="step-light-left">Select related products</div>
			<div class="step-light-right">&nbsp;</div>
			<div class="step-no-off">3</div>
			<div class="step-light-left">Preview</div>
			<div class="step-light-round">&nbsp;</div>
			<div class="clear"></div>
		</div>
		<!--  end step-holder -->
	
		<!-- start id-form -->
<?php echo $this->session->flashdata('msg'); ?>
<form action="<?php echo base_url('index.php/admin/product/insert_data') ?>" method="post" name="form_input" enctype="multipart/form-data">
<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
	<tr>
		<th>Nama Product</th>
		<td><input type="text" name="nama_product" class="inp-form"/></td>
	</tr>
	<tr>
		<th>Foto Product</th>
		<td><input type="file" name="foto_product" class="file_1"/></td>
	</tr>
	<tr>
		<th>Harga Product</th>
		<td><input type="text" name="harga_product" class="inp-form"/></td>
	</tr>
	<tr>
		<th>Diskon Product</th>
		<td><input type="text" name="diskon_product" class="inp-form"/></td>
	</tr>
	<tr>
		<th>Stok Product</th>
		<td><input type="text" name="stok_product" class="inp-form"/></td>
	</tr>
	<tr>
		<th>Deskripsi Product</th>
		<td><textarea name="deskripsi_product" class="form-textarea"/></textarea></td>
	</tr>
	<tr>
		<th>Kategori Product</th>
		<td><select name="kategori_id" class="styledselect">
			<?php 
			foreach($kategori->result() as $kate){
				echo "<option value=$kate->id_kategori>$kate->nama_kategori</option>";
			}
			?>
			</select>
		</td>
	</tr>
	<tr>
		<th>New Product Star</th>
		<td><input type="text" name="product_star" class="inp-form" id="date_start"/></td>
	</tr>
	<tr>
		<th>New Product Finish</th>
		<td><input type="text" name="product_finish" class="inp-form" id="date_finish"/></td>
	</tr>
	<tr>
	<th>Featured Product</th>
	<td><input type="checkbox" value='1' name="featured_product"/></td>
	</tr>
	<tr>
		<th valign='top'>Related Product</th>
		<td>
			<?php if($related->num_rows()>0){
				echo "<table border='0	'>";
				foreach ($related->result() as $key => $rproduct) {
					echo "<tr><td>".form_checkbox('related[]', $rproduct->id_product)." $rproduct->nama_product</td></tr>";
				}
				echo "</table>";
			}
			?>
		</td>
	</tr>
		<td colspan="2"><input type="submit" name="simpan" value="Simpan" class="form-submit" /></td>
	</tr>
</table>
</form>
	<!-- end id-form  -->

	</td>
	<td>

	<!--  start related-activities -->
	<div id="related-activities">
		
		<!--  start related-act-top -->
		<div id="related-act-top">
		<img src="<?php echo base_url(); ?>asset/images/forms/header_related_act.gif" width="271" height="43" alt="" />
		</div>
		<!-- end related-act-top -->
		
		<!--  start related-act-bottom -->
		<div id="related-act-bottom">
		
			<!--  start related-act-inner -->
			<div id="related-act-inner">
			
				<div class="left"><a href=""><img src="<?php echo base_url(); ?>asset/images/forms/icon_plus.gif" width="21" height="21" alt="" /></a></div>
				<div class="right">
					<h5>Add another product</h5>
					Lorem ipsum dolor sit amet consectetur
					adipisicing elitsed do eiusmod tempor.
					<ul class="greyarrow">
						<li><a href="">Click here to visit</a></li> 
						<li><a href="">Click here to visit</a> </li>
					</ul>
				</div>
				
				<div class="clear"></div>
				<div class="lines-dotted-short"></div>
				
				<div class="left"><a href=""><img src="<?php echo base_url(); ?>asset/images/forms/icon_minus.gif" width="21" height="21" alt="" /></a></div>
				<div class="right">
					<h5>Delete products</h5>
					Lorem ipsum dolor sit amet consectetur
					adipisicing elitsed do eiusmod tempor.
					<ul class="greyarrow">
						<li><a href="">Click here to visit</a></li> 
						<li><a href="">Click here to visit</a> </li>
					</ul>
				</div>
				
				<div class="clear"></div>
				<div class="lines-dotted-short"></div>
				
				<div class="left"><a href=""><img src="<?php echo base_url(); ?>asset/images/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
				<div class="right">
					<h5>Edit categories</h5>
					Lorem ipsum dolor sit amet consectetur
					adipisicing elitsed do eiusmod tempor.
					<ul class="greyarrow">
						<li><a href="">Click here to visit</a></li> 
						<li><a href="">Click here to visit</a> </li>
					</ul>
				</div>
				<div class="clear"></div>
				
			</div>
			<!-- end related-act-inner -->
			<div class="clear"></div>
		
		</div>

		<!-- end related-act-bottom -->
	
	</div>
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
