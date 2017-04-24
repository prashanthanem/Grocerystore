<?php include 'includes/header.php'?>
<?php 
require('connect.php');
$pid = $_GET['productID'];
$query = "SELECT * FROM `items` WHERE pid='$pid'";
$result = mysql_query($query);

?>

<!-- //header -->
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
				<li>Branded Foods</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div> 
			   <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
						<li><a href="products.php?productID=4">Branded Foods</a></li>
						<li><a href="products.php?productID=2">Households</a></li>
						<li><a href="products.php?productID=4">Veggies & Fruits</a></li>						
						<li><a href="products.php?productID=11">Kitchen</a></li>						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Beverages<span class="caret"></span></a>
							<div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
								<div class="w3ls_vegetables">
									<ul>
										<li><a href="products.php?productID=5">Soft Drinks</a></li>
										<li><a href="products.php?productID=5">Juices</a></li>
									</ul>
								</div>                  
							</div>	
						</li>
						<li><a href="products.php?productID=7">Pet Food</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Frozen Foods<span class="caret"></span></a>
							<div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
								<div class="w3ls_vegetables">
									<ul>
										<li><a href="products.php?productID=8">Frozen Snacks</a></li>
										<li><a href="products.php?productID=8">Frozen Nonveg</a></li>
									</ul>
								</div>                  
							</div>	
						</li>
						<li><a href="products.php?productID=10">Bread & Bakery</a></li>
					</ul>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="w3l_banner_nav_right">
			<div class="w3l_banner_nav_right_banner3">
				<h3>Best Deals For New Products<span class="blink_me"></span></h3>
			</div>
			
			<div class="w3ls_w3l_banner_nav_right_grid">
				<h3>Hot Deals</h3>
				<div class="w3ls_w3l_banner_nav_right_grid1">
					<?php
					while($row = mysql_fetch_array($result)){
                   
?>
					<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.php"><img src="images/<?php echo $row['iimg']?>" alt=" " class="img-responsive" /></a>
											<p><?php echo $row['itemname']?></p>
											<h4>$<?php echo $row['amount']?>.00<span>$<?php echo $row['disamt']?>.00</span></h4>
											<div class="snipcart-details">
											<input type="submit" name="submit" value="Add to cart" class="button" id="item<?php echo $row['itemid']?><?php echo $row['pid']?>" />					
										</div>
										</div>
										
									</div>
								</figure>
							</div>
						</div>
						</div>
						</br>
					</div>
					<script type="text/javascript">
$(document).ready(function() {    
    $('#item<?php echo $row['itemid']?><?php echo $row['pid']?>').click(function(){   
	var itemid = <?php echo $row['itemid']?>;
	var pid = <?php echo $row['pid']?>;	
	window.location.href="additem.php?itemID="+itemid+"&pid="+pid;
});
});
</script>

<?php } ?>
					
					<div class="clearfix"> </div>
					
				</div>
				
				
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">Message</h4>
        </div>
        <div class="modal-body">
          <h2 align="center">Item Successfully added to cart.</h2>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" >Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
	<!-- //banner -->
<?php include 'includes/footer.php'?>
