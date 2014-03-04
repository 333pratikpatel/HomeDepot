<link rel="stylesheet" href="<?php echo base_url(); ?>stylesheets/validationEngine.jquery.css" type="text/css"/>
<script src="<?php echo base_url(); ?>javascripts/validation/jquery.validationEngine-en.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>javascripts/validation/jquery.validationEngine.js" type="text/javascript"></script>
<script>
	jQuery(document).ready(function(){
		// binds form submission and fields to the validation engine
		jQuery("#login").validationEngine();
	});

</script>
    <div id="container">
      <!--Left Part-->
      <div id="column-left">
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
      </div>
      <!--Left End-->
      <!--Middle Part Start-->
      <div id="content">
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"> <a href="#">Home</a> &raquo; <a href="#">Account</a> &raquo; <a href="#">Login</a> </div>
        <!--Breadcrumb Part End-->
        <h1>Account Login</h1>
        <div class="login-content">
          <div class="left">
            <h2>New Customer</h2>
            <div class="content">
              <p><b>Register Account</b></p>
              <p>Click below if you have not already registered.</p>
              <a class="button" href="#">Continue</a></div>
          </div>

			
          <div class="right">
            <h2>Worker's Login</h2>
            <form enctype="multipart/form-data" id="login" method="post" action="<?php echo base_url(); ?>index.php/Home/verifyLogin">
              <?php if($this -> session -> flashdata("lerror")) { ?>
                <b style="color:#FF0000">Invalid Worker ID or Password</b><br>
			  <?php } ?>
			  <div class="content">
                <b>Worker ID :</b><br>
                <input type="text" value="" id="wid" name="workerid" class="validate[required] text-input">
                <br>
                <br>
                <b>Password :</b><br>
                <input type="password" value="" id="pswd" name="password" class="validate[required] text-input">
                <br>
                <a href="#">Forgotten Password</a><br>
                <br>
                <input type="submit" class="button" value="Login">
              </div>
            </form>
          </div>
        </div>
      </div>
      <!--Middle Part End-->
      <div class="clear"></div>
    </div>