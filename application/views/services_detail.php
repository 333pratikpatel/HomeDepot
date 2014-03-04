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

<!-- Middle Part Start -->
<div id="content">
      <div class="breadcrumb"> <a href="#">Home</a> &raquo; <a href="#">Services</a> &raquo; <a href="#">Plumbers</a></div>
        <h1><?php echo $worker->worker_fname. " ".$worker->worker_lname;?></h1>
        <div class="product-info">
          <div class="left">
            <div class="image">
				<img src="<?php echo base_url()."image/services/workers/".$worker->worker_photo; ?>" title="<?php echo $worker->worker_fname. " ".$worker->worker_lname;?>" alt="<?php echo $worker->worker_fname. " ".$worker->worker_lname;?>" height="200" width="200" />
           </div>
          </div>
          <div class="right">
            <div class="description"> <span>Email ID:</span> <?php echo $worker->worker_email;?><br /><br />
              <span>MobileNo:</span> <?php echo $worker->worker_contact;?><br /><br />
              <span>Area:</span> <?php echo $worker->worker_area;?><br /><br />
              <span>City:</span> <?php echo $worker->worker_city;?><br /><br />
			  <span>State:</span> <?php echo $worker->worker_state;?><br /><br />
			  <?php print_r($service_category_id); ?>
			 </div>
            <div id="gallery" class="gallery-popup">
				<?php
					foreach($worker_work_details as $work_detail)
					{
						//echo $work_detail->work_description;
				?>
						<a href="<?php echo base_url()."image/services/work_detail/".$work_detail->work_photo; ?>" title="<h3><?php echo $work_detail->work_title; ?></h3><?php echo $work_detail->work_description; ?>"><img src="<?php echo base_url()."image/services/work_detail/".$work_detail->work_photo; ?>" width="50" height="50" alt="Work Detail" /></a>
				<?php	}
					//print_r($worker_work_details);
				?>
				<!-- <a href="<?php //echo base_url()."image/product/responsive.jpg" ?>">Image 1</a>-->
				<!--<a href="http://localhost/HomeDepot/image/slider/slide-1.jpg" title="<h3>Title</h3>Hello this is a very long description. Hello this is a very long description. Hello this is a very long description. Hello this is a very long description. Hello this is a very long description. Hello this is a very long description. Hello this is a very long description."><img src="http://localhost/HomeDepot/image/services/plumbers/GUJVDR11092001.jpg" width="50" height="50" /></a>
				<a href="http://localhost/HomeDepot/image/slider/slide-2.jpg" title="Image 2"><img src="http://localhost/HomeDepot/image/services/plumbers/GUJVDR11092001.jpg" width="50" height="50" /></a>
				<a href="http://localhost/HomeDepot/image/slider/slide-3.jpg" title="Image 3"><img src="http://localhost/HomeDepot/image/services/plumbers/GUJVDR11092001.jpg" width="50" height="50" /></a>-->
			</div>
            
          </div>
		  <div class="cart">
              <div>
			  <a href="#" class="wishlist" >Add to Favourite</a>
			  <a href="#" class="wishlist" >Ask to Expert</a>
			  <a href="#view-detail-popup" class="wishlist" >View Details</a>
			  <a href="#enquiry-popup" class="wishlist">Enquiry Now</a>
			  <!-- <a href="#gallery-popup" class="wishlist" >View Pics</a> -->
			  <a href="<?php echo site_url('Home/show_worker_map/'.$worker->worker_id)?>" class="wishlist" target="_blank" >View Map</a>
			  <a href="#feedback-popup" class="wishlist" >Send Feedback</a>
            </div>
        </div>
		
		<!-- Popup window start here -->
			
			<div id="view-detail-popup" class="white-popup mfp-hide">
				<form name="worker_id_form" id="worker_id_form" action="" method="get">
				<!--<label><span>Area :</span></label>-->
				<div>
				<input type="text" class="typeahead"  name="worker_id_input" id="worker_id_input" placeholder="Enter Worker ID" /><br /><br />
				<input class="button" type="submit" value="View Profile" />
				</div>
			</form>
			</div>
			
			<div id="enquiry-popup" class="white-popup mfp-hide">
				<form action="<?php echo base_url().'index.php/Home/addEnquiry' ?>" enctype="multipart/form-data" method="post"><br /><br />
						<h1 align="center">Enquiry Now</h1>
						
						<table style="padding-left:50px">
							<tr>
								<td><label><b>Name:</b></label></td>
								<td><input type="text" name="user_name" /></td>
							</tr>
							<tr>
								<td><label><b>Email ID:</b></label></td>
								<td><input type="text" name="user_email" /></td>
							</tr>
							<tr>
								<td><label><b>Mobile No:</b></label></td>
								<td><input type="text" name="user_phone" /></td>
							</tr>
							<tr>
								<td><label><b>Address:</b></label></td>
								<td><textarea name="user_address"></textarea></td>
							</tr>
							<tr>
								<td><label><b>Enquiry Details:</b></label></td>
								<td><textarea name="user_enquiry"></textarea></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" class="button" value="Submit">&nbsp;&nbsp;<input type="submit" class="button" value="Cancel"></td>
							</tr>
							<input type="hidden" name="worker_id" value="<?php echo $worker->worker_id ?>" />
						</table>
					</form>
			</div>
			
			<div id="feedback-popup" class="white-popup mfp-hide">
				<form action="<?php echo base_url().'index.php/Home/addFeedback' ?>" enctype="multipart/form-data" method="post"><br /><br />
						<h1 align="center">Send Feedback</h1>
						
						<table style="padding-left:50px">
							<tr>
								<td><label><b>Name:</b></label></td>
								<td><input type="text" name="user_name" /></td>
							</tr>
							<tr>
								<td><label><b>Email ID:</b></label></td>
								<td><input type="text" name="user_email" /></td>
							</tr>
							<tr>
								<td><label><b>Mobile:</b></label></td>
								<td><input type="text" name="user_phone" /></td>
							</tr>
							<tr>
								<td><label><b>Feedback:</b></label></td>
								<td><textarea name="user_feedback"></textarea></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" class="button" value="Submit">&nbsp;&nbsp;<input type="submit" class="button" value="Cancel"></td>
							</tr>
							<input type="hidden" name="worker_id" value="<?php echo $worker->worker_id ?>" />
						</table>
					</form>
			</div>	
		<!-- Popup window end here -->
			
      </div>
<!-- Middle Part End -->

<script>
$( "#worker_id_form" ).submit(function( event ) {
  //alert( "Handler for .submit() called." );
  event.preventDefault();
  var id = $("#worker_id_input").val();
  window.location.href = '<?php echo site_url('Home/profile/')?>'+'/'+id;
});
</script>