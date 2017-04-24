<?php include 'includes/header.php'?>
<?php
function NewUser() {
	require('connect.php');
	$userName = $_POST['username']; 
	$email = $_POST['email']; 
	$password = $_POST['password'];
	$phone = $_POST['phone'];
	$cpassword = $_POST['cpassword'];
	
	if($password == $cpassword){
	if(strlen($phone) != 10){
	echo "</br>";
	echo "<h4 align='center'>";	
    echo "<font class='bg-danger'>Please Enter valid phone number</font>";
    echo "</h4>";
	}else{
	$query = "INSERT INTO user(username, password, email, phone) VALUES ('$userName', '$password', '$email', '$phone')"; 
	$data = mysql_query ($query)or die(mysql_error()); 
	if($data) { 
	echo "</br>";
	echo "<h4 align='center'>";	
    echo "<font class='bg-success'>YOUR REGISTRATION IS COMPLETED...PLEASE LOG IN</font>";
    echo "</h4>";	
	}	
	}
	
	}
	else{
	echo "</br>";
	echo "<h4 align='center'>";	
    echo "<font class='bg-danger'>Password and Confirm Password should be same..</font>";
    echo "</h4>";	
	}
	
	}
	function SignUp() { 
	require('connect.php');
	if(!empty($_POST['username'])) 
		{ 
	$username = $_POST['username'];
    $password = $_POST['password'];
	$query = "SELECT * FROM user WHERE username='$username' and password='$password'";
    $query = mysql_query($query);
		  
		if(!$row = mysql_fetch_array($query) or die(mysql_error()))
			{ 
		newuser(); 
		} 
		else {			
		echo "</br>";
	echo "<h4 align='center'>";	
    echo "<font class='bg-danger'>SORRY...YOU ARE ALREADY REGISTERED USER...</font>";
    echo "</h4>";
			 
		}
		}
		} 
		function Login() { 
		require('connect.php');
		if (isset($_POST['username']) and isset($_POST['password'])){
$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$count = mysql_num_rows($result);
if ($count == 1){
$_SESSION['username'] = $username;
$_SESSION['userID']= $row[userID];
echo "<script>";
echo "window.location='index.php'";
echo "</script>";
}
else{
echo "</br>";
echo "<h4 align='center'>";	
echo "<font class='bg-danger'>Invalid Login Credentials</font>";
echo "</h4>";
}
}
		}

		
		if(isset($_POST['submit'])) {
			
			SignUp(); 
		}
		if(isset($_POST['login'])) {
			
			Login(); 
		}
?>
<!-- //header -->
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
				<li>Sign In & Sign Up</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
	<div class="banner">
		
		<div class="w3l_banner_nav_center">
<!-- login -->
		<div class="w3_login" align="center">
			<h3>Sign In & Sign Up</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
					<div class="tooltip">Click Me</div>
				  </div>
				  <div class="form">
					<h2>Login to your account</h2>
					<form  method="post">
					  <input type="text" name="username" placeholder="Username" required=" ">
					  <input type="password" name="password" placeholder="Password" required=" ">
					  <input type="submit" value="Login" name="login">
					</form>
				  </div>
				  <div class="form">
					<h2>Create an account</h2>
					<form  method="post" >
					  <input type="text" name="username" placeholder="Username" required=" ">
					  <input type="password" name="password" placeholder="Password" required=" ">
					   <input type="password" name="cpassword" placeholder="Confirm Password" required=" ">
					  <input type="email" name="email" placeholder="Email Address" required=" ">
					  <input type="number" name="phone" placeholder="Phone Number" required=" " class="form-control">
					  </br>
					  <input type="submit" value="Register" name="submit">
					</form>
				  </div>
				  
				</div>
			</div>
			<script>
				$('.toggle').click(function(){
				  // Switches the Icon
				  $(this).children('i').toggleClass('fa-pencil');
				  // Switches the forms  
				  $('.form').animate({
					height: "toggle",
					'padding-top': 'toggle',
					'padding-bottom': 'toggle',
					opacity: "toggle"
				  }, "slow");
				});
			</script>
		</div>
<!-- //login -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->

	<?php include 'includes/footer.php'?>