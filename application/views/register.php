	<link rel="stylesheet" href="<?php echo base_url(); ?>stylesheets/validationEngine.jquery.css" type="text/css"/>
	<script src="<?php echo base_url(); ?>javascripts/validation/jquery.validationEngine-en.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>javascripts/validation/jquery.validationEngine.js" type="text/javascript"></script>
	<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#register").validationEngine();
		});

        jQuery(document).ready(function()
        {
            jQuery("#state").on("change",function(){
				//alert("Hello");
                var state_id = jQuery("#state").val();
				//alert(state_id);
                jQuery.ajax({
                    type:"POST",
                    url:"<?php echo base_url(); ?>index.php/Home/get_city/", //controller url
                    data:"state_id="+state_id,
                    success:function(data)
                    {
						//alert(data);
                        jQuery('#divCity').html(data);
                    }
                });
            });
        });
	</script>
	
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
              <li><a href="login.html">Login</a></li>
              <li><a href="register.html">Register</a></li>
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
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"> <a href="#">Home</a> &raquo; <a href="#">Account</a> &raquo; <a href="#">Register</a> </div>
        <!--Breadcrumb Part End-->
        <h1>Register Account</h1>
        <form id="register" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>index.php/Home/save">
          <h2>Your Personal Details</h2>
          <div class="content">
            <table class="form">
              <tbody>
                <tr>
                  <td><span class="required">*</span> First Name:</td>
                  <td><input id="fn" class="large-field validate[required] text-input" type="text" value="" placeholder="your name" name="firstname"></td>
                </tr>
                <tr>
                  <td><span class="required">*</span> Last Name:</td>
                 <td><input id="ln" class="large-field validate[required] text-input" type="text" value="" placeholder="your surname" name="lastname"></td>
                </tr>
				<tr>
                  <td><span class="required">*</span> Gender:</td>
                  <td>
				  		<input id="male" type="radio" checked="checked"  value="Male" name="gender"> Male
                     	<input id="female" type="radio" value="Female" name="gender"> Female
				  </td>
                </tr>
                
				<tr>
                  <td><span class="required">*</span> Service Category:</td>
                  <td>
				  		<select id="ssc" name="service_subcategory[]" class="validate[required] text-input" multiple="multiple" required>
                  <?php 
				  //print_r($subcategory);
				  $group = array();
				  foreach ($subcategory as $sc){ 
				  		$group[$sc->service_type][$sc->service_subcategory_id] = $sc->service_subtype;
				   } ?>		
				  <?php //print_r($group); 
				  foreach($group as $label=>$options){
				  	echo "<optgroup label='".$label."'>";
					foreach($options as $id=>$name)
					{
						echo "<option value='".$id."'>".$name."</option>";
					}
				  }
				  ?>
				  
				 </select>     
                  </td>
                </tr>
                <tr>
                  <td> Birthdate:</td>
                  <td><input id="bd" class="large-field  validate[custom[date]] text-input" type="text" value="" placeholder="date format : yyyy-mm-dd" name="birthdate"></td>
                </tr>
                <tr>
                  <td><span class="required">*</span>Contact No:</td>
                  <td><input id="contact" class="large-field  validate[required] text-input" type="text" value="" placeholder="10 Digit Mobile Number" name="contactno"></td>
                </tr>
                <tr>
                  <td> Email ID:</td>
                  <td><input id="email" class="large-field validate[custom[email]] text-input" type="text" value="" placeholder="Email-Address" name="emailid"></td>
                </tr>

              </tbody>
            </table>
          </div>
          <h2>Your Address</h2>
          <div class="content">
            <table class="form">
              <tbody>
			  	<tr>
                  <td>Address Line 1:</td>
                  <td><input id="al1" class="large-field" type="text" value="" placeholder="Address Line 1" name="address_line_1"></td>
                </tr>
				<tr>
                  <td>Address Line 2:</td>
                  <td><input id="al2" class="large-field" type="text" value="" placeholder="Address Line 2" name="address_line_2"></td>
                </tr>
				<tr>
                  <td><span class="required">*</span> State:</td>
                  <td><select id="state" name="state" class="validate[required] text-input">
                      <option value=""> Please Select Your State </option>
                  <?php foreach ($state as $s){ ?>
				      <option value="<?php  echo $s->state_name; ?>"><?php  echo $s->state_name; ?></option>
                  <?php } ?>
                  </td>
                </tr>
				<tr>
                  <td><span class="required">*</span> City:</td>
                  <td>
				  <div id="divCity"><select name="city" id="city" class="validate[required] text-input"><option value=""> Please Select Your City </option></select></div>
                  </td>
                </tr>
				<tr>
                  <td><span class="required">*</span> Area:</td>
                  <td><input id="area" class="large-field validate[required] text-input" type="text" value="" placeholder="your Area" name="area"></td>
                </tr>
              </tbody>
            </table>
          </div>
          <h2>Your Password</h2>
          <div class="content">
            <table class="form">
              <tbody>
                <tr>
                  <td><span class="required">*</span> Password:</td>
                  <td><input id="ps" class="large-field validate[required] text-input" type="password" value="" placeholder="Enter Password" name="password"></td>
                </tr>
                <tr>
                  <td><span class="required">*</span> Password Confirm:</td>
                  <td><input id="pc" class="large-field validate[required,equals[ps]] text-input" type="password" value="" placeholder="Re-enter Password" name="confirm"></td>
                </tr>
				<tr><td>&nbsp;</td></tr>
              </tbody>
            </table>
          </div>
          <div class="buttons">
            <div class="left">
              <p>
              <input type="submit" class="button" value="Register Your Self">
			  </p>
            </div>
          </div>
        </form>
      </div>
      <!--Middle Part End-->
      <div class="clear"></div>
    </div>