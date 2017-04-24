<?php include 'includes/header.php'?>
<?php
require('connect.php');
if(isset($_SESSION['userID'])){
$userID = $_SESSION['userID'];
//$itemid = $_GET['itemid'];
$query = "SELECT * FROM `cart` WHERE userID='$userID'";
$result = mysql_query($query);
$nor = mysql_num_rows($result);
$total_price = 0;
//$row = mysql_fetch_array($result);
if($nor == 0) {
	echo "</br>";
	echo "<h4 align='center'>";	
    echo "<font class='bg-danger'>Currently cart is empty.</font>";
    echo "</h4>";
}
}
else{
	$result = 0;
}
?>
</br>				  
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">								
								<h3 align="center">Cart Panel</h3>
																
					</div>
				</div>
				
				<div class="panel-body">
<?php
if($result!=0){
					while($row = mysql_fetch_array($result)){	
					$itemid = $row['itemid'];
$query1 = "SELECT * FROM `items` WHERE itemid='$itemid'";
$result1 = mysql_query($query1);
$row1 = mysql_fetch_array($result1);

   
?>				
					<div class="row">
						<div class="col-xs-2"><img class="img-responsive" src="images/<?php echo $row1['iimg'] ?>" width="100px">
						</div>
						<div class="col-xs-7">						
						<h4 class="product-name"><strong>Name:<?php echo $row1['itemname']?></strong></h4>
						<h4 class="product-name"><strong>Price:$<?php echo $row1['amount']?>.00</strong></h4>
						<h4 class="product-name"><strong>Discount:$<?php echo $row1['disamt']?>.00</strong></h4>
						<h4 class="product-name"><strong>Total:$<?php echo $row1['amount'] - $row1['disamt']?>.00</strong></h4>						
							<?php
							$t = $row1['amount'] - $row1['disamt'];
							$total_price += $t;
							?>	
						</div>
						
						<div class="col-xs-3">
							
								<button type="button" class="btn btn-success" id="modify<?php echo $row1['itemid']?>" >
									<span class="glyphicon glyphicon-remove"> Delete </span>
								</button>
							
							
						</div>
						
					</div>
					<hr>
					
					<script type="text/javascript">
		$(document).ready(function() {    
        $('#modify<?php echo $row1['itemid']?>').click(function(){
        var conf = confirm("Do you want to Delete it ?");
		var itemid = <?php echo $row1['itemid']?>;
	        if(conf == true)
	           {		         
		        window.location.href="delete.php?itemid="+itemid;		
	           } 	
	
        });
        });
		</script>
			
					
					<?php
}
						
}
else{
echo "</br>";
echo "<h4 align='center'>";	
echo "<font class='bg-danger'>Please Login ...</font>";
echo "</h4>";
}
						?>
						<?php if($nor != 0){ ?>
						<div>
						<div class="row" align="right">
					<h4 class="product-name"><strong>Grand Total: $<?php echo $total_price ?>.00</strong></h4>
					</div>
					</br>
					<div class="row" align="right">
								<button type="button" class="btn btn-primary">
									<span class="glyphicon glyphicon-ok"> CHECKOUT</span>
								</button>						
								
							</div>
							</div>
						<?php } ?>
				</div>				
			</div>
		</div>
	</div>
</div>
						
						</br>
						<?php include 'includes/footer.php'?>