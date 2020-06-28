<?php

 class Vol{

  public $idVol;
  public $depart;
  public $destination;
  public $date_depart;
  public $time;
  public $prix;
  public $place_disponible;
  public $status;

		function __construct() {
			$this->conn = new mysqli("localhost","root","", "newgestionvols");
        }
        
        // --------Insert Function----------
	      	function vol_insert($depart, $destination, $date_depart, $time, $prix, $place_disponible, $status) {	

                $query = mysqli_query($this->conn, "INSERT INTO vols values ('', '$depart', '$destination', '$date_depart', '$time', '$prix', '$place_disponible', '$status')");
                
                if($query == true){
                return true;	 
                }
          
                else{	
                return false;
                  }
            }


         // --------Update Function----------
           function vol_update($id1, $depart, $destination, $date_depart, $time, $prix, $place_disponible, $status) {
            mysqli_query($this->conn,"UPDATE vols set depart = '$depart', 
            destination = '$destination', 
            date_depart = '$date_depart', 
            time = '$time', 
            prix = '$prix', 
            place_disponible = '$place_disponible', 
            statu = '$status' 
            where idVol = '$id1'");
          }

         
          

 }
    ?>
