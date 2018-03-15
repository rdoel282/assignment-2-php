<?php

class PostGateway extends DatabaseGateway { 
   
   public function __construct($connect)    {
    parent::__construct($connect);
   }    
   
   protected function getSelectStatement()
   {    
    return "SELECT PostID, MainPostImage, UserID, Title, Message, PostTime FROM Posts";
   } 
   
    protected function getOrderFields()    {
    return 'LastName';
    } 

   protected function getPrimaryKeyName() {
    return "PostID"; 
   }   
   
   
  protected function joinSelectStatement(){
      return null;
  }

}

?>