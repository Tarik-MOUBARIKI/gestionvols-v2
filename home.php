<?php 
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <img src="img/logo.png" alt="">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">About</a>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $_SESSION['user']['username'];?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="profil.php?id=<?php echo $_SESSION['user']['iduser'];?>">Profil</a>

        </div>
      
        </div>
      </li>
      <a class="nav-item nav-link" href="#">Contat us</a>
    </div>
  </div>
</nav>


<div class="header">
  <form action="index.php" method="post">
  <h1> Flyvoyage </h1>
    <p>Ou voulez-vous voyager?</p>
    <div class="font-box">

    <select name="depart" class="search-field skills" id="inputGroupSelect01">
        <option selected>DE</option>
        <option value="Casablanca">Casablanca</option>
        <option value="fes">Fès</option>
        <option value="safi">safi</option>
        <option value="Agadir">Agadir</option>
        <option value="Marrakech">Marrakech</option>
    </select>
    </div>
    <div class="font-box">

    <select name="destination" class="search-field skills" id="inputGroupSelect01">
        <option selected>A</option>
        <option value="Casablanca">Casablanca</option>
        <option value="fes">Fès</option>
        <option value="safi">safi</option>
        <option value="Agadir">Agadir</option>
        <option value="Marrakech">Marrakech</option>
    </select>
    </div>
    <div class="font-box">

    <button class="search-btn" type="submit" name="submit">Search</button>

    </div>
  </form>
</div>

<center>
<h2>les vols disponibles</h2>

</center>
<table class="table">
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">Depart</th>
      <th scope="col">Destianation</th>
      <th scope="col">date de depart</th>
      <th scope="col">Time</th>
      <th scope="col">Price</th>
      <th scope="col">nombre de Place</th>
      <th scope="col">Reservation</th>
    </tr>
  </thead>
                
    <?php 
            $db = mysqli_connect("localhost","root","","db_gestionVols");
            if (isset($_POST['submit'])){
                $depart = $_POST['depart'];
                $destination = $_POST['destination'];
                $query = mysqli_query($db, "SELECT * FROM Vols WHERE depart = '$depart' AND destination = '$destination' AND place_disponible > 0 "); 
      
                if (mysqli_num_rows($query) > 0 ) {
                while ($row = mysqli_fetch_array($query)){
                  $id = $row['idVol'];
                    
                    
     ?>

     
                <tbody>
                    <tr class="table-active">
                      
                      <td><?php echo $row['depart']; ?></td>
                      <td><?php echo $row['destination'];?></td>
                      <td><?php echo $row['date_depart']; ?></td>
                      <td><?php echo $row['time']; ?></td>
                      <td><?php echo $row['prix'];?>MAD</td>
                      <td><?php echo $row['place_disponible']; ?></td>
                      <td><button type="button" class="btn btn-dark">
                      <a href="reservation.php?id=<?php echo $id; ?>">Reserver</a></button></td>  
                     
                    </tr>
                  </tbody>
   <?php } }
     else { echo "<script> alert('Aucun vol disponible')</script>"; }
   }
   ?> 
   
     </table>

         <!--start footer-->
    <div class="ft">
      <div class="ft1con">
      <input type="text" placeholder="enter your email">
      <button type="button">send</button>
      </div>
    </div>
   

    <div class="footer">

    <div class="f1">
      <img src="img/logo.png" width="60px" height="60px" style="margin-bottom: 20px;">
     <p>Fusce dapibus, tellus ac cursus commodo,<br>
      tortor mauris. Fusce dapibus, tellus ac cursus <br>
      commodo, tortor mauris. </p>
    </div>
    
    <div class="f2">
        
        <ul>
            <div class="h2"><h2>Quick Links</h2></div>
            <li><a href="#"> <i class="fa fa-arrow-right"></i>Home</a></li>
            <li><a href="#"> <i class="fa fa-arrow-right"></i>About US</a></li>
            <li><a href="#"> <i class="fa fa-arrow-right"></i>Services</a></li>
            <li><a href="#"> <i class="fa fa-arrow-right"></i>Promo</a></li>
            <li><a href="#"> <i class="fa fa-arrow-right"></i>Gallery</a></li>
            <li><a href="#"> <i class="fa fa-arrow-right"></i>Contact</a></li>
        </ul>
        
     </div>
 
     <div class="f3">
      <div><h2>Contact us</h2></div>
      <p>Feel free to get in touch with us via phone or send<br>
        us a message</p>
      <h3>+1 800 123 1234</h3>
      </div>
    </div>

    <div class="lastfooter">
      <div class="lastft">
        <div class="lastspan">@Copyright 2020. All Right Reserved</div>
        <div class="lastul">
          <ul>
            <li>Privacy Policy</li>
            <li>Terms & Conditions</li>
          </ul>
          
        </div>
      </div>
    </div>

</body>
</html>