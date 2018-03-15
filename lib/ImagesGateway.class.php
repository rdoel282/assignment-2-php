<?php 

class ImagesGateway extends DatabaseGateway { 
   
    protected $connection;
   
   public function __construct($connect)    {
    parent::__construct($connect);
    
    $this->connection = $connect;
   }    
   
   protected function getSelectStatement()
   {    
    return "select Path, ImageID, Description, Title from ImageDetails";
   } 
   
    protected function getOrderFields()    {
    return 'LastName';
    } 

   protected function getPrimaryKeyName() {
    return "CountryCodeISO"; 
   }   
   
     protected function joinSelectStatement(){
      return "select Path, ImageID, Description, Title from ImageDetails where CountryCodeISO = 'BS'";
  }

 function filter2(){
  
    //default all images  
    $sql = "Select Path, ImageID, Description, Title, CityCode, CountryCodeISO, ContinentCode from ImageDetails";
    $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
    return $statement->fetchAll(); 
   }
 
 
}

?>