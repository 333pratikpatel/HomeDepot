<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title>Skill Home</title>
<!-- <link href="<?php //echo base_url(); ?>image/favicon1.png" rel="icon" /> -->
<link rel="shortcut icon" href="<?php echo base_url(); ?>image/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="clean modern and elegant corporate look eCommerce html template">
<meta name="author" content="">

<!-- CSS Part Start-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>stylesheets/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>stylesheets/slideshow.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>stylesheets/flexslider.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>javascripts/colorbox/colorbox.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>stylesheets/carousel.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>stylesheets/magnific-popup/magnific-popup.css">
<!-- CSS Part End-->

<!-- JS Part Start-->
<script type="text/javascript" src="<?php echo base_url(); ?>javascripts/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>javascripts/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>javascripts/jquery.flexslider.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>javascripts/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>javascripts/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>javascripts/colorbox/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>javascripts/tabs.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>javascripts/cloud_zoom.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>javascripts/jquery.dcjqaccordion.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>javascripts/custom.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>javascripts/html5.js"></script>
<!-- JS Part End-->

<!-- typeahead js -->
<script src="<?php echo base_url(); ?>javascripts/typeahead/typeahead.js"></script>


<!-- Auto Search Part Start -->
<script type="text/javascript">
$(function(){
	$(".search").keyup(function() 
	{ 
		//alert('Home/getSearchResult');
		var searchid = $(this).val();
		var dataString = 'search='+ searchid;
		if(searchid!='')
		{
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>index.php/Home/getSearchData",
				data: ({term: dataString}),
				cache: false,
				success: function(html)
				{
					$("#result").html(html).show();
				}
			});
		}return false;    
	});
	
	jQuery("#result").live("click",function(e){ 
		var $clicked = $(e.target).parents();
		//alert($clicked.parents().html());
		//alert($clicked.parents().html());
		var $name = $clicked.find('.name').html();
		var decoded = $("<div/>").html($name).text();
		$('#searchid').val(decoded);
		
		var lastIndex = decoded.lastIndexOf(" ");
		
		var search_val = decoded.substring(0,lastIndex);
		var search_type = decoded.substring(lastIndex+1);
		
		//alert(search_type);
		if(search_type=='service'){
			window.open("http://localhost/HomeDepot/index.php/Home/services/"+search_val,"_self");
		}
		//alert(search_val);
		//alert(search_type);
	});
	
	//jQuery("#result img").live("click",function(e)){
		//alert("clicked");
	//});

	jQuery(document).live("click", function(e) { 
		var $clicked = $(e.target);
		if (! $clicked.hasClass("search")){
		jQuery("#result").fadeOut(); 
		}
	});

	$('#searchid').click(function(){
		jQuery("#result").fadeIn();
	});
	
	$("#button_search").click(function(){
		alert($("#searchid").val());
	});
});
</script>
<style type="text/css">
	body{ 
		font-family:Tahoma, Geneva, sans-serif;
	}
	.content{
		/* width:900px; */
		margin:0 auto;
	}
	#searchid
	{
		width:300px;
		border:solid 1px #000;
		padding:10px;
		font-size:14px;
	}
	#result
	{
		position:absolute;
		width:300px;
		padding:10px;
		display:none;
		margin-top:-1px;
		border-top:0px;
		overflow:hidden;
		border:1px #CCC solid;
		background-color: white;
		z-index:9999;
	}
	.show
	{
		padding:10px; 
		border-bottom:1px #999 dashed;
		font-size:15px; 
		height:50px;
	}
	.show:hover
	{
		background:#d45c93;
		color:#FFF;
		cursor:pointer;
	}
</style>
<!-- Auto Search Part End -->


<style>
.white-popup {
  position: relative;
  background: #FFF;
  padding: 20px;
  width: auto;
  max-width: 500px;
  margin: 20px auto;
  /* vertical-align:middle; */
}
</style>

<!-- Google Fonts (Droid Sans) Start -->
<link href='http://fonts.googleapis.com/css?family=Droid+Sans&amp;v1' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=&amp;v1' rel='stylesheet' type='text/css'>
<!-- Google Fonts (Droid Sans) End -->
</head>

<body>
<div class="wrapper-box">
  <div class="main-wrapper">
    <!--Header Part Start-->
    <header id="header">
      <div class="htop">
	  
        <div class="links"> 
		
		<?php
		if ($this -> session -> userdata("isLoggedIn")) 
		{?>
		<b>Welcome,&nbsp;<?php echo $this->session->userdata("worker_fname")." ".$this->session->userdata("worker_lname"); ?></b>
		<a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/Home/logout">Logout</a>
		<?php 
		}
		else 
		{?>
			<a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/Home/login">Login</a>							
			<a href="<?php echo site_url('Home/register')?>">Register</a> 
		<?php 
		}
		?>						
		<a href="#" id="wishlist-total">Wish List (0)</a>
		<a href="checkout.html">Checkout</a> </div>
      </div>
      <section class="hsecond">
        <div id="logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>image/skill_home_logo_new.jpg" title="Skill Home" alt="Skill Home" /></a></div>
        <div id="search">
          <div class="button-search" id="button_search"></div>
          <input type="text" class="search" id="searchid" placeholder="Search" value="" />
		  <div id="result"></div>
        </div>
        <!--Mini Shopping Cart Start-->
        <section id="cart">
          <div class="heading">
            <h4><img width="32" height="32" alt="" src="<?php echo base_url(); ?>image/cart-bg.png"></h4>
            <a><span id="cart-total">2 item(s) - $710.18</span></a> </div>
          <div class="content">
            <div class="mini-cart-info">
              <table>
                <tr>
                  <td class="image"><a href="#"><img src="<?php echo base_url(); ?>image/product/lotto-sports-shoes-white-47x47.jpg" alt="Lotto Sports Shoes" title="Lotto Sports Shoes" /></a></td>
                  <td class="name"><a href="#">Lotto Sports Shoes</a></td>
                  <td class="quantity">x&nbsp;1</td>
                  <td class="total">$589.50</td>
                  <td class="remove"><img src="<?php echo base_url(); ?>image/remove-small.png" alt="Remove" title="Remove" /></td>
                </tr>
                <tr>
                  <td class="image"><a href="#"><img src="<?php echo base_url(); ?>image/product/iphone_1-47x47.jpg" alt="iPhone 4s" title="iPhone 4s" /></a></td>
                  <td class="name"><a href="#">iPhone 4s</a></td>
                  <td class="quantity">x&nbsp;1</td>
                  <td class="total">$120.68</td>
                  <td class="remove"><img src="<?php echo base_url(); ?>image/remove-small.png" alt="Remove" title="Remove" /></td>
                </tr>
              </table>
            </div>
            <div class="mini-cart-total">
              <table>
                <tr>
                  <td class="right"><b>Sub-Total:</b></td>
                  <td class="right">$601.00</td>
                </tr>
                <tr>
                  <td class="right"><b>Eco Tax (-2.00):</b></td>
                  <td class="right">$4.00</td>
                </tr>
                <tr>
                  <td class="right"><b>VAT (17.5%):</b></td>
                  <td class="right">$105.18</td>
                </tr>
                <tr>
                  <td class="right"><b>Total:</b></td>
                  <td class="right">$710.18</td>
                </tr>
              </table>
            </div>
            <div class="checkout"><a class="button" href="#">View Cart</a> &nbsp; <a class="button" href="#">Checkout</a></div>
          </div>
        </section>
        <!--Mini Shopping Cart End-->
        <div class="clear"></div>
      </section>
      <!--Top Menu(Horizontal Categories) Start-->
      <nav id="menu">
        <ul>
          <li class="home"><a title="Home" href="<?php echo base_url(); ?>"><span>Home</span></a></li>
          <li class="categories_hor"><a href="<?php echo site_url('Home/categories/grid')?>">Categories</a>
            <div>
              <div class="column"> <a href="#">Electronics</a>
                <div>
                  <ul>
                    <li><a href="#">Laptops (0)</a></li>
                    <li><a href="#">Desktops (0)</a></li>
                    <li><a href="#">Components (1)</a></li>
                    <li><a href="#">Software (1)</a></li>
                    <li><a href="#">Phones &amp; PDAs (4)</a></li>
                    <li><a href="#">Cameras (2)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"> <a href="#">Jewellery</a>
                <div>
                  <ul>
                    <li><a href="#">Children's Jewellery (0)</a></li>
                    <li><a href="#">Men's Jewellery (1)</a></li>
                    <li><a href="#">Women's Jewellery (0)</a></li>
                    <li><a href="#">Sample Test (0)</a></li>
                    <li><a href="#">Sample Test11 (0)</a></li>
                    <li><a href="#">Sample Test12 (0)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"> <a href="#">Shoes</a>
                <div>
                  <ul>
                    <li><a href="#">Children's Shoes (1)</a></li>
                    <li><a href="#">Men's Shoes (2)</a></li>
                    <li><a href="#">Women's Shoes (1)</a></li>
                    <li><a href="#">Test Sample (0)</a></li>
                    <li><a href="#">Test Sample1 (0)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"> <a href="#">Clothing</a>
                <div>
                  <ul>
                    <li><a href="#">Men (1)</a></li>
                    <li><a href="#">Women (1)</a></li>
                    <li><a href="#">Boys (0)</a></li>
                    <li><a href="#">Girls (0)</a></li>
                    <li><a href="#">Accessories (0)</a></li>
                    <li><a href="#">Sample Test21 (0)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"> <a href="#">Kids</a>
                <div>
                  <ul>
                    <li><a href="#">Toys Kids (0)</a></li>
                    <li><a href="#">Games (1)</a></li>
                    <li><a href="#">Sample Test22 (0)</a></li>
                    <li><a href="#">Sample Test15 (1)</a></li>
                    <li><a href="#">Sample Kids (1)</a></li>
                    <li><a href="#">Sample Test6 (0)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"> <a href="#">Watches</a>
                <div>
                  <ul>
                    <li><a href="#">Women's Watches (1)</a></li>
                    <li><a href="#">Men's Watches (0)</a></li>
                    <li><a href="#">Children's Watches (1)</a></li>
                    <li><a href="#">Sample16 (0)</a></li>
                    <li><a href="#">Sample17 (0)</a></li>
                    <li><a href="#">test 18 (0)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"> <a href="#">Sports</a>
                <div>
                  <ul>
                    <li><a href="#">Women's Sports (1)</a></li>
                    <li><a href="#">Children's Sports (0)</a></li>
                    <li><a href="#">Men's Sports (1)</a></li>
                    <li><a href="#">test 7 (0)</a></li>
                    <li><a href="#">Sample 8 (0)</a></li>
                    <li><a href="#">test 9 (0)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"> <a href="#">Health</a>
                <div>
                  <ul>
                    <li><a href="#">Sample Test1 (1)</a></li>
                    <li><a href="#">Sample Test2 (0)</a></li>
                    <li><a href="#">test 20 (0)</a></li>
                    <li><a href="#">test 21 (0)</a></li>
                    <li><a href="#">test 22 (0)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"> <a href="#">Furniture</a>
                <div>
                  <ul>
                    <li><a href="#">Bedrooms Furniture (0)</a></li>
                    <li><a href="#">Kidsrooms furniture (0)</a></li>
                    <li><a href="#">Kitchen Furniture (1)</a></li>
                    <li><a href="#">Showcase Furniture (0)</a></li>
                    <li><a href="#">Table Furniture (1)</a></li>
                    <li><a href="#">Wall Furniture (0)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"><a href="#">Books</a>
                <div>
                  <ul>
                    <li><a href="#">Audio Books (1)</a></li>
                    <li><a href="#">Comedy Book (1)</a></li>
                    <li><a href="#">Comics Books (0)</a></li>
                    <li><a href="#">Computer Book (1)</a></li>
                    <li><a href="#">Cookies Books (0)</a></li>
                    <li><a href="#">English Books (1)</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li><a href="<?php echo site_url('Home/services')?>">Services</a>
            <div>
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
          </li>
		  <?php
			if ($this -> session -> userdata("isLoggedIn")) 
			{?>
		  		<li><a href="<?php echo site_url('Home/viewprofile/'.$this->session->userdata("worker_id"))?>">Your Profile</a>
					<div> 
					 <ul>
					 	<li><a href="<?php echo site_url('Home/viewprofile/'.$this->session->userdata("worker_id"))?>">View Profile</a></li>
						<li><a href="<?php echo site_url('Home/editprofile/'.$this->session->userdata("worker_id"))?>">Edit Profile</a></li>
						<li><a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/Home/logout">Logout</a></li>
              		</ul>
				   </div>
				</li>
          <?php
		  	} ?>
          
		  
          <li><a>Information</a>
            <div>
              <ul>
                <li><a href="about-us.html">About Us</a></li>
                <li><a href="about-us.html">Delivery Information</a></li>
                <li><a href="about-us.html">Privacy Policy</a></li>
                <li><a href="elements.html">Elements</a></li>
              </ul>
            </div>
          </li>
          <li><a href="<?php echo site_url('Home/contact')?>">Contact Us</a></li>
        </ul>
      </nav>
      <!--Top Menu(Horizontal Categories) End-->
      <!-- Mobile Menu Start-->
      <nav id="menu" class="m-menu"> <span>Menu</span>
        <ul>
          <li class="categories"><a>Categories</a>
            <div>
              <div class="column"> <a href="#">Electronics</a>
                <div>
                  <ul>
                    <li><a href="#">Laptops (0)</a></li>
                    <li><a href="#">Desktops (0)</a></li>
                    <li><a href="#">Components (1)</a></li>
                    <li><a href="#">Software (1)</a></li>
                    <li><a href="#">Phones &amp; PDAs (4)</a></li>
                    <li><a href="#">Cameras (2)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"> <a href="#">Jewellery</a>
                <div>
                  <ul>
                    <li><a href="#">Children's Jewellery (0)</a></li>
                    <li><a href="#">Men's Jewellery (1)</a></li>
                    <li><a href="#">Women's Jewellery (0)</a></li>
                    <li><a href="#">Sample Test (0)</a></li>
                    <li><a href="#">Sample Test11 (0)</a></li>
                    <li><a href="#">Sample Test12 (0)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"> <a href="#">Shoes</a>
                <div>
                  <ul>
                    <li><a href="#">Children's Shoes (1)</a></li>
                    <li><a href="#">Men's Shoes (2)</a></li>
                    <li><a href="#">Women's Shoes (1)</a></li>
                    <li><a href="#">Test Sample (0)</a></li>
                    <li><a href="#">Test Sample1 (0)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"> <a href="#">Clothing</a>
                <div>
                  <ul>
                    <li><a href="#">Men (1)</a></li>
                    <li><a href="#">Women (1)</a></li>
                    <li><a href="#">Boys (0)</a></li>
                    <li><a href="#">Girls (0)</a></li>
                    <li><a href="#">Accessories (0)</a></li>
                    <li><a href="#">Sample Test21 (0)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"> <a href="#">Kids</a>
                <div>
                  <ul>
                    <li><a href="#">Toys Kids (0)</a></li>
                    <li><a href="#">Games (1)</a></li>
                    <li><a href="#">Sample Test22 (0)</a></li>
                    <li><a href="#">Sample Test15 (1)</a></li>
                    <li><a href="#">Sample Kids (1)</a></li>
                    <li><a href="#">Sample Test6 (0)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"> <a href="#">Watches</a>
                <div>
                  <ul>
                    <li><a href="#">Women's Watches (1)</a></li>
                    <li><a href="#">Men's Watches (0)</a></li>
                    <li><a href="#">Children's Watches (1)</a></li>
                    <li><a href="#">Sample16 (0)</a></li>
                    <li><a href="#">Sample17 (0)</a></li>
                    <li><a href="#">test 18 (0)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"> <a href="#">Sports</a>
                <div>
                  <ul>
                    <li><a href="#">Women's Sports (1)</a></li>
                    <li><a href="#">Children's Sports (0)</a></li>
                    <li><a href="#">Men's Sports (1)</a></li>
                    <li><a href="#">test 7 (0)</a></li>
                    <li><a href="#">Sample 8 (0)</a></li>
                    <li><a href="#">test 9 (0)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"> <a href="#">Health</a>
                <div>
                  <ul>
                    <li><a href="#">Sample Test1 (1)</a></li>
                    <li><a href="#">Sample Test2 (0)</a></li>
                    <li><a href="#">test 20 (0)</a></li>
                    <li><a href="#">test 21 (0)</a></li>
                    <li><a href="#">test 22 (0)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"> <a href="#">Furniture</a>
                <div>
                  <ul>
                    <li><a href="#">Bedrooms Furniture (0)</a></li>
                    <li><a href="#">Kidsrooms furniture (0)</a></li>
                    <li><a href="#">Kitchen Furniture (1)</a></li>
                    <li><a href="#">Showcase Furniture (0)</a></li>
                    <li><a href="#">Table Furniture (1)</a></li>
                    <li><a href="#">Wall Furniture (0)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"><a href="#">Books</a>
                <div>
                  <ul>
                    <li><a href="#">Audio Books (1)</a></li>
                    <li><a href="#">Comedy Book (1)</a></li>
                    <li><a href="#">Comics Books (0)</a></li>
                    <li><a href="#">Computer Book (1)</a></li>
                    <li><a href="#">Cookies Books (0)</a></li>
                    <li><a href="#">English Books (1)</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </nav>
      <!-- Mobile Menu End-->
    </header>
    <!--Header Part End-->
