        <div class="center_content">
       	<div class="left_content">
        	
            <?php if($products->num_rows()>0){
            ?>
            <div class="title"><span class="title_icon"> </span>Products</div>
            <?php foreach ($products->result() as $key_prod => $prod) {
            ?>
        	<div class="feat_prod_box">
            
            	<div class="prod_img">
                    <?php echo anchor('product/detail/'.$prod->id_product, "<img src='".base_url('catalog/'.$prod->foto_product)."' alt='$prod->nama_product' title=$prod->nama_product; class='image_featured' />", 'class=more');?></div>
                
                <div class="prod_det_box">
                	<div class="box_top"></div>
                    <div class="box_center">
                    <div class="prod_title"><?php echo $prod->nama_product;?></div>
                    <p class="details"><?php echo $prod->deskripsi_product;?></p>
                    <?php echo anchor('product/detail/'.$prod->id_product, '- more details -', 'class=more');?>
                    <div class="clear"></div>
                    </div>
                    <div class="box_bottom"></div>
                </div>    
            <div class="clear"></div>
            </div>
            <?php
                }
                echo $pagination; 
            }
            ?>	   
        <div class="clear"></div>
        </div><!--end of left content-->