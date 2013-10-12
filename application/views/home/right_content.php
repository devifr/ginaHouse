<script type="text/javascript" src="<?php echo js_url('jquery-1.7.2.min.js'); ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
ajax_paging = function(){
    // $(".pagination-page a").click(function() {               
               $.ajax({
                 type: "GET",
                 url: $(".pagination-page a").get(),
                 success: function(html){
                $("#news_ginahouse").html(html);
                  }
               });               
             // });            
       return false;
     }; 
});
</script>

        <div class="right_content">
        	<div class="languages_box">
           <form method="post" action="<?php echo base_url('index.php/home/search'); ?>"> 
            <input type="text" name="search" placeholder="Search...">
            <select name="pilihan">
               <?php if($kategori_all->num_rows()>0){
                foreach ($kategori_all->result() as $key_kategori => $kateg) {
            ?> 
              <option value="<?php echo $kateg->id_kategori; ?>"><?php echo $kateg->nama_kategori; ?></option>
            <?php }
          }
          ?>
            </select> 
            <input type="submit" name="btn_search" value="Search"> 
          </form>
          </div>                
                
              <div class="cart">
                  <div class="title"><span class="title_cart"></span>My cart</div>
                  <div class="home_cart_content">
                  <?php $isi_cart =  $this->cart->contents();
                  if(count($isi_cart)>0){
                    echo $this->cart->total_items().' Item'; ?> | <span class="red">TOTAL: <?php echo 'Rp.'.$this->cart->format_number($this->cart->total()); ?></span>
                  <?php
                  }else{
                    echo "No Item Yet";
                  }
                  ?>
                  </div>
                  <?php echo anchor('cart/', 'view cart', 'class=view_cart'); ?>
              
              </div>
                       
             <div class="right_box">
              <?php if($promotions->num_rows()>0){
            ?>
              <div class="title"><span class="title_promotion"></span>Promotions</div> 
                   <?php foreach ($promotions->result() as $key_promosi => $promosi) {
            ?>
                    <div class="new_prod_box">
                        <?php echo anchor('product/detail/'.$promosi->id_product, $promosi->nama_product); ?>
                        <div class="new_prod_bg">
                        <span class="new_icon"><?php echo $promosi->diskon_product; ?>%</span>
                        <?php echo anchor('product/detail/'.$promosi->id_product, "<img src='".catalog_url($promosi->foto_product)."' alt='".$promosi->nama_product."' title='".$promosi->nama_product."' class='image_featured' border='0' />"); ?>
                        </div>           
                    </div>
            <?php } ?>
                
            <?php }
            ?>

             </div>
             
             <div class="right_box">
             <?php if($kategori->num_rows()>0){
            ?>
              <div class="title"><span class="title_category"></span>Categories</div> 
                
                <ul class="list">
            <?php foreach ($kategori->result() as $key_kate => $kate) {
            ?>
                <li><?php echo anchor('product/category/'.$kate->id_kategori, $kate->nama_kategori); ?></a></li>
            <?php } ?>
                </ul>
            <?php }
            ?>
            <?php
            echo form_open('product/search_price');
              echo form_dropdown('price', $range,'');  
              echo form_submit('cari', 'Cari');
              echo form_close();
            ?>
          </div>            	
                    <div class="clear"></div>
        
             <div class="title"><span class="title_news"></span>News</div> 
             <div class="about">
             <p>
             <img src="<?php echo base_url ('asset/images/frontend/about.gif'); ?>" alt="News" title="News" class="right" />
             <div id="news_ginahouse">
             <?php if($lists->num_rows()>0){
                   foreach ($lists->result() as $key_list => $list) {
                    echo "<h3>$list->judul_news</h2>";
                    echo substr($list->description_news, 0,10);
                    if(strlen($list->description_news)>=10){
                      echo anchor('home/news_detail/'.$list->id_news, ' Read More', '');
                    }
                   } 
                   echo "<form id='myform'><div id='garis'>".$pagination_news."</div></form>";
                 }else{
                  echo "Data Tidak Ada";
                 }
            ?>
          </div>
             </p>
             
             </div>
        
        </div><!--end of right content-->
    <div class="clear"></div>
<div class="cs">
  <table border="0" cellpadding="4">
  <tbody>
  <tr>
  <td width="125"><strong>Customer Service</strong></td>
  </tr>
  <tr>
  <td><br><a href="ymsgr:sendIM?maya@yahoo.com"> <img style="border: none; width: 65px;" src="http://opi.yahoo.com/online?u=alamtopani@yahoo.com&amp;m=g&amp;t=12&amp;l=us" alt=""></a></td>
  </tr>
  </tbody>
  </table>
</div>