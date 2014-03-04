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
			$("#ssc").multiselect({
				noneSelectedText: 'Select Work Category',
			}).multiselectfilter();
		});
		</script>

	<!-- Multi Select Part End -->
<div id="container">
      <!--Left Part-->
      <div id="column-left">
        <!--Account Links Start-->
        <div class="box">
          <div class="box-heading">Account</div>
          <div class="box-content">
            <ul class="list-item">
              <li><a href="#">Login</a></li>
              <li><a href="#">Register</a></li>
              <li><a href="#">Forgotten Password</a></li>
              <li><a href="#">My Account</a></li>
              <li><a href="#">Wish List</a></li>
              <li><a href="#">Order History</a></li>
              <li><a href="#">Downloads</a></li>
              <li><a href="#">Returns</a></li>
              <li><a href="#">Transactions</a></li>
              <li><a href="#">Newsletter</a></li>
            </ul>
          </div>
        </div>
        <!--Account Links End-->
        <!--Latest Product Start-->
        <div class="box">
          <div class="box-heading">Latest</div>
          <div class="box-content">
            <div class="box-product">
              <div class="flexslider">
                <ul class="slides">
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="#"><img src="<?php echo base_url(); ?>image/product/sony_vaio_1-45x45.jpg" alt="Friendly Jewelry" /></a></div>
                      <div class="name"><a href="#">Friendly Jewelry</a></div>
                      <div class="price">$1,177.00</div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="#"><img src="<?php echo base_url(); ?>image/product/apple_cinema_30-45x45.jpg" alt="Apple Cinema 30&quot;" /></a></div>
                      <div class="name"><a href="#">Apple Cinema 30&quot;</a></div>
                      <div class="price"><span class="price-old">$119.50</span> <span class="price-new">$107.75</span></div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="#"><img src="<?php echo base_url(); ?>image/product/ipod_classic_1-45x45.jpg" alt="iPad Classic" /></a></div>
                      <div class="name"><a href="#">iPad Classic</a></div>
                      <div class="price">$119.50</div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="#"><img src="<?php echo base_url(); ?>image/product/lotto-sports-shoes-white-45x45.jpg" alt="Lotto Sports Shoes" /></a></div>
                      <div class="name"><a href="#">Lotto Sports Shoes</a></div>
                      <div class="price">$589.50</div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="#"><img src="<?php echo base_url(); ?>image/product/Jeep-Casual-Shoes-45x45.jpg" alt="Jeep-Casual-Shoes" /></a></div>
                      <div class="name"><a href="#">Jeep-Casual-Shoes</a></div>
                      <div class="price">$131.25</div>
                      <div class="clear"></div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!--Latest Product End-->
      </div>
      <!--Left End-->

      <!--Middle Part Start-->
	  
	  
      <div id="content">
	  <br />
        <h1>Edit Profile</h1>
		
        <form id="editdata" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>index.php/Home/updateprofile/<?php echo $worker->worker_id;?>">
          
        <div class="accordion">
          <div class="accordion-heading">Personal Details</div>
          <div class="accordion-content" style="display:block;">
		  	<table class="form">
              <tbody>
                <tr>
                  <td><span class="required">*</span> First Name:</td>
                  <td><input id="fn" class="large-field validate[required] text-input" type="text" value="<?php echo $worker->worker_fname;?>" placeholder="your name" name="firstname"></td>
                </tr>
                <tr>
                  <td><span class="required">*</span> Last Name:</td>
                 <td><input id="ln" class="large-field  validate[required] text-input" type="text" value="<?php echo $worker->worker_lname;?>" placeholder="your surname" name="lastname"></td>
                </tr>
				<tr>
                  <td><span class="required">*</span> Gender:</td>
                  <td>
				  <?php if($worker->worker_gender=="Male")
				  		{	?>
							<input id="male" type="radio" checked="checked" value="Male" name="gender"> Male
							<input id="female" type="radio" value="Female" name="gender"> Female
				<?php	}
						else
						{	?>
							<input id="male" type="radio" value="Male" name="gender"> Male
  		                   	<input id="female" type="radio" checked="checked" value="Female" name="gender"> Female						
				<?php 	}	?>
				  </td>
                </tr>
                <tr>
                  <td><span class="required">*</span> Service Subcategory:</td>
                  <td>
				  <select id="ssc" name="service_subcategory[]" class="validate[required] text-input" multiple="multiple" required>
                  <?php 
				  //print_r($subcategory);
				  $group = array();
				  foreach ($subcategory as $sc){ 
				  		$group[$sc->service_type][$sc->service_subcategory_id] = $sc->service_subtype;
				   }
				   
				   //print_r($worker_subcategories);
				   
				   $worker_categories = array();
				   foreach($worker_subcategories as $worker_subcategory)
				   {
				   		$worker_categories[] = $worker_subcategory->service_subcategory_id;
				   }
				   
				   ?>		
				  <?php //print_r($group); 
				  foreach($group as $label=>$options){
				  	echo "<optgroup label='".$label."'>";
					foreach($options as $id=>$name)
					{
						if(in_array($id,$worker_categories)) 
						{
							echo "<option value='".$id."' selected>".$name."</option>";
						}
						else
						{
							echo "<option value='".$id."'>".$name."</option>";
						}
						
					}
				  }
				  ?>
				  </select>
				  </td>
                </tr>
                <tr>
                  <td>Birthdate:</td>
                  <td><input id="bd" class="large-field  validate[custom[date]] text-input" type="text" value="<?php echo $worker->worker_birthdate;?>" placeholder="date format : yyyy-mm-dd" name="birthdate"></td>
                </tr>
                <tr>
                  <td><span class="required">*</span>Contact No:</td>
                  <td><input id="contact" class="large-field  validate[required] text-input" type="text" value="<?php echo $worker->worker_contact;?>" placeholder="10 Digit Mobile Number" name="contactno"></td>
                </tr>
                <tr>
                  <td>Email ID:</td>
                  <td><input id="email" class="large-field validate[custom[email]] text-input" type="text" value="<?php echo $worker->worker_email;?>" placeholder="Email-Address" name="emailid"></td>
                </tr>
				<tr>
                  <td>Password:</td>
                  <td><input id="ps" class="large-field" type="password" value="" placeholder="Enter New Password" name="password"></td>
                </tr>
              </tbody>
            </table>
		  </div>
        </div>
		<div class="accordion">
          <div class="accordion-heading">Address Details</div>
          <div class="accordion-content">
		  	<table class="form">
              <tbody>
			  	<tr>
                  <td> Address Line 1:</td>
                  <td><input id="al1" class="large-field text-input" type="text" value="<?php echo $worker->worker_address_line_1;?>" placeholder="House Number" name="address_line_1"></td>
                </tr>
				<tr>
                  <td> Address Line 2:</td>
                  <td><input id="al2" class="large-field text-input" type="text" value="<?php echo $worker->worker_address_line_2;?>" placeholder="Street Address" name="address_line_2"></td>
                </tr>
			  	<tr>
                  <td> Area:</td>
                  <td><input id="area" class="large-field validate[required] text-input" type="text" value="<?php echo $worker->worker_area;?>" placeholder="your Area" name="area"></td>
                </tr>
				<tr>
                  <td> City:</td>
                  <td><input id="city" readonly="true" class="large-field validate[required] text-input" type="text" value="<?php echo $worker->worker_city;?>" placeholder="your City" name="city"></td>
                </tr>
				<tr>
                  <td> State:</td>
                  <td><input id="state" readonly="true" class="large-field validate[required] text-input" type="text" value="<?php echo $worker->worker_state;?>" placeholder="your State" name="state"></td>
                </tr>
              </tbody>
            </table>
		  </div>
        </div>
		<div class="accordion">
          <div class="accordion-heading">Professional Details</div>
          <div class="accordion-content">
		  	<table class="form">
              <tbody>
			  	<tr>
                  <td> Qualification:</td>
                  <td><input id="qualification" class="large-field text-input" type="text" value="" placeholder="Enter Your Qualification" name="qualification"></td>
                </tr>
				<tr>
                  <td> Occupation:</td>
                  <td><input id="occupation" class="large-field text-input" type="text" value="" placeholder="Enter Your Occupation" name="occupation"></td>
                </tr>
				<tr>
                  <td> Year of Practice:</td>
                  <td><input id="years_of_practice" class="large-field text-input" type="text" value="" placeholder="Enter Year of Practice" name="years_of_practice"></td>
                </tr>
				<tr>
                  <td> Hobby:</td>
                  <td><input id="" class="large-field text-input" type="text" value="" placeholder="Enter Your Hobby" name="hobby"></td>
                </tr>
				 
              </tbody>
            </table>
		  </div>
        </div>
		<div class="accordion">
          <div class="accordion-heading">Office Details</div>
          <div class="accordion-content">
		  	<table class="form">
              <tbody>
			  	<tr>
                  <td> Address Line 1:</td>
                  <td><input id="oadd1" class="large-field text-input" type="text" value="" placeholder="Address Line 1" name="oadd1"></td>
                </tr>
				<tr>
                  <td> Address Line 2:</td>
                  <td><input id="oadd2" class="large-field text-input" type="text" value="" placeholder="Address Line 2" name="oadd2"></td>
                </tr>
			  	<tr>
                  <td> Area:</td>
                  <td><input id="oarea" class="large-field text-input" type="text" value="" placeholder="Area" name="oarea"></td>
                </tr>
				<tr>
                  <td> City:</td>
                  <td><input id="ocity" class="large-field text-input" type="text" value="" placeholder="City" name="ocity"></td>
                </tr>
				<tr>
                  <td> State:</td>
                  <td><input id="ostate" class="large-field text-input" type="text" value="" placeholder="State" name="ostate"></td>
                </tr>
              </tbody>
            </table>
		  </div>
        </div>
		<div class="accordion">
          <div class="accordion-heading">Other Details</div>
          <div class="accordion-content">
		  	<table class="form">
              <tbody>
			  	<tr>
                  <td> Affiliation:</td>
                  <td><input id="affiliation" class="large-field text-input" type="text" value="" placeholder="Affiliation" name="affiliation"></td>
                </tr>
				<tr>
                  <td> Achievements:</td>
                  <td><input id="achievement" class="large-field text-input" type="text" value="" placeholder="Achievements" name="achievement"></td>
                </tr>
			  	<tr>
                  <td> Awards:</td>
                  <td><input id="awards" class="large-field text-input" type="text" value="" placeholder="Awards" name="awards"></td>
                </tr>
				<tr>
                  <td> LIC No:</td>
                  <td><input id="lic_no" class="large-field text-input" type="text" value="" placeholder="LIC No" name="lic_no"></td>
                </tr>
              </tbody>
            </table>
		  </div>
        </div>
		  
		<div class="buttons">
            <div class="left">
              <p>
              <input type="submit" class="button" value="Save Information">
			  </p>
            </div>
          </div>    
        </div>
		
        </form>
      </div>
      <!--Middle Part End-->
      <div class="clear"></div>
    </div>
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>stylesheets/validationEngine.jquery.css" type="text/css"/>
	<script src="<?php echo base_url(); ?>javascripts/validation/jquery.validationEngine-en.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>javascripts/validation/jquery.validationEngine.js" type="text/javascript"></script>
	<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#editdata").validationEngine();
		});

	</script>
