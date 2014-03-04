<!-- Left part start -->
<div id="column-left">
        <!--Services Start -->
        <div class="box">
         <div class="box-heading">Services</div>
          <div class="box-content box-category">
            <ul id="cat_accordion">
				  <?php
					foreach($services as $service) {
				?>
						<li class="custom_id61"><a href="<?php echo site_url('Home/services/'.$service->service_type)?>"><?php echo $service->service_type; ?></a></li>
				<?php
					}
				?>
                </ul>
          </div>
        </div>
        <!--Services End -->
      </div>
<!--Left part end -->

<div id="content">
  <!--Breadcrumb Part Start-->
  <div class="breadcrumb"> <a href="index-2.html">Home</a> &raquo; <a href="#">Plumbers</a>
  </div>
  <!--Breadcrumb Part End-->
  <h1>Plumbers</h1>
	
	<!-- Subcategory menu starts here -->
	<div id="tabs" class="htabs"> 
	
	<?php
	  foreach($service_subcategories as $subcategory1){
	?>
		<a href="<?php echo "#".$subcategory1->service_subcategory_id; ?>"> <?php echo $subcategory1->service_subtype; ?></a>
		<?php //echo "<a href='$subcategory1->service_subcategory_id'>hello</a>"; ?>
	<?php } ?>
	</div>
			
		<?php
		foreach($service_subcategories as $subcategory){ 
		 ?>
		<!-- Subcategory menu ends here -->
		
		<!--Product List Start-->
		<div id="<?php echo $subcategory->service_subcategory_id; ?>" class="tab-content">
        	<div class="product-list">
          	<?php foreach($worker_list as $worker) { 
		  		if($worker->worker_service_subcategory_id==$subcategory->service_subcategory_id){?>
		  		<div>
            	<div class="left">
              		<div class="image"><a href="<?php echo site_url('Home/services_detail')?>"><img src="<?php echo base_url()."image/services/plumbers/".$worker->worker_photo; ?>" title="<?php echo $worker->worker_fname. " ".$worker->worker_fname;?>" alt="<?php echo $worker->worker_fname. " ".$worker->worker_fname;?>" /></a>
					</div>
              		<div class="name"><a href="<?php echo site_url('Home/services_detail')?>"><?php echo $worker->worker_fname. " ".$worker->worker_fname;?></a>
					</div>
			  		<div class="description"><?php echo $worker->worker_contact;?>
					</div>
              		<div class="rating"><img src="<?php echo base_url()."image/stars-" . $worker->worker_rating .".png"; ?>" alt="Based on 1 reviews." />
					</div>
            	</div>
		  		</div>
		  <?php 
		  	 }
		    }
			?>
			</div>
			</div>
		<?php
		   }
		 ?>
		 <script>
	  	$(document).ready(function(){
		  $('#tabs a').tabs();
		});
      </script>
        <!--Product List End-->
        <!--Pagination Part Start-->
        <div class="pagination">
          <div class="links"> <b>1</b> <a href="#">2</a> <a href="#">&gt;</a> <a href="#">&gt;|</a></div>
          <div class="results">Showing 1 to 15 of 16 (2 Pages)</div>
        </div>
        <!--Pagination Part End-->
      </div>