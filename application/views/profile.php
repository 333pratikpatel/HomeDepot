
<!-- Left part start -->
<div id="column-left">
        <!--Services Start -->
        <div class="box">
          <div class="box-heading">Services</div>
          <div class="box-content box-category">
            <?php
					foreach($services as $service) {
				?>
						<li class="custom_id61"><a href="<?php echo site_url('Home/services/'.$service->service_type)?>"><?php echo $service->service_type; ?></a></li>
				<?php
					}
				?>

          </div>
        </div>
        <!--Services End -->
      </div>
<!--Left part end -->

<!-- Middle Part Start -->

       

<div id="content">
        
    
        
	
	<div class="product-grid">
	
		  <div>
            <div class="image"><a href="<?php echo base_url().'index.php/Home/viewprofile/'.$worker_id; ?>"><img src="<?php echo base_url(); ?>image/profile.png" title="" alt="" height="80px" width="80px" /></a></div>
            <div class="name"><a href="<?php echo base_url().'index.php/Home/viewprofile/'.$worker_id; ?>">View Profile</div>
          </div>
		  
		  <div>
            <div class="image"><a href="<?php echo base_url().'index.php/Home/feedback/'.$worker_id; ?>"><img src="<?php echo base_url(); ?>image/feedback.png" title="" alt="" height="80px" width="80px" /></a></div>
            <div class="name"><a href="<?php echo base_url().'index.php/Home/feedback/'.$worker_id; ?>">Feedback</div>
          </div>
		  
		  <?php if($this->session->userdata("worker_id")==$worker_id){ ?>
		  <div>
            <div class="image"><a href="<?php echo base_url().'index.php/Home/enquiry/'.$worker_id; ?>"><!--<span style="background-image:url(<?php //echo base_url(); ?>image/facebook.png) ">3 new</span>--><img src="<?php echo base_url(); ?>image/enquiry.png" title="" alt="" height="80px" width="80px" /></a></div>
            <div class="name"><a href="<?php echo base_url().'index.php/Home/enquiry/'.$worker_id; ?>">Enquiry</div>
          </div>
		  <?php } ?>
		  
		  <!--<div>
            <div class="image"><a href=""><img src="<?php //echo base_url(); ?>image/message.png" title="" alt="" height="80px" width="80px" /></a></div>
            <div class="name"><a href="">Message</div>
          </div>-->
		  
		  <div>
            <div class="image"><a href="<?php echo base_url().'index.php/Home/expert/'.$worker_id; ?>"><img src="<?php echo base_url(); ?>image/expert.jpg" title="" alt="" height="80px" width="80px" /></a></div>
            <div class="name"><a href="<?php echo base_url().'index.php/Home/expert/'.$worker_id; ?>">Expert</div>
          </div>
		  
		  <div>
            <div class="image"><a href="<?php echo base_url().'index.php/Home/work/'.$worker_id; ?>"><img src="<?php echo base_url(); ?>image/work-detail.png" title="" alt="" height="80px" width="80px" /></a></div>
            <div class="name"><a href="<?php echo base_url().'index.php/Home/work/'.$worker_id; ?>">Work Detail</div>
          </div>
		 
        </div>
        
        

	
      </div>
      <!--Middle Part End-->
      <div class="clear"></div>
   
