<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
	<a href=""><img src="<?php echo base_url(); ?>asset/images/shared/logo.png" width="156" height="40" alt="" /></a>
	</div>
	<!-- end logo -->
	
	<!--  start top-search -->
	<div id="top-search">
		<form method="post" action="<?php echo base_url('index.php/admin/home/search'); ?>">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td><input type="text" name="search" value="Search" onblur="if (this.value=='') { this.value='Search'; }" onfocus="if (this.value=='Search') { this.value=''; }" class="top-search-inp" /></td>
		<td>
		 
		<select name="pilihan"  class="styledselect">
			<option value="0">All</option>
			<option value="1">Products</option>
			<option value="2">Categories</option>
			<option value="3">Costumer</option>
			<option value="4">News</option>
		</select> 
		 
		</td>
		<td>
		<input type="submit" src="<?php echo base_url(); ?>asset/images/shared/top_search_btn.gif"  />
		</td>
		</tr>
		</table>
		</form>
	</div>
 	<!--  end top-search -->
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
		<div id="nav-right">
		
			<div class="nav-divider">&nbsp;</div>
			<div class="showhide-account"><a href="<?php echo base_url('index.php/admin/login_admin/edit/1'); ?>"><img src="<?php echo base_url(); ?>asset/images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></a></div>
			<div class="nav-divider">&nbsp;</div>
			<a href="<?php echo base_url('index.php/admin/login_admin/doLogout'); ?>" id="logout"><img src="<?php echo base_url(); ?>asset/images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
			<div class="clear">&nbsp;</div>
		
			<!--  start account-content -->	
		<!-- 	<div class="account-content">
			<div class="account-drop-inner">
				<a href="" id="acc-settings">Kategori</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-details">Product </a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-project">Costumer</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-inbox">Pembelian</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-stats"> Pembelian Detail</a> 
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-stats"> Pengiriman</a> 
			</div>
			</div>
		 -->	<!--  end account-content -->
		
		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table">
		
		<ul class="select"><li><a href="#nogo"><b>Kategori</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="<?php echo base_url('index.php/admin/kategori'); ?>">View All</a></li>
				<li><a href="<?php echo base_url('index.php/admin/kategori/input'); ?>">Add Kategori</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		                    
		<ul class="select"><li><a href="#nogo"><b>Product</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="<?php echo base_url('index.php/admin/Product'); ?>">View All </a></li>
				<li><a href="<?php echo base_url('index.php/admin/Product/input'); ?> "> Add Product</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="#nogo"><b>Costumer</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="<?php echo base_url('index.php/admin/Costumer'); ?>">View All </a></li>
				<li><a href="<?php echo base_url('index.php/admin/Costumer/input'); ?> "> Add Costumer</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="#nogo"><b>Pembelian</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="<?php echo base_url('index.php/admin/Pembelian'); ?>">View All </a></li>			 
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>

		<div class="nav-divider">&nbsp;</div>
		                    
		<ul class="select"><li><a href="#nogo"><b> Pengiriman</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li><a href="<?php echo base_url('index.php/admin/Pengiriman'); ?>">View All </a></li>
				<li><a href="<?php echo base_url('index.php/admin/Pengiriman/input'); ?> "> Add Pengiriman</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>

		<div class="nav-divider">&nbsp;</div>
		                    
		<ul class="select"><li><a href="#nogo"><b> Konfirmasi </b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li><a href="<?php echo base_url('index.php/admin/Konfirmasi'); ?>">View All </a></li>
				<li><a href="<?php echo base_url('index.php/admin/Konfirmasi/input'); ?> "> Add Konfirmasi</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>

		<div class="nav-divider">&nbsp;</div>
		                    
		<ul class="select"><li><a href="#nogo"><b> Lainnya </b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li><a href="<?php echo base_url('index.php/admin/kurir/'); ?>">Kurir</a></li>
				<li><a href="<?php echo base_url('index.php/admin/page_web/'); ?> ">Page Web</a></li>
				<li><a href="<?php echo base_url('index.php/admin/news/'); ?> ">News</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>


		
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->
 
 <div class="clear"></div>
 
