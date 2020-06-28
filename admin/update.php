
<?php
include "header.php"; 
include "les classe/userclass.php";
$db = mysqli_connect("127.0.0.1", "root", "", "newgestionvols");

   $id=$_GET['id'];
   $query = mysqli_query($db,"SELECT * from users where iduser='$id'");

    if ($row = mysqli_fetch_array($query)) {
    }

if (isset($_POST['modifier'])) {
    $id1             = $_POST['id1'];
    $name            = $_POST['user'];
    $email           = $_POST['email'];
    $password        =$_POST['pass'];
    $status          =$_POST['status'];

    $users = new User();
    $users->user_update($id1, $name, $email, $password, $status);

    if($users == true){
     header("location: admin.php?message=This is a success alert—check it out!");
   }

}
?>

<link rel="stylesheet" href="css/update.css">
</nav>
<div class="boxContent">
<div class="firstRow">

<form action="" method="post">
<h2 style="text-align:center; margin-bottom: 30px">Edit Admin</h2>
<input type="hidden" name="id1" value="<?php echo $row['iduser']; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">furstName</label>
    <input type="text" class="form-control" name="user" value="<?php echo $row['username']; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Adress Email</label>
    <input type="email" class="form-control "name="email" value="<?php echo $row['mail']; ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="text" class="form-control" name="pass" value="<?php echo $row['pass_word']; ?>">
  </div>

  <div class="form-group">	
     <input type="hidden" class="form-control" name="status" value="<?php echo $row['statu']; ?>">
      
  </div>
 
  <button type="submit" class="btn btn-success" name="modifier">Submit</button>
  <button type="submit" class="btn btn-red"><a href="admin.php">cannel</a></button>
</form>


<?php include "footer.html";  ?>