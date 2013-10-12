 <div class="center_content">
       	<div class="left_content">
            <div class="title"><span class="title_icon"> </span>Akun</div>

        	<div class="feat_prod_box_details">
          <?php if($account->num_rows()>0){
            $row = $account->row();
          ?>
            <table>
              <tr>
                <td>Nama</td>
                <td>: <?php echo $row->nama_costumer; ?></td>
              </tr>
              <tr>
                <td>Email</td>
                <td>: <?php echo $row->email_costumer; ?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>: <?php echo str_replace('|',', ', $row->alamat_costumer); ?></td>
              </tr>
            </table>
            <div class="order">
              <table>
                <tr>
                  <td>No</td>
                  <td>No Transaksi</td>
                  <td>Tanggal Order</td>
                  <td>Cara Pembayaran</td>
                  <td>Cara Pengiriman</td>
                  <td>Total Order</td>
                  <td>Status</td>
                  <td>Konfirmasi</td>
                </tr> 
                <?php if($order->num_rows()>0){
                  foreach ($order->result() as $key => $ord) {
                ?>
                <tr>
                  <td><?php echo $key+1; ?></td>
                  <td><?php echo $ord->no_transaksi; ?></td>
                  <td><?php echo $ord->date_order; ?></td>
                  <td><?php echo $ord->cara_pembayaran; ?></td>
                  <td><?php echo $ord->date_pengiriman; ?></td>
                  <td><?php echo $ord->total; ?></td>
                  <td><?php echo $ord->status; ?></td>
                  <td><?php if($ord->status=='pending') { echo anchor('konfirmasi/'.$no_transaksi, 'Konfirmasi', ''); } ?></td>
                </tr>
                <?php 
                  }
                }else{
                  echo "Tidak Ada Proses Order";
                }
                ?>
              </table>
            </div>
            <p class="details">
             <?php echo anchor('customer/do_logout/', 'Logout', ''); ?> 
            </p>
            
        <?php  
          }
        ?>
            </div>	
            
              

            

            
        <div class="clear"></div>
        </div><!--end of left content-->