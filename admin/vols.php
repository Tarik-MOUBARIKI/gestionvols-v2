<?php
   session_start(); 
   
   include "header.php";
   include  "les classe/volsclass.php";
   
    $db = mysqli_connect("localhost", "root", "", "newgestionvols");
    $query = mysqli_query($db, "SELECT * from vols");

    if (isset($_POST['add'])){

      $depart            = $_POST['depart'];
      $destination       = $_POST['destination'];
      $date_depart       = $_POST['date'];
      $time              = $_POST['time'];
      $prix              = $_POST['prix'];
      $place_disponible  = $_POST['place'];
      $status            = $_POST['status'];
    
	  $vols = new Vol();
	  $vols->vol_insert($depart, $destination, $date_depart, $time, $prix, $place_disponible,$status );

	  header("Location: vols.php");

	}

?>


 <!-- My Box Content -->
    
            <div class="session">
            <?php echo "HELLO ADMIN". ' '. $_SESSION['user']['username'];?>
            </div>
            
        </nav>
 <div class="boxContent">
     <div class="firstRow">
  
	
   
 
<div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Management <b>Vols</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Vol</span></a>
						<!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						 -->
					</div>
                </div>
			</div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
                        <th>Départ->Déstination</th>
                        <th>Date Départ</th>
						<th>L'heure de Départ</th>
                        <th>Prix</th>
                        <th>Nmbr de place</th>
                        <th>Actions</th>
                    </tr>
				</thead>
				<?php while($row = mysqli_fetch_array($query)) {
        
		?>
                <tbody>
				
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
            <td><?php echo $row['depart'].' '.'to'.' '.$row['destination'];?></td>
				       <td><?php echo $row['date_depart'];?></td>
                       <td><?php echo $row['time'];?></td>
					   <td><?php echo $row['prix'];?></td>
					   <td><?php echo $row['place_disponible'];?></td>
						
						<td>
							
						<a href="editvol.php?id=<?php echo $row['idVol'];?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							
						</td>
					</tr>
                
				<?php } ?>
                </tbody>
            </table>

    </div>
<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post" action="">
					<div class="modal-header">						
						<h4 class="modal-title">Add Vol</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>depart</label>
							<input type="text" class="form-control" name="depart" placeholder="Enter depart" required>
						</div>
						<div class="form-group">
							<label>Destination</label>
							<input type="text" class="form-control" name="destination" placeholder="Enter destination" required>
						</div>
						<div class="form-group">
							<label>Date depart</label>
							<input type="date"class="form-control" name="date" placeholder="Enter la date" required>
						</div>
						<div class="form-group">
							<label>Time</label>
							<input type="text" class="form-control" name="time" placeholder="Enter time">
            </div>
            <div class="form-group">
							<label>Price</label>
							<input type="text" class="form-control" name="prix" placeholder="Enter Price">
            </div>
            <div class="form-group">
              <label>Place desponible</label>
              <input type="number" class="form-control" placeholder="Enter numbre place" name="place" min="1" max="50">
			
							
						</div>	
						<div class="form-group">
            <label for="exampleInputEmail1">Status</label>
             <select name="status" class="form-control" id="inputGroupSelect01">

              <option value="Activer">Activer</option>
              <option value="Desactiver">Desactiver</option>

             </select>
             </div>				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" name="add" value="Add" >
					</div>
				</form>
			</div>
		</div>
	</div>
	
<?php include "footer.html";  ?>
           
           
                                       		                            
</body>
</html>