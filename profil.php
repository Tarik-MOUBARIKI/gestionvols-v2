<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/reserver.css">
  <link rel="stylesheet" href="css/profile.css">

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
      </li>
 
      
  </div>
</nav>
<?php
$db = mysqli_connect("localhost", "root", "", "newgestionvols");

?>

<div class="container">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profil</a>
                </li>
                
             
            </ul>
            <div class="tab-content py-4" id="content">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb" ><?php echo "Bienvenue"." ".$_SESSION['user']['username'];?></h5>
                    <h5 class="mb" ><?php echo "Email:"." ".$_SESSION['user']['mail'];?></h5>
                    <p class="phrase"> votre reservation:</p>
     <?php 
            
            $idUser = $_GET['id'];
            $sql = "SELECT * FROM reservation WHERE iduser = '$idUser' ";
            $reservation = mysqli_query($db, $sql);
            $reservation_rows = mysqli_num_rows($reservation);
            if ($reservation_rows > 0) {
            echo '<table class="table">
            <tr>
            <th>Depart</th>
            <th>Destination</th>
            <th>Date reservation</th>
            <th>Prix</th>
            <th>Status</th>
            </tr>';
            while ($reservation_data = mysqli_fetch_array($reservation)) {
            $idclient   = $reservation_data['idClient'];
            $idvol      = $reservation_data['idVol'];
            $date       = $reservation_data['date_reseravtion'];
            $sqlvol     = "SELECT * FROM vols WHERE idVol = '" . $idvol . "'";
            $vol        = mysqli_query($db, $sqlvol);
            $vol_rows   = mysqli_num_rows($vol);
            if ($vol_rows > 0) {
                while ($vol_data = mysqli_fetch_array($vol)) {
                    echo "<tr>";
                    echo "<td>" . $vol_data['depart'] . "</td>";
                    echo "<td>" . $vol_data['destination'] . "</td>";
                    echo "<td>" . $date . "</td>";
                    echo "<td>" . $vol_data['prix'] . " DH</td>";
                    echo "<td>" . $vol_data['statu'] . "</td>";
                    echo "<td> <button class='btn btn-info' data-toggle='modal' data-target='#exampleModal' onclick='showClient(" . $idclient . ")'>Info</button> </td>";
                    echo "</tr>";
                }
            }
        }
    }
  ?>
                    <!--/row-->
                
                    <table class="table table-hover table-striped">
                        <tbody>                                    
                         
                        </tbody> 
                    </table>
                </div>

                <?php   
                $sqluser = "SELECT * FROM users WHERE iduser = ' $idUser '";
                $user = mysqli_query($db, $sqluser);
                $user_rows = mysqli_num_rows($user);
                if ($user_rows > 0) {
                while ($user_data =  mysqli_fetch_array($user)) {
                    $userName = $user_data['username'];
                    $userEmail = $user_data['mail'];
                    $userid = $user_data['iduser'];
                ?>
                <div class="tab-pane" id="edit">
                    <form role="form">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">First name</label>
                            <div class="col-lg-9">
                            <input type="hidden" name="id" value="<?php echo $userid ?>" >
                                <h5 class="h5"> <?php echo  $userName ?> </h5>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                            <div class="col-lg-9">
                            <h5 class="h5"><?php echo  $userEmail ?></h5>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Password</label>
                            <div class="col-lg-9">
                            <input name="password" class="form-control" type="password" placeholder="••••••">
                            </div>
                        </div>
                            <?php  }  ?>
                            <?php  }  ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">info des passager</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="demo">
        
      </div>
     
    </div>
  </div>
</div>

<script>
function showClient(str) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "userfunction.php?client=" + str, true);
  xhttp.send();
}
</script>

    
<?php include 'admin/footer.html'; ?>