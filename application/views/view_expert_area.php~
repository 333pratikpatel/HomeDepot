<!-- Multi Select Part Start -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>stylesheets/multiselect/jquery.multiselect.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>stylesheets/multiselect/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>stylesheets/multiselect/jquery.multiselect.filter.css" />
		<!--<link rel="stylesheet" type="text/css" href="assets/prettify.css" />-->
		<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" />
		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
		<!-- <script type="text/javascript" src="assets/prettify.js"></script> -->
		<script type="text/javascript" src="<?php echo base_url(); ?>javascripts/multiselect/jquery.multiselect.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>javascripts/multiselect/jquery.multiselect.filter.js"></script>
		<script type="text/javascript">
		$(function(){
			$("select").multiselect({
				noneSelectedText: 'Select Expert Area',
			});
		});
		</script>

	<!-- Multi Select Part End -->


<!-- Middle Part Start -->
<div id="content">
        
        <h1>Expert Area</h1>
       
        <!--Product List Start-->
        <div class="product-list">
         
		  <?php
		  	//foreach($feedback as $data)
			//{
			//print_r($expert_area_in);
			$group = array();
			foreach($expert_area_in as $expert)
			{
				$group[$expert->service_type][$expert->worker_expertice_id] = $expert->worker_expertice_name;
			}
			
			//print_r($expert_area_all);
			$expert_area_list = array();
			foreach($expert_area_all as $list)
			{
				$expert_area_list[$list->service_type][$list->worker_expertice_id] = $list->worker_expertice_name;
			}
			print_r($expert_area_list);
			//print_r($group);
			$i=0;
			foreach($group as $id=>$category)
			{
		 ?>
		 	<div class="accordion">
			  <div class="accordion-heading"><?php $service_type=$id;echo $service_type; ?></div>
          
        
			  <div class="accordion-content" <?php if($i==0) { echo 'style="display:block"'; $i++; }?>>
				<ul class="sitemap">
					<ul>
					<?php
					foreach($category as $id=>$expert_area)
					{
					?>
					
					  <li><b><?php echo $expert_area; ?></b></li>
					
					<?php } ?>
					</ul>
				  </ul>
				  
				  <?php
				  if($this->session->userdata("worker_id")==$worker_id){
				  	foreach($expert_area_list as $service_name=>$expert_list)
					{
					//echo $service_type." ".$service_name."<br>";
						if($service_name==$service_type)
						{
							
						?>
						<form name="expert_in" action="<?php echo site_url('Home/updateExpertArea/GUJAHD11092002');?>" method="post">
							<select title="Basic example" id="expert_area" multiple="multiple" name="expert_area[]" size="5">
								<?php foreach($expert_list as $expertice_id=>$expertice_name) {?>
									<option value="<?php echo $expertice_id ?>" <?php if(in_array($expertice_name,$category)) echo "selected"; ?>><?php echo $expertice_name; ?></option>
								<?php } ?>
				  			</select>
							<input type="submit" class="button" value="Update Expert Area" />
							</form>
						<?php
						}
				  		?>
				  
				  <?php 
				  	} 
				  }
				  ?>
			  </div>
			</div>
		 <?php	
			}
		  ?>
		  
		  
		  
		  
		  
		  <?php			
			//}
		  ?>
		  
        </div>
        <!--Product List End-->
        
      </div>
	  
	  <!-- Middle Part End -->
