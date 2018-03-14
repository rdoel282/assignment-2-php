<?php 

class ImagesGateway extends DatabaseGateway { 
   
   public function __construct($connect)    {
    parent::__construct($connect);
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

}

?>