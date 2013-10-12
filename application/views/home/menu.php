        <div id="menu">
            <ul>                                                                       
            <li class="selected"><?php echo anchor('','Home'); ?></li>
            <li><?php echo anchor('product/','Product'); ?></li>
            <li><?php echo anchor('page/order/','Cara Order'); ?></li>
            <li><?php echo anchor('page/contact/','Hubungi Kami'); ?></li>
            <li><?php echo anchor('page/about/','Tentang Kami'); ?></a></li>
            <?php if($this->session->userdata('username')==''){ ?>
            <li><?php echo anchor('customer/login/','Login|Register'); ?></li>
            <?php } ?>
            <?php if($this->session->userdata('username')!=''){ ?>
            <li><?php echo anchor('customer/','Akun'); ?></a></li>
            <?php } ?>
            </ul>
        </div>     
            
            
       </div> 
