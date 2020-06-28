
<?php 
session_start();
$db = mysqli_connect("localhost", "root", "", "newgestionvols");

  $idVol = $_GET['id'];
//   $idClient = $_GET['idClient'];
$query1 = mysqli_query($db, "SELECT * from vols where idVol = '$idVol' ");

if ($row = mysqli_fetch_array($query1)) {
}

if (isset($_POST['reserver'])){
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $cin = $_POST['cin'];
  $phone = $_POST['phone'];
  $id_user = $_SESSION['user']['iduser'];

  $query2 = mysqli_query($db, "INSERT INTO client values('', '$nom', '$prenom', '$email', '$cin', '$phone')");
  if($query2 == true){
    $last_id = mysqli_insert_id($db);
    $query3 = mysqli_query($db, "INSERT INTO reservation values('', '$last_id','$id_user' ,'$idVol', now()) ");
  }
  
  $query4 = mysqli_query($db, " UPDATE vols SET place_disponible = place_disponible - 1 where idVol = '$idVol'  " );
  echo "<script> alert('votre reservation est valider')</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/reserver.css">

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <img src="images/logo.png" alt="">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="home.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">About</a>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $_SESSION['user']['username'];?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="profil.php?id=<?php echo $_SESSION['user']['iduser'];?>">Profil</a>
  
        
  </div>
</nav>

  <div class="header">
  <form action="" method="post">
   <div class="font-box">

   <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">idVol</th>
      <th scope="col">Depart</th>
      <th scope="col">Destination</th>
      <th scope="col">Date depart</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['idVol'];?></th>
      <td><?php echo $row['depart'];?></td>
      <td><?php echo $row['destination'];?></td>
      <td><?php echo $row['date_depart'];?></td>
      <td><?php echo $row['prix'];?>DH</td>
    </tr>
  </tbody>
</table>

    <h4>Insert Information </h4>
    <div class="font">
      <input type="text" class="search-field skills" name="nom" placeholder="Name customer">
      <input type="text" class="search-field skills" name="prenom" placeholder="first name">
    </div>

    <div class="font">
      <input type="text" class="search-field ski" name="email" placeholder="Email Adresse">
    </div>

    <div class="font">
      <input type="text" class="search-field ski" name="cin" placeholder="CIN">
    </div>

    <div class="font">
      <input type="text" class="search-field ski" name="phone" placeholder="Phone nember">
    </div>

    <div class="font">
    <button class="btn btn-dark" type="submit" name="reserver" >  Valider</button>
    
   
    </div>
    </div>
  </form>
</div>


  
</body>
</html>


