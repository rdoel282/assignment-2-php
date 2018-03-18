<?php 

class ImagesGateway extends DatabaseGateway { 
   
    protected $connection;
   
   public function __construct($connect)    {
    parent::__construct($connect);
    
    $this->connection = $connect;
   }    
   
   protected function getSelectStatement()
   {    
    return "select Path, ImageID, Description, Title, Longitude, Latitude from ImageDetails";
   } 
   
    protected function getOrderFields()    {
    return 'LastName';
    } 

   protected function getPrimaryKeyName() {
    return "CountryCodeISO"; 
   }   
   
     protected function joinSelectStatement(){
      return "select Description, Path, FirstName, LastName, CountryName, ISO, Users.UserID, Title, AsciiName, Cities.CityCode from ImageDetails join Users on Users.UserID = ImageDetails.UserID join Countries on ISO = CountryCodeISO join Cities on Cities.CityCode = ImageDetails.CityCode";
  }

 function filter2(){
  
    //default all images  
    $sql = "Select Path, ImageID, Description, Title, CityCode, CountryCodeISO, ContinentCode from ImageDetails";
    $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
    return $statement->fetchAll(); 
   }
 
 
}

?>