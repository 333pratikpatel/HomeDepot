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
        </div>
      <!--Left End-->
	
      <!--Middle Part Start-->
      <div id="content">
	  <?php
	  if (isset($expert_areas)) 
	  { ?>	
	  <div class="box">
          <div class="box-heading">Add Expertice Area</div>
          <div class="box-content">
            <form action="<?php echo site_url('Home/updateExpertArea/'.$this->session->userdata("worker_id"));?>" method="post">
					<ul class="box-filter" style="list-style:none">
			  
				  <li><span id="filter-group">Expertise</span>
					<ul style="list-style:none">
						<?php foreach($expert_areas as $expert)
						{ ?>
							<?php 
							$p=0;
							foreach($expert_in as $in)
							{
								if($expert->worker_expertice_id==$in->worker_expertice_id) 
								{
									$p=1;
									break;
								}
								else
								{
									$p=0;
								}
							}
								if($p==1)	
								{ ?>			
							  <li>
								<input name="state[]" type="checkbox" id="filter3" value="<?php echo $expert->worker_expertice_id; ?>" checked="checked" >
								<label for="filter3"><?php echo $expert->worker_expertice_name; ?></label>
							  </li>
							  <?php } 
							  else { ?>
							   <li>
								<input name="state[]" type="checkbox" id="filter3" value="<?php echo $expert->worker_expertice_id; ?>" >
								<label for="filter3"><?php echo $expert->worker_expertice_name; ?></label>
							  </li>
						<?php }
						} ?>
					</ul>
				  </li>
			  
            </ul>
            <input id="button-filter" class="button" type="submit" value="Update Expertise Area" >  
			</div>
			</form>
        </div>
	  <?php
	  }
	  ?> 
	  <!--Middle Part End-->
      <div class="clear">
	  </div>
    </div>