<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "newgestionvols");

?>
<link rel="stylesheet" href="css/profile.css">
<div class="container">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                
                <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">  Profile</a>
                </li>
            </ul>
            <div class="tab-content py-4" id="content">
                <div class="tab-pane active" id="profile">
                <h5 class="mb" ><?php echo "Welcomm"." ".$_SESSION['user']['username'];?></h5>
            
        
                    <!--/row-->
                
                    <table class="table table-hover table-striped">
                        <tbody>                                    
                         
                        </tbody> 
                    </table>
                </div>

                <?php 
                $idUser = $_GET['id'];  
                $sqluser = "SELECT * FROM users WHERE iduser = ' $idUser '";
                $user = mysqli_query($db, $sqluser);
                $user_rows = mysqli_num_rows($user);
                if ($user_rows > 0) {
                while ($user_data =  mysqli_fetch_array($user)) {
                    $userName = $user_data['username'];
                    $userEmail = $user_data['mail'];
                    $userid = $user_data['iduser'];
                ?>
                <div class="tab-pane">
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


