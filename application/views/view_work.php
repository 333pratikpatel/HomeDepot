<!-- Middle Part Start -->
<div id="content">
        
        <h1>Work Detail</h1>
		<?php if($this->session->userdata("worker_id")==$worker_id){ ?>
        <div class="product-filter">
          <div class="sort">
		  	<input type="button" class="button" value="Add New" id="add_new_work">
		  </div>
        </div>
       <?php } ?>
        <!--Product List Start-->
        <div class="product-list">
         
		 <?php
		 	foreach($worker_work_details as $work_detail)
			{
		 ?>
		  <div>
            <div class="left">
              <div class="image"><a href=""><img src="<?php echo base_url(); ?>image/services/work_detail/<?php echo $work_detail->work_photo; ?>" title="<?php echo $work_detail->work_title; ?>" alt="<?php echo $work_detail->work_title; ?>" width="200px" height="200px" /></a></div>
              <div class="name"><a href=""><?php echo $work_detail->work_title; ?></a></div>
              <div class="description" style="text-align:justify"><?php echo $work_detail->work_description; ?></div>
              <div>
			  	<?php if($this->session->userdata("worker_id")==$worker_id){ ?>
                	<!--<input type="button" class="button" value="Edit"> &nbsp;&nbsp;--><input type="button" class="button" value="Delete">
				<?php } ?>
              </div>
            </div>
          </div>
		  
		  <?php
		  	}
		  ?>
		  
         
        </div>
        <!--Product List End-->
      
	  	<!-- Add Work Popup Start -->
		<div id="add_work_popup" class="white-popup mfp-hide">
			<form id="upload" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>index.php/Home/addWork/<?php echo $this->session->userdata('worker_id');?>"> 
                <b>Work Title : </b><br> 
                <input type="text" style="color:#996699; font-size:larger" name="work_title" size="20" placeholder="work name" /><br> 
                <b>Work Description : </b><br>     
                <textarea style="color:#996699; font-size:larger" name="work_description" size="20" placeholder="work Description" /></textarea><br> 
                <b>Upload Work Photo : </b><br>             
                <input type="file" style="color:#996699; font-size:larger" name="userfile" size="20" /><br><br> 
                <input type="submit" class="button" value="Add Work" /> 
            </form>
		</div>
		
		<script>
			$("#add_new_work").click(function(){
			 	$.magnificPopup.open({
					items: {
						src: '#add_work_popup', // can be a HTML string, jQuery object, or CSS selector
						type: 'inline'
					}
				});
			 });
		</script>
		<!-- Add Work Popup End -->
			  
	  
	  </div>
	  <!-- Middle Part End -->