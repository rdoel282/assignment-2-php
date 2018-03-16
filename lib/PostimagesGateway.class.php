<?php

class PostimagesGateway extends DatabaseGateway { 
   
   public function __construct($connect)    {
    parent::__construct($connect);
   }    
   
   protected function getSelectStatement()
   {    
    return "SELECT ImageID, PostID FROM PostImages";
   } 
   
    protected function getOrderFields()    {
    return 'LastName';
    } 

   protected function getPrimaryKeyName() {
    return "PostID"; 
   }   
   
  protected function joinSelectStatement(){
      return "SELECT PostImages.ImageID, PostID, Path, Description FROM PostImages Join ImageDetails on PostImages.ImageID = ImageDetails.ImageID";

    }

}

?>