<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Search Result</h1>
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
	<?php if(isset($list_product) and $list_product->num_rows()>0){
		echo "Pencarian $kata di Product Terdapat $list_product->num_rows Data :
		<ul>";
		foreach($list_product->result() as $product){
			echo "<li>$product->nama_product</li>";
		}	
		echo "</ul>";
	}
	?>
	<?php if(isset($list_kategori) and $list_kategori->num_rows()>0){
		echo "Pencarian $kata di Kategori Terdapat $list_kategori->num_rows Data :
		<ul>";
		foreach($list_kategori->result() as $kategori){
			echo "<li>$kategori->nama_kategori</li>";
		}	
		echo "</ul>";
	}
	?>
	<?php if(isset($list_customer) and $list_customer->num_rows()>0){
		echo "Pencarian $kata di Customer Terdapat $list_customer->num_rows Data :
		<ul>";
		foreach($list_customer->result() as $costumer){
			echo "<li>$costumer->nama_costumer</li>";
		}	
		echo "</ul>";
	}
	?>
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
				<?php //echo $pagination; ?>
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
