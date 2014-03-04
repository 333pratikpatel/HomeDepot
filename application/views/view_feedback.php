<!-- Middle Part Start -->
<div id="content">
        
        <h1>Feedback</h1>
        
        <!--Product List Start-->
        <div class="product-list">
         
		  <?php
		  	foreach($feedback as $data)
			{
		  ?>
		  
		  
		  <div>
            <div class="left">
              <div class="image"><a href="product.html"><img src="<?php echo base_url(); ?>image/user.png" title="" alt="" /></a></div>
              <div class="name"><a href="product.html"><?php if($data!=""){ echo $data->name." Says : "; } else{ echo "User Says : ";} ?></a></div>
              <div class="description"><?php echo $data->feedback; ?></div>
              <div>
			  	<?php if($this->session->userdata("worker_id")==$worker_id){ ?>
                	<input type="button" class="button" value="Delete">
				<?php } ?>
              </div>
            </div>
          </div>
		  
		  <?php			
			}
		  ?>
		  
        </div>
        <!--Product List End-->
        
      </div>
	  
	  <!-- Middle Part End -->