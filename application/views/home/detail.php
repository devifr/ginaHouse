    <link rel="stylesheet" href="<?php echo css_url('lightbox.css'); ?>" type="text/css" media="screen" />    
    <script src="<?php echo js_url('prototype.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo js_url('scriptaculous.js?load=effects'); ?>" type="text/javascript"></script>
    <script src="<?php echo js_url('lightbox.js'); ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo js_url('java.js'); ?>"></script>
       <div class="center_content">
       	<div class="left_content">
        <?php if($product->num_rows()>0){
                $prod = $product->row();
        ?>
        	<div class="crumb_nav">
            <?php echo anchor('', 'home')."&gt;&gt; $prod->nama_product"; ?> 
            </div>
            <div class="title"><span class="title_icon"> </span>
                <?php echo $prod->nama_product; ?></div>
        
        	<div class="feat_prod_box_details">
            
            	<div class="prod_img">
                <!-- <a href="details.html"><img src="" alt="" title="" border="0" /></a>
                <br /><br /> -->
                <a href="<?php echo  base_url("catalog/$prod->foto_product"); ?>" rel="lightbox"><img src="<?php echo  base_url("catalog/$prod->foto_product"); ?>" alt="<?php echo $prod->nama_product; ?>" title="<?php echo $prod->nama_product; ?>" border="0" class="image_featured" /></a>
                </div>
                
                <div class="prod_det_box">
                	<div class="box_top"></div>
                    <div class="box_center">
                    <div class="prod_title">Details</div>
                    <p class="details"><?php echo $prod->deskripsi_product; ?></p>
                    <div class="price"><strong>PRICE:</strong> <span class="red"><?php echo $prod->harga_product; ?></span></div>
<!--                     <div class="price"><strong>COLORS:</strong> 
                    <span class="colors"><img src="images/color1.gif" alt="" title="" border="0" /></span>
                    <span class="colors"><img src="images/color2.gif" alt="" title="" border="0" /></span>
                    <span class="colors"><img src="images/color3.gif" alt="" title="" border="0" /></span>                    </div>
 -->                    
                    <?php echo anchor('cart/insert_cart/'.$prod->id_product,"<img src='".images_url('frontend/order_now.gif')."' alt='Order Now' title='Order Now' border='0' />", 'class=more'); ?>
                    <div class="clear"></div>
                    </div>
                    
                    <div class="box_bottom"></div>
                </div>    
            <div class="clear"></div>
            </div>	
            
              
            <div id="demo" class="demolayout">

                <ul id="demo-nav" class="demolayout">
                <li><a class="active" href="#tab1">More details</a></li>
                <li><a class="" href="#tab2">Related Product</a></li>
                </ul>
            <div class="tabs-container">
                    <div style="display: block;" class="tab" id="tab1">
                    <p class="more_details"><?php echo $prod->deskripsi_product; ?></p>
                    </div>
                    <div style="display: none;" class="tab" id="tab2">
                    <?php 
                    if($prod->related_product != ''){
                    $related = explode(',', $prod->related_product);
                    $jml_rel = count($related);
                    for ($i=0; $i < $jml_rel-1; $i++) { 
                        $prod_rel = $this->product->get_by_id($related[$i])->row();
                    ?>
                    <div class="new_prod_box">
                        <?php echo anchor('product/detail/'.$prod_rel->id_product, $prod_rel->nama_product);?>
                        <div class="new_prod_bg">
                        <?php echo anchor('product/detail/'.$prod_rel->id_product, "<img src='".catalog_url($prod_rel->foto_product)."' alt='".$prod_rel->nama_product."' title='".$prod_rel->nama_product."' class='image_featured' border='0' />");?>
                        </div>           
                    </div>
                    <?php } 
                    }else{
                        echo "<p class=more_details>Data Tidak Ada</p>";
                    }
                    ?>                    
                    <div class="clear"></div>
                            </div>	
            
            </div>


			</div>
            

            
        <div class="clear"></div>
        <?php } ?>
        </div><!--end of left content-->
<script type="text/javascript">

var tabber1 = new Yetii({
id: 'demo'
});
</script>