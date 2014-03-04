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
       <div class="product-info">
        	<div class="left">
            <div class="image">
				<img src="<?php echo base_url()."image/services/workers/".$worker->worker_photo; ?>" title="<?php echo $worker->worker_fname. " ".$worker->worker_lname;?>" alt="<?php echo $worker->worker_fname. " ".$worker->worker_lname;?>" height="230" width="230" /><br />
				<?php if($this->session->userdata("worker_id")==$worker->worker_id){ ?>
					<input type="button" class="button" id="update_profile_picture" value="Update Profile Picture" />
					<a href="<?php echo site_url('Home/editprofile/'.$this->session->userdata("worker_id"))?>" class="button">Edit Profile</a>
				<?php } ?>
            </div>
          </div>  
          <div class="right"><br />

            <h1><?php echo $worker->worker_fname. " ".$worker->worker_lname;?></h1>
			<div class="description">
              	<table style="font-size:larger; font-weight:600; text-align:-webkit-auto">
					
					<tr><td>WorkerID </td><td> : <?php echo $worker->worker_id;?></td></tr>
					<tr><td>Birthdate </td><td> : <?php echo $worker->worker_birthdate;?></td></tr>
					<tr><td>Email ID </td><td> : <?php echo $worker->worker_email;?></td></tr>
					<tr><td>Mobile Number </td><td> : <?php echo $worker->worker_contact;?></td></tr>
					<tr><td>Address </td><td> : <?php echo $worker->worker_address_line_1;?></td></tr>
					<tr><td>&nbsp; </td><td> &nbsp; <?php echo $worker->worker_address_line_2;?></td></tr>
					<tr><td>Area </td><td> : <?php echo $worker->worker_area;?></td></tr>
					<tr><td>City </td><td> : <?php echo $worker->worker_city;?></td></tr>
					<tr><td>State </td><td> : <?php echo $worker->worker_state;?></td></tr>
					
				</table>
			 </div>              

		  </div>
		  <?php //print_r($worker_other_detail); 
		  if(isset($worker_other_detail->id))
		  {
		  ?>
		  <div class="accordion">
          <div class="accordion-heading">Professional Detail</div>
          <div class="accordion-content">
		  	<table>
				<tbody>
					<tr>
						<td><b>Listed in </b></td>
						<td>: Plumber, Mason, Painter</td>
					</tr>
					<tr>
						<td><b>Qulification </b></td>
						<td>: <?php echo $worker_other_detail->qualification;?></td>
					</tr>
					<tr>
						<td><b>Occupation </b></td>
						<td>: <?php echo $worker_other_detail->occupation;?></td>
					</tr>
					<tr>
						<td><b>Year of Practice </b></td>
						<td>: <?php echo $worker_other_detail->years_of_practice;?></td>
					</tr>
					<tr>
						<td><b>Hobby </b></td>
						<td>: <?php echo $worker_other_detail->hobby;?></td>
					</tr>
				</tbody>
			</table>
		  </div>
        </div>
        <div class="accordion">
          <div class="accordion-heading">Office Detail</div>
          <div class="accordion-content">
		  	<table style="font-size:larger; font-weight:600; text-align:-webkit-auto">
					
					<tr><td><b>Address </b></td><td> : <?php echo $worker_other_detail->office;?></td></tr>
					
					
				</table>
		  </div>
        </div>
		<div class="accordion">
          <div class="accordion-heading">Other Detail</div>
          <div class="accordion-content">
		  	<table style="font-size:larger; font-weight:600; text-align:-webkit-auto">
					
					<tr><td><b>Affiliation </b></td><td> : <?php echo $worker_other_detail->affiliation;?></td></tr>
					<tr><td><b>Achievements </b></td><td> : <?php echo $worker_other_detail->achievment;?></td></tr>
					<tr><td><b>Awards </b></td><td> : <?php echo $worker_other_detail->awards;?></td></tr>
					<tr><td><b>LIC No </b></td><td> : <?php echo $worker_other_detail->lic_no;?></td></tr>
					
				</table>
		  </div>
        </div>
		<?php } ?> 
		
		<div id="update_photo_popup" class="white-popup mfp-hide">
			<form id="upload" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>index.php/Home/upload_it/<?php echo $this->session->userdata('worker_id');?>"> 
                <input type="file" style="color:#996699; font-size:larger" name="userfile" size="20" /> 
                <input type="submit" class="button" value="upload" /> 
            </form>
		</div> 
		<script>
			$("#update_profile_picture").click(function(){
			 	$.magnificPopup.open({
					items: {
						src: '#update_photo_popup', // can be a HTML string, jQuery object, or CSS selector
						type: 'inline'
					}
				});
			 });
		</script>
		
</div>


      <!--Middle Part End-->
      <div class="clear"></div>
    </div>
