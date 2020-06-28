<?php

 class User{

  public $user;
  public $mail;
  public $pass;
  public $status;

		function __construct() {
			$this->conn = new mysqli("localhost","root","", "newgestionvols");
        }
        
        
	      	function user_insert($user, $mail, $pass, $status) {	

                $query = mysqli_query($this->conn, "INSERT INTO users values('', '$user', '$mail', '$pass', '$status')");
                
                if($query == true){
                return true;	 
                }
          
                else{	
                return false;
                  }
            }


         
            
        

 }
    ?>
