<?php
                    //Here Its a Final Class 
 final class Dtbs {  
                                              //Protectedd
      protected $con;
                           //Simple Public  
      public $error;
            //Public Functionn and with Constructorr
      public function __construct(){ 
        $this->con = mysqli_connect("localhost", "Danik999", "Danik998", "asgnmntSix");  
    
         if(!$this->con) {  
                echo 'DataBase   error ' . mysqli_connect_error($this->con); 
            }
        }
        //It's a Final Function number one
    final function insert($table, $data){  
           $string = "INSERT INTO ".$table." (";            
           $string .= implode(",", array_keys($data)) . ') VALUES (';            
           $string .= "'" . implode("','", array_values($data)) . "')";  
           if(mysqli_query($this->con, $string))  {return true;}  
           else  {echo mysqli_error($this->con);}  
        }  

                //It's a Final Function number two
    final function select($table){
                 $arrrrray = array();
                $q = "SELECT * FROM .$table";
                $r = mysqli_query($this->con,$q);
                    while($columns=mysqli_fetch_assoc($r)){
                        $arrrrray[] = $columns;
                }
                return $arrrrray;
        }
             //Public Function with    Destructor
        public function __destruct(){
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "Taibek Daniyar Anuarbekuly  ";          
        }
                  
            
    }
?>



                                    <!--           I used Final Insert Method         -->
