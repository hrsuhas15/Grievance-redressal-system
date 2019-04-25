<?php
  class Userlog
  {
    // DB Stuff
    private $conn;
    private $table = 'USER_LOG';

    // Properties
    public $usn;
    public $inTime;
    public $outTime;
    public $userIP;

    // Constructor with DB
    public function __construct($db)
    {
      $this->conn = $db;
    }
    public function insert()
    {
         // if($this->norowcheck()) return false;
          $query = "INSERT INTO USER_LOG(usn,userIP) VALUES('$this->usn','$this->userIP')";
          // Prepare statement
          $stmt = $this->conn->prepare($query1);
          // Execute query
          //$stmt1->execute();
          if($stmt->execute())
          {
            return true;
          }
          // Print error if something goes wrong
          //printf("Error: %s.\n", $stmt->error);
          return false;
     }
  }
