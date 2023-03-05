<?php 
session_start();

include("../Assets/Connection/Connection.php");
if(isset($_POST["btnlogin"]))
{
	$email=$_POST["txtemail"];
	$password=$_POST["txtpassword"];
	
	$selqry1="select * from tbl_user where user_email='".$email."' and user_password='".$password."'";
	$result1=$Conn->query($selqry1);
	
	
	
	$selqry="select * from tbl_artist where artist_email='".$email."' and artist_password='".$password."' and artist_vstatus=1";
	$result=$Conn->query($selqry);
	
	
	$selqry2="select * from tbl_shop where shop_email='".$email."' and shop_password='".$password."' and shop_vstatus=1";
	$result2=$Conn->query($selqry2);
	
	$selqry3="select * from tbl_admin where admin_email='".$email."' and admin_password='".$password."'";
	$result3=$Conn->query($selqry3);
	

	
	if($row=$result->fetch_assoc())
	{
		$_SESSION["aid"]=$row["artist_id"];
		$_SESSION["aname"]=$row["artist_name"];
		header("Location:../Artist/Homepage.php");
	}
	
	
	else if($row1=$result1->fetch_assoc())
	{
		$_SESSION["uid"]=$row1["user_id"];
		$_SESSION["uname"]=$row1["user_name"];
		header("Location:../User/Homepage.php");
	}
	
	else if($row2=$result2->fetch_assoc())
	{
		$_SESSION["sid"]=$row2["shop_id"];
		$_SESSION["sname"]=$row2["shop_name"];
		header("Location:../Shop/Homepage.php");
	}
	
	
	else if($row3=$result3->fetch_assoc())
	{
		$_SESSION["adid"]=$row3["admin_id"];
		$_SESSION["adname"]=$row3["admin_name"];
		header("Location:../Admin/Homepage.php");
	}
	else
	{
		echo "<script>alert('Invalid Credentials!!!')</script>";
	}
}
	
		
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../Assets/Template/Login/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Galarie D Art</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Welcome to login</h2>
								<p>Don't have an account?</p>
								<a href="User.php" class="btn btn-white btn-outline-white">Sign Up</a>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
								
			      	</div>
							<form  method="post" class="signin-form">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Username</label>
			      			<input type="text" class="form-control" placeholder="Username" name="txtemail" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" class="form-control" placeholder="Password" name="txtpassword" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" name="btnlogin" class="form-control btn btn-primary submit px-3">Sign In</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../Assets/Template/Login/js/jquery.min.js"></script>
  <script src="../Assets/Template/Login/js/popper.js"></script>
  <script src="../Assets/Template/Login/js/bootstrap.min.js"></script>
  <script src="../Assets/Template/Login/js/main.js"></script>

	</body>
</html>

