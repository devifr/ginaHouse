       <div class="center_content">
       	<div class="left_content">
            <div class="title"><span class="title_icon"> </span>Register</div>
        
        	<div class="feat_prod_box_details">
            <p class="details">
             <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud. -->
            </p>
            
              	<div class="contact_form">
                <div class="form_subtitle">create new account</div>
                 <?php echo form_open('customer/do_registrasi/', 'form_registrasi'); ?>          

                    <div class="form_row">
                    <label class="contact"><strong>Nama:</strong></label>
                    <input type="text" name="nama_costumer" class="contact_input" />
                    </div>

                    <div class="form_row">
                    <label class="contact"><strong>Username:</strong></label>
                    <input type="text" name="user_name" class="contact_input" />
                    </div>  


                    <div class="form_row">
                    <label class="contact"><strong>Password:</strong></label>
                    <input type="password" name="password" class="contact_input" />
                    </div> 

                    <div class="form_row">
                    <label class="contact"><strong>Email:</strong></label>
                    <input type="text" name="email_costumer" class="contact_input" />
                    </div>


                    <div class="form_row">
                    <label class="contact"><strong>Alamat:</strong></label>
                    <input type="text" name="alamat_costumer" class="contact_input" />
                    </div>
                    

                    <div class="form_row">
                        <div class="terms">
                        <input type="checkbox" name="terms" />
                        I agree to the <a href="#">terms &amp; conditions</a>                        </div>
                    </div> 

                    
                    <div class="form_row">
                    <input type="submit" class="register" value="register" />
                    </div>   
                  </form>     
                </div>  
            
          </div>
            
        <div class="clear"></div>
        </div><!--end of left content-->
