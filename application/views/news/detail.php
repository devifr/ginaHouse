 <div class="center_content">
       	<div class="left_content">
          <?php if($news->num_rows()>0){
            $row = $news->row();
          ?>
            <div class="title"><span class="title_icon"> </span><?php echo $row->judul_news; ?></div>
        <div class="feat_prod_box_details">
            <p class="details">
              <?php echo $row->description_news; ?>
            </p>
          <?php } ?>
            
            </div>	
            
              

            

            
        <div class="clear"></div>
        </div><!--end of left content-->