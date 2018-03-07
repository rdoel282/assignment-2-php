<?php 

    protected $connection;

    public function __construct($connect)  {
          if (is_null($connect) )
             throw new Exception("Connection is null");
             
          $this->connection = $connect;
       }


?>