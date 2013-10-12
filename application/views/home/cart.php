<div class="center_content">
       	<div class="left_content">
            <div class="title"><span class="title_icon"><img src="<?php echo base_url('images/bullet1.gif'); ?>" alt="" title="" /></span>My cart</div>
        
          <div class="feat_prod_box_details">
          <?php if($cart=$this->cart->contents()){ ?>
          <?php echo form_open('cart/update_qty', 'update'); ?>             
            <table class="cart_table">
              <tr class="cart_title">
                  <td>Item pic</td>
                  <td>Item name</td>
                    <td>Unit price</td>
                    <td>Qty</td>
                    <td>Subtotal</td>               
                    <td>Remove</td>               
                </tr>
              <?php foreach ($cart as $key => $item) {
                $i = 1;
                $option = $this->cart->product_options($item['rowid']);
              ?>
            	<tr>
                	<td><img src="<?php echo base_url('catalog/'.$option['image']); ?>" alt="" title="" border="0" class="cart_thumb" /></td>
                	<td><?php echo $item['name']; ?></td>
                    <td><?php echo 'Rp.'.$this->cart->format_number($item['price']); ?></td>
                    <td><?php echo form_input('qty['.$item['rowid'].']', $item['qty'],'size=3'); ?></td>
                    <td><?php echo 'Rp.'.$this->cart->format_number($item['subtotal']); ?></td>               
                    <td><?php echo anchor('cart/remove_item/'.$item['rowid'], 'Remove', '');; ?></td>               
                </tr>
              <?php 
                $i++;
                } ?>          
                <tr>
                  <td colspan="4" class="cart_total"><span class="red">Total :</span></td>
                <td><?php echo 'Rp.'.$this->cart->format_number($this->cart->total()); ?></td>                
                </tr>                              
                <tr>
                  <td colspan="6" align="left">
                  <?php echo form_submit('update', 'Update'); ?></td>                
                </tr>
            </table>
            <?php echo form_close(); ?>
            <?php echo anchor('home', "&lt; continue", 'class="continue"'); ?>            
            <?php echo anchor('checkout', "checkout &gt;", 'class="checkout"'); ?>            
            <?php }else{
              echo "No Item in Cart Yet";
            } ?>  
            </div>
        <div class="clear"></div>
        </div><!--end of left content-->