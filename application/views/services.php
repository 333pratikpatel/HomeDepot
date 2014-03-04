<div id="content">
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"> <a href="index-2.html">Home</a> &raquo; <a href="#">Services</a> </div>
        <!--Breadcrumb Part End-->
        <h1>Services</h1>
		
        <!--Service Grid Start-->
        <div class="product-grid">
          <?php foreach($services as $service) 
		  		{
			?>
		  <div>
            <div class="image"><a href="<?php echo site_url('Home/services/'.$service->service_type)?>"><img src="<?php echo base_url().'image/services/'.$service->service_photo; ?>" title="<?php echo $service->service_type; ?>" alt="<?php echo $service->service_type; ?>" height="80px" width="80px" /></a></div>
            <div class="name"><a href="<?php echo site_url('Home/services/'.$service->service_type)?>"><?php echo $service->service_type; ?></a></div>
          </div>
		  <?php
		   }
		   ?>
        </div>
        <!--Service Grid End-->
      </div>