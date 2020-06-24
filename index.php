<!DOCTYPE html>
<html lang="en">
<?php
session_start();
     
	//  PHP LOGIN

	 $conn = mysqli_connect('localhost', 'root', '', 'newgestionvols');
	 if(isset($_POST['submit'])){
		 $username = $_POST['username'];
		 $pass = $_POST['password'];
	 
		 $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND pass_word = '$pass'" );
		 if(mysqli_num_rows($query) > 0 )
			 {
				 $_SESSION['user'] = mysqli_fetch_array($query);
				 if( $_SESSION['user']['statu'] == 'Admin')
				 {
				 header('location: admin/vols.php');
				 } 
				  else{ header('location: home.php'); }
			  }
	 
	 }

	// PHP SIN UP

	include "admin/les classe/userclass.php";

    if (isset($_POST['register'])){

      $user            = $_POST['user'];
      $mail            = $_POST['mail'];
	  $pass            = $_POST['pass'];
	  $confirmation    =$_POST['confirmation'];
	  $status          = $_POST['status'];
	
	  if($pass == $confirmation){
	  $users = new User();
	  $users->user_insert($user, $mail, $pass, $status);

	  if($users == true){
		header("location: index.php");
	  }
	  else{
		echo "echec inscription";
		  }
		}

	}
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="css/login.css">
</head>

<body>
                     
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form action="" method="POST" enctype="multipart/from-data"   >
				<h1>Create Account</h1>

			     <input type="text" name="user" placeholder="username.." />
                 <input type="text" name="mail" placeholder="mail.." />
                 <input type="password" name="pass" placeholder="Password..." />
				 <input type="password" name="confirmation"   placeholder="confirmation.." />
                 <input type="hidden" name="status"  value="User" />
                
				<button  type="submit" name="register">Sign Up</button>
			</form>
		</div>
		<div class="form-container sign-in-container">   
			<form action="" method="POST">
	
				<input type="text" name="username"   placeholder="username" />
				 <!--  <span><?php echo $passwordErr;   ?></span> -->
				<input type="password" name="password" placeholder="Password" />
				
				<button type="submit" name="submit">Sign In</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Sign in</h1>
					<p>To keep connected with us please login with your personal info</p>
					<button class="ghost" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Hello, Friend!</h1>
					<p>Enter your personal details and start journey with us</p>
					<button class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>



	<script>
		const signUpButton = document.getElementById('signUp');
		const signInButton = document.getElementById('signIn');
		const container = document.getElementById('container');

		signUpButton.addEventListener('click', () => {
			container.classList.add("right-panel-active");
		});

		signInButton.addEventListener('click', () => {
			container.classList.remove("right-panel-active");
		});

	</script>
</body>

</html>
