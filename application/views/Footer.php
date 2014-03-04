</div>
<script src="<?php echo base_url(); ?>javascripts/magnific-popup/jquery.magnific-popup.js"></script>
<script>
$('.wishlist').magnificPopup({
  type:'inline',
  midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
});
$('.gallery-popup').magnificPopup({ 
  
  type: 'image',
  delegate: 'a',
  
  gallery:{enabled:true},
  callbacks: {
    
  //  buildControls: function() {
      // re-appends controls inside the main container
    //  this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
   // }
    
  }
}); 


</script>


<!--Footer Part Start-->
  <footer id="footer">
    <div class="fpart-inner">  
	  
		<div class="column">
		  <h3>Services</h3>
		  <ul>
			<?php
				foreach($services as $service) {
			?>
					<li><a href="<?php echo site_url('Home/services/'.$service->service_type)?>"><?php echo $service->service_type; ?></a></li>
			<?php
				}
			?>
		 </ul>
	   </div>
	   
	   <?php
	   if ($this -> session -> userdata("isLoggedIn")) 
	   { ?>
		  		<div class="column">
				<h3>Your Profile</h3>
					 <ul>
					 	<li><a href="<?php echo site_url('Home/viewprofile/'.$this->session->userdata("worker_id"))?>">View Profile</a></li>
						<li><a href="<?php echo site_url('Home/editprofile/'.$this->session->userdata("worker_id"))?>">Edit Profile</a></li>
						<li><a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/Home/logout">Logout</a></li>
              		</ul>
				</div>
       <?php
	   } 
	   ?>	
			
	  <?php
	  if (isset($expert_area)) 
	  { ?>	
	  <!--Refine Search Start-->
        <div class="column">
		  <h3>Expertise</h3>
            <form action="<?php echo site_url('Home/searchByWork/'.$service_category);?>" method="post">
					<ul>
						<?php foreach($expert_area as $expert){ ?>
							  <li>
								<input name="state[]" type="checkbox" id="filter3" value="<?php echo $expert->worker_expertice_id; ?>" >	  
								<label for="filter3"><?php echo $expert->worker_expertice_name; ?></label>
							  </li>
						<?php } ?>
            <br />
			<li><input id="button-filter" class="button" type="submit" value="Search" ></li>  
			</form>
			</ul>
        </div>
        <!--Refine Search End-->
	  <?php
	  } 
	  ?>
			
      <div class="column">
        <h3>Extras</h3>
        <ul>
          <li><a href="#">Brands</a></li>
          <li><a href="#">Gift Vouchers</a></li>
          <li><a href="#">Affiliates</a></li>
          <li><a href="#">Specials</a></li>
        </ul>
      </div>
      
      <!-- Contact Details Start-->
      <div class="contact contact_icon">
        <h3>Contact Us</h3>
        <ul>
          <li class="address">Central Square, 22 Hoi Wing Road, Tuen Mun, New Delhi, India</li>
          <li class="mobile">+91 9896989598</li>
          <li class="fax">+91 9896989598</li>
          <li class="email"><a href="mailto:info@contact.com">info@contact.com</a></li>
        </ul>
      </div>
      <!-- Contact Details End-->
      <div class="clear"></div>
      <div id="powered">
        <!-- Payment Images Icon Start-->
        <div class="payments_types part3"> <img src="<?php echo base_url(); ?>image/payment_paypal.png" alt="paypal" title="PayPal"> <img src="<?php echo base_url(); ?>image/payment_american.png" alt="american-express" title="American Express"> <img src="<?php echo base_url(); ?>image/payment_2checkout.png" alt="2checkout" title="2checkout"> <img src="<?php echo base_url(); ?>image/payment_maestro.png" alt="maestro" title="Maestro"> <img src="<?php echo base_url(); ?>image/payment_discover.png" alt="discover" title="Discover"> </div>
        <!-- Payment Images Icon End-->
        <!-- Powered by Text Start-->
        <div class="powered_text part3">
          <p style="font-size:larger">Skill Home : For Skill Workers<br />
            Created By <a target="_blank" href="https://www.facebook.com/jaymin118">Jaymin Shah </a> & <a target="_blank" href="https://www.facebook.com/333pratik">Pratik Patel</a></p>
        </div>
        <!-- Powered by Text End-->
        <!-- Follow Social Icons Start-->
        <div class="social part3"> <a href="http://facebook.com/harnishdesign" target="_blank"><img src="<?php echo base_url(); ?>image/facebook.png" alt="Facebook" title="Facebook"></a> <a href="https://twitter.com/#!/harnishdesign" target="_blank"><img src="<?php echo base_url(); ?>image/twitter.png" alt="Twitter" title="Twitter"> </a> <a href="#" target="_blank"> <img src="<?php echo base_url(); ?>image/googleplus.png" alt="Google+" title="Google+"> </a> <a href="#" target="_blank"> <img src="<?php echo base_url(); ?>image/pinterest.png" alt="Pinterest" title="Pinterest"> </a> <a href="#" target="_blank"> <img src="<?php echo base_url(); ?>image/rss.png" alt="RSS" title="RSS"> </a> <a href="http://www.vimeo.com/#" target="_blank"> <img src="<?php echo base_url(); ?>image/vimeo.png" alt="Vimeo" title="Vimeo"> </a> </div>
        <!-- Follow Social Icons End-->
        <div class="clear"></div>
      </div>
      <!-- Back to Top Button Start-->
      <div class="back-to-top" id="back-top"><a title="Back to Top" href="javascript:void(0)" class="backtotop">Top</a></div>
      <!-- Back to Top Button End-->
    </div>
  </footer>
  <!--Footer Part End-->
</div>
</body>
</html>