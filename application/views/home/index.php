        <div class="center_content">
       	<div class="left_content">
        	
            <?php if($featured->num_rows()>0){
            ?>
            <div class="title"><span class="title_icon"></span>Featured products</div>
            <?php foreach ($featured->result() as $key_feature => $feature) {
            ?>
        	<div class="feat_prod_box">
            
            	<div class="prod_img"><?php echo anchor('product/detail/'.$feature->id_product, "<img src='".base_url('catalog/'.$feature->foto_product)."' alt='$feature->nama_product' title=$feature->nama_product; class='image_featured' />", 'class=more');?></div>
                
                <div class="prod_det_box">
                	<div class="box_top"></div>
                    <div class="box_center">
                    <div class="prod_title"><?php echo $feature->nama_product;?></div>
                    <p class="details"><?php echo $feature->deskripsi_product;?></p>
                    <?php echo anchor('product/detail/'.$feature->id_product, '- more details -', 'class=more');?>
                    <div class="clear"></div>
                    </div>
                    <div class="box_bottom"></div>
                </div>    
            <div class="clear"></div>
            </div>
            <?php
                }
                echo $pagination_featured; 
            }
            ?>	  
           <?php if($new_products->num_rows()>0){
            ?>
           <div class="title"><span class="title_icon"></span>New products</div> 
           <div class="new_products">
           <?php foreach ($new_products->result() as $key_product => $product) {
            ?>
                    <div class="new_prod_box">
                        <a href="details.html"><?php echo $product->nama_product;?></a>
                        <div class="new_prod_bg">
                        <span class="new_icon"><img src="<?php echo base_url ('asset/images/frontend/new_icon.gif'); ?>" alt="" title="" /></span>
                        <a href="details.html"><img src="<?php echo base_url ('catalog/'.$product->foto_product); ?>" alt="<?php echo $product->nama_product;?>" title="<?php echo $product->nama_product;?>" class="image_featured" /></a>
                        </div>           
                    </div>
            <?php
                }
                echo $pagination_new; 
            echo "</div>"; 
            }
            ?>            
            
        
            
        <div class="clear"></div>
        </div><!--end of left content-->