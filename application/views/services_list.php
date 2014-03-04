<?php
/*if($_SERVER['REQUEST_METHOD']=="GET") {
	if(isset($_POST['filter_option'])) {
		echo "<script>$('#filter_option').val('".$_POST['filter_option']."');</script>";
	}
	else
	{
		echo "<script>$('#filter_option').val('Distance');</script>";
	}
}*/
//if(isset($_POST['filter_option']))
//{ 
	//echo "<script>alert('".$_POST['filter_option']."')} 
?>
<style>
.tt-query,
.tt-hint {
    width: 396px;
    height: 30px;
    padding: 8px 12px;
    font-size: 24px;
    line-height: 30px;
    border: 2px solid #ccc;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
    outline: none;
}

.tt-query {
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}

.tt-hint {
    color: #999
}

.tt-dropdown-menu {
    width: 300px ;
    margin-top: 12px;
    padding: 8px 0;
    background-color: #fff;
    border: 1px solid #ccc;
    border: 1px solid rgba(0, 0, 0, 0.2);
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
    -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
    -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
    box-shadow: 0 5px 10px rgba(0,0,0,.2);
	overflow-x: hidden;
}

.tt-suggestion {
    padding: 3px 20px;
    font-size: 18px;
    line-height: 24px;
}

.tt-suggestion.tt-is-under-cursor {
    color: #fff;
    background-color: #0097cf;
}

</style>

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
		<!--Refine Search Start-->
        <div class="box">
          <div class="box-heading">Refine Search</div>
          <div class="box-content">
            <form action="<?php echo site_url('Home/searchByWork/'.$service_category);?>" method="post">
					<ul class="box-filter" style="list-style:none">
			  
				  <li><span id="filter-group">Expertise</span>
					<ul style="list-style:none">
						<?php foreach($expert_area as $expert){ ?>
							  <li>
								<input name="state[]" type="checkbox" id="filter3" value="<?php echo $expert->worker_expertice_id; ?>" >	  
								<label for="filter3"><?php echo $expert->worker_expertice_name; ?></label>
							  </li>
						<?php } ?>
					</ul>
				  </li>
			  
            </ul>
            <input id="button-filter" class="button" type="submit" value="Search" >  </div>
			</form>
        </div>
        <!--Refine Search End-->
      </div>
<!--Left part end -->



<div id="content">
  <!--Breadcrumb Part Start-->
  <div class="breadcrumb"> <a href="#">Home</a> &raquo; <a href="#">
  <?php echo $service_category; ?>
   </a>
  </div>
  <!--Breadcrumb Part End-->
  <h1><?php echo $service_category; ?></h1>
	
	<!-- Filter Part Start -->
	<div class="product-filter">
		<form action="<?php echo site_url('Home/services/'.$service_category);?>" method="post" id="filter_form">
		  <div class="sort"><span style="padding-right:5px"><img src="<?php echo base_url()."image/filter.png"; ?>" /></span><b>Filter By:</b>
		    <select id="filter_option" name="filter_option">
              <option value="Default" id="Default" selected="selected">Default</option>
              <option value="Distance" <?php if($this->input->post('filter_option')=="Distance") echo 'selected="selected"';?>>Distance</option>
              <option value="Area" <?php if($this->input->post('filter_option')=="Area") echo 'selected="selected"';?>>Area</option>
			  <option value="Name" <?php if($this->input->post('filter_option')=="Name") echo 'selected="selected"';?>>Name</option>
            </select>
		  </div>
	  </form>
        </div>
		<script>
			$("#filter_option").change(function() {
				//alert("option changed..!!");
				$("#filter_form").submit();
			});
			
		</script>
	<!-- Filter Part End -->
	
	<!-- Subcategory menu starts here -->
	
			
		<?php
		//foreach($service_subcategories as $subcategory){ 
		 ?>
		<!-- Subcategory menu ends here -->
		<br />
		<!--Product List Start-->
		<!-- <div id="<?php //echo $subcategory->service_subcategory_id; ?>" class="tab-content"> -->
        	<div class="product-list">
          	<?php $count=0;
			 foreach($worker_list as $worker) {
				 
		  		//if($worker->worker_service_subcategory_id==$subcategory->service_subcategory_id){
				//$count++;?>
		  		<div>
					<div class="left">
						<div class="image"><a href="<?php echo site_url('Home/services_detail/'.$worker->worker_id)?>"><img src="<?php echo base_url()."image/services/workers/".$worker->worker_photo; ?>" title="<?php echo $worker->worker_fname. " ".$worker->worker_lname;?>" alt="<?php echo $worker->worker_fname. " ".$worker->worker_lname;?>" width="100" height="100"/></a>
						</div>
						<div class="name"><a href="<?php echo site_url('Home/services_detail/'.$worker->worker_id)?>"><?php echo $worker->worker_fname. " ".$worker->worker_lname;?></a>
						</div>
						<div class="description" style="display:inline-flex"><span style="padding-right:5px"><img src="<?php echo base_url()."image/email.png"; ?>" /></span><?php echo $worker->worker_email;?>
						</div><br />
						<div class="description" style="display:inline-flex"><span style="padding-right:5px"><img src="<?php echo base_url()."image/house.png"; ?>" /></span><?php echo $worker->worker_area.", ".$worker->worker_city;?>
						</div><br />
						<div class="description" style="display:inline-flex"><span style="padding-right:5px"><img src="<?php echo base_url()."image/phone.png"; ?>" /></span><?php echo $worker->worker_contact;?>
						</div>
						<div class="rating"><img src="<?php echo base_url()."image/stars-" . $worker->worker_rating .".png"; ?>" alt="Based on 1 reviews." />
						</div>
						
					</div>
		  		</div>
				<?php if($worker->worker_advertise!=NULL)
					{
				?>
						<div>
							<div class="left">
								<div class="image"><img src="<?php echo base_url()."image/company/company_advertise/".$worker->worker_advertise ?>" alt="image" height="60px" width="130px"/></div>
							</div>
						</div>
				<?php
					} 
				?>
				
		  <?php 
		  	// }
		    }
			//if($count==0) { echo "No ". $subcategory->service_subtype ." Found!"; }
			?>
			</div>
			<!-- </div> -->
		<?php
		   //}
		 ?>
		 <script>
	  	$(document).ready(function(){
		  $('#tabs a').tabs();
		});
      </script>
        <!--Product List End-->
		
		<!-- Popup Part Start -->
		<div id="area_popup" class="white-popup mfp-hide">
			<form name="area_form" id="area_form" action="<?php echo site_url('Home/searchByArea/'.$service_category);?>" method="post">
				<!--<label><span>Area :</span></label>-->
				<div>
				<input type="text" class="typeahead"  name="area_input" id="area_input" placeholder="Enter Area" /><br /><br />
				<input class="button" type="submit" value="Search" />
				</div>
			</form>
		</div>
		<div id="name_popup" class="white-popup mfp-hide">
			<form name="name_form" id="name_form" action="<?php echo site_url('Home/searchByWorkerName/'.$service_category);?>" method="post">
				<!--<label><span>Area :</span></label>-->
				<div>
				<input type="text" name="workername_input" id="workername_input" placeholder="Enter Name" /><br /><br />
				<input class="button" type="submit" value="Search" />
				</div>
			</form>
		</div>
		<!-- Popup Part End -->
			
        <!--Pagination Part Start-->
        <div class="pagination">
          <div class="links"><?php if(isset($links)) { echo $links; }?></div>
        </div>
        <!--Pagination Part End-->
      </div>
	  <div class="clear"></div>
	  <section id="carousel">
          <ul class="jcarousel-skin-opencart">
		  <?php
		  	foreach($service_advertise as $ad)
			{
		  ?>
            <li><a href="#"><img src="<?php echo base_url()."image/company/company_logo/".$ad->advertise_image; ?>" alt="brand_logo" title="brand_logo" /></a></li>
			<?php } ?>
          </ul>
        </section>
		<?php //$area_data_source = "[ 'Mercury', 'Venus', 'Earth', 'Mars', 'Jupiter', 'Saturn', 'Uranus', 'Neptune' ]";
			$area_data_source = "[".$area_list."]";
			//print_r($area_list);
		?>
		<script>
		$('#area_input').typeahead([
		{
				name: 'planets',
				//local: [ "Mercury", "Venus", "Earth", "Mars", "Jupiter", "Saturn", "Uranus", "Neptune" ]
				local: <?php echo $area_data_source; ?>
			}
		]);

			$("#filter_form").submit(function(event) {
				event.preventDefault();
				var form_value = $("#filter_option").val();
				if(form_value=="Area") {
					$.magnificPopup.open({
						items: {
							src: '#area_popup', // can be a HTML string, jQuery object, or CSS selector
							type: 'inline'
						}
					});
				}
				if(form_value=="Name"){
					$.magnificPopup.open({
						items: {
							src: '#name_popup', // can be a HTML string, jQuery object, or CSS selector
							type: 'inline'
						}
					});
				}
				if(form_value=="Default" || form_value=="Distance"){
					$(this).unbind('submit').submit();
				}
			});
		</script>