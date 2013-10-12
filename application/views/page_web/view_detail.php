<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>View Detail Page Web</h1></div>


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
<?php
if($rows->num_rows()>0){
	$row = $rows->row(); 
?>
<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
	<tr>
		<th>Title Page :</th>
		<td>
			<?php echo $row->judul_page; ?>
		</td>
	</tr>
	<tr>
		<th>Description :</th>
		<td><?php echo $row->deskripsi_page; ?></td>
	</tr>
	<tr>
		<th>Status :</th>
		<td>
			<?php if($row->status_page=='0') { echo "Non Active";} else{ echo "Active"; } ?>
		</td>
	</tr>
</table>
<?php }else{
echo "data Tidak ADa";
}?>

<!-- end id-form  -->

	</td>
	<td>

	<!--  start related-activities -->
	<!-- <div id="related-activities"> -->
		
		<!--  start related-act-top -->
<!-- 		<div id="related-act-top">
		<img src="<?php echo base_url(); ?>asset/images/forms/header_related_act.gif" width="271" height="43" alt="" />
		</div>
 -->		<!-- end related-act-top -->
		
		<!--  start related-act-bottom -->
		<!-- <div id="related-act-bottom"> -->
		
			<!--  start related-act-inner -->
			<!-- <div id="related-act-inner"> -->
			
<!-- 				<div class="left"><a href=""><img src="<?php echo base_url(); ?>asset/images/forms/icon_plus.gif" width="21" height="21" alt="" /></a></div>
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
 -->			<!-- end related-act-inner -->
<!-- 			<div class="clear"></div>
		
		</div>
 -->
		<!-- end related-act-bottom -->
	
	<!-- </div> -->
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
