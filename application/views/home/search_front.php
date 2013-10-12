        <div class="center_content">
            <div class="left_content">
        
        <h1>Hasil Pencarian</h1>
       	<?php 
        if($list_product->num_rows()>0){
            echo "Pencarian $kata di Product Terdapat $list_product->num_rows Data :
            <ul>";
            foreach($list_product->result() as $product){
                echo "<li>".anchor('product/detail/'.$product->id_product, $product->nama_product)."</li>";
            }   
            echo "</ul>";
        }else{
            echo "<h2>Data Tidak Ada</h2>";
        }
        ?>
        <div class="clear"></div>
        </div><!--end of left content-->