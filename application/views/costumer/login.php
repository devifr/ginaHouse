<div class="center_content">
    <div class="left_content">
            <div class="title"><span class="title_icon"> </span>My account</div>
        
        	<div class="feat_prod_box_details">
            <p class="details">
             Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.
            </p>
            
              	<div class="contact_form">
                <div class="form_subtitle">login into your account</div>
                 <?php echo form_open('customer/do_login/', 'form_login'); ?>          
                    <div class="form_row">
                    <label class="contact"><strong>Username:</strong></label>
                    <input type="text" class="contact_input" name="username" />
                    </div>  


                    <div class="form_row">
                    <label class="contact"><strong>Password:</strong></label>
                    <input type="password" class="contact_input" name="password" />
                    </div>                     

<!--                     <div class="form_row">
                        <div class="terms">
                        <input type="checkbox" name="terms" />
                        Remember me
                        </div>
                    </div> 
 -->                    
                    <div class="form_row">
                    <?php echo anchor('customer/registrasi/', "<input type='button' class='register' value='Register' />").'  '; ?>
                     <input type="submit" class="register" value="login" />
                    </div>   
                    
                  </form>     
                    
                </div>  
            
            </div>	
            
              

            

            
        <div class="clear"></div>
        </div><!--end of left content-->
        