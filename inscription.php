<?php
//    session_start();
	$db = mysqli_connect("127.0.0.1", "root", "", "db_gestionvols");

	include "admin/les classe/userclass.php";

    if (isset($_POST['sinup'])){

      $user            = $_POST['username'];
      $mail            = $_POST['mail'];
	  $pass            = $_POST['pass'];
	  $confirmation    =$_POST['confirmation'];
	  $status          = $_POST['status'];
	
	  if($pass == $confirmation){
	  $users = new User();
	  $users->user_insert($user, $mail, $pass, $status);

	  if($users == true){
		header("location: inscription.php?msg=successfully registered ");
	  }
	  else{
		header("location: inscription.php?error=Not registered successfully ");
	  }
	  }

	  
	}
	
?>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/logi.css">

<body>
	
	<div class="limiter">
	
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form action="" method="POST" class="login100-form">
				<?php
					if (isset($_GET['msg'])) {
						$message = $_GET['msg'];
						echo  "<div class='alert alert-success'>".$message."</div>";  
					}
					if (isset($_GET['error'])) {
						$mgsError = $_GET['error'];
						echo  "<div class='alert alert-danger'>".$mgsError."</div>";  
					}
					
				?>	 
					<span class="login100-form-title p-b-32">Sin Up</span>

					<span class="txt1 p-b-11">Username</span>
					<div class="wrap-input100 validate-input m-b-36">
						<input class="input100" type="text"  name="username" required>
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">Adress Email</span>
					<div class="wrap-input100 validate-input m-b-36">
						<input class="input100" type="email"  name="mail" required>
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">Password</span>
					<div class="wrap-input100 validate-input m-b-12">	
						<input class="input100" type="password" name="pass" required>
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">confirmation Password</span>
					<div class="wrap-input100 validate-input m-b-12">	
						<input class="input100" type="password" name="confirmation" required>
						<span class="focus-input100"></span>
					</div>

					<input value="User" class="input100" type="hidden"  name="status" >
					
					

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="sinup">Regester</button>
						<button class="login100-form-btn" name="sinup"><a href="index.php">Login</a></button>
					</div>
				</form>
                                        
			</div>
		</div>
	</div>
</body>
</html>
