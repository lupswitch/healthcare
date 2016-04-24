<!DOCTYPE html>

<?php
	include("config.php");
	session_start();
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$password = mysqli_real_escape_string($conn,$_POST['password']);
		
		$sql = "SELECT hs_name from hospital_staff where hs_email = '$email' and hs_password_hash = '$password' ";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		$count = mysqli_num_rows($result);
		
		if($count == 1){
			$_SESSION['user_type'] = "hospital_staff";
			$_SESSION['user_email'] = $email;
			$_SESSION['user_name'] = $row['hs_name'];
						
			header("location: hospital_staff_index.php");
		}else{
			echo "<b>Your Login email or Password is invalid. <br> Please try again!</b>";
		}
		
	}
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Healthcare</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>
<body>
	<div class="vertical-center">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4 well">
					
					<h1 class="text-center">Hospital staff Login</h1>
		
					<form action="/chat.html">
						<div class="form-group">
							<label>Email</label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-user"> </i>
								</span>
								<input type="email" name="email" class="form-control" required>	
							</div>						
						</div>

						<div class="form-group">
							<label>Password</label>
							<div class="input-group">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-comment"></i>
							</span>
								<input type="password" name="password" class="form-control" required>	
							</div>
							
						</div>

						<div class="form-group">
							<input type="submit" value="LOGIN" class="btn btn-primary btn-block">	
						</div>
						
					</form>			
				</div>
			</div>

		</div>
	
	</div>
		
</body>
</html>