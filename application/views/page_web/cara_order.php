 <div class="center_content">
       	<div class="left_content">
          <?php if($page->num_rows()>0){
            $row = $page->row();
          ?>
            <div class="title"><span class="title_icon"> </span><?php echo $row->judul_page; ?></div>
        <div class="feat_prod_box_details">
            <p class="details">
              <?php echo $row->deskripsi_page; ?>
            </p>
          <?php } ?>
            
            </div>	
            
              

            

            
        <div class="clear"></div>
        </div><!--end of left content-->