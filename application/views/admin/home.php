<link rel="stylesheet" href="<?php echo base_url('asset/css/jquery-ui.css');?>" />
<link href="<?php echo base_url('asset/css/examples.css');?>" rel="stylesheet" type="text/css">
<script src="<?php echo base_url('asset/js/jquery-1.9.1.js'); ?>"></script>
<script src="<?php echo base_url('asset/js/jquery-ui.js'); ?>"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url('asset/js/jquery.js'); ?>"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url('asset/js/chart/jquery.flot.js'); ?>"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url('asset/js/chart/jquery.flot.categories.js'); ?>"></script>

<!--chart-->
	<script type="text/javascript">
	var $s = jQuery.noConflict();
	$(document).ready(function(){
		
		var data = [ 
					<?php for ($i=0; $i < $jml_data-1; $i++) { 
						echo "['".$date_join[$i]."',".$konsumen[$i]."],";
					} ?> 
		];

		$s.plot("#placeholder", [ data ], {
			series: {
				bars: {
					show: true,
					barWidth: 0.6,
					align: "center"
				}
			},
			xaxis: {
				mode: "categories",
				tickLength: 0
			}
		});
	});
	</script>
	
	<script type="text/javascript">
	var $s = jQuery.noConflict();
	$(document).ready(function(){
		var data = [ 
					<?php for ($j=0; $j < $jml_data_order-1; $j++) { 
						echo "['".$date_order[$j]."',".$order[$j]."],";
					} ?> 

		];

		$s.plot("#placeholder2", [ data ], {
			series: {
				bars: {
					show: true,
					barWidth: 0.6,
					align: "center"
				}
			},
			xaxis: {
				mode: "categories",
				tickLength: 0
			}
		});
	});
	</script>
<script type="text/javascript">
var $s = jQuery.noConflict();
$(function() {
	$( "#tabs" ).tabs();
});
</script>
<?php echo $this->session->flashdata('msg'); ?>
<article>
	<header>
		<h1>Dashboard</h1>
	</header>
	<section>
<div id="tabs">
<ul>
<li><a href="#tabs-1">Data Konsumen</a></li>
<li><a href="#tabs-2">Data Order</a></li>
</ul>
<div id="tabs-1">
		<div class="demo-container">
			<div id="placeholder" class="demo-placeholder"></div>
		</div>
</div>
<div id="tabs-2">
		<div class="demo-container">
			<div id="placeholder2" class="demo-placeholder"></div>
		</div>
</div>
</div>

	</section>
</article>