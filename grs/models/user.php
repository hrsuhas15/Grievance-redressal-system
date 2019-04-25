<?php
  class User
  {
    // DB Stuff
    private $conn;
    private $table = 'USER';

    // Properties
    public $usn;
    public $name;
    public $mobile;
    public $email;
    public $password;

    // Constructor with DB
    public function __construct($db)
    {
      $this->conn = $db;
    }


    // Get categories
    /*public function read()
    { $query = "SELECT * FROM USER";
      //Prepare statement
      $stmt = $this->conn->prepare($query);
      // Execute query
      $stmt->execute();
      $result = $stmt;
      $num = $result->rowCount();
      // Check if any posts
      if($num > 0)
      {
        // Post array
        $posts_arr = array();
        $posts_arr['data'] = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
          extract($row);
          //echo"hello";
          $post_item = array('usn' => $usn,'name' => $name,'mobile' => $mobile,'email' =>$email);
          // Push to "data"
          array_push($posts_arr, $post_item);
          // array_push($posts_arr['data'], $post_item);
        }
       }
       return $posts_arr;
     }*/
     // Get Single Post
     /*public function read_single()
     {
          if($this->norowcheck()) return false;
          // Create query
          $query = "SELECT * FROM USER WHERE usn = ?";
          // Prepare statement
          $stmt = $this->conn->prepare($query);
          // Bind ID
          $stmt->bindParam(1, $this->usn);
          // Execute query
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          // Set properties
          return array(
          'categoryId' => $row['usn'],
          'name' => $row['name'],
          'mobile' => $row['mobile'],
          'email' => $row['email'],
          //'password' => $row['password'],
          );
    }*/

    public function  norowcheck()
    {   // echo "sankam";
          // Create query
          $query = "SELECT * FROM USER WHERE usn = ?";
          // Prepare statement
          $stmt = $this->conn->prepare($query);
          // Bind ID
          $stmt->bindParam(1, $this->usn);
          // Execute query
          $stmt->execute();
          $num=$stmt->rowCount();
          //echo $num;
          if($num==0)
           return true;
          else
           return false;

    }
    public function create()
    {
          if(!$this->norowcheck()) return false;
          $query="INSERT INTO USER(usn,name,mobile,email,password) VALUES('$this->usn','$this->name','$this->mobile','$this->email','$this->password')";
          $stmt=$this->conn->prepare($query);
          //echo "suhas";
          if($stmt->execute())
          {   //echo "suhas1";
            return true;
          }
            //echo "suhas2";
          // Print error if something goes wrong
          //printf("Error: %s.\n", $stmt->error);
          return false;
     }

     public function toUpdateUser()
     {
       $query = "SELECT * FROM USER WHERE usn = '$this->usn'";
       // Prepare statement
       $stmt = $this->conn->prepare($query);
       // Bind ID
       //$stmt->bindParam(1, $this->usn);
       // Execute query
       $stmt->execute();

       return $stmt;
     }

     public function login()
     {
       //echo "sank";
       //if($this->norowcheck()) return false;
       // Create query
       $query = "SELECT usn,password FROM USER WHERE usn = ?";
       // Prepare statement
       $stmt = $this->conn->prepare($query);
       // Bind ID
       $stmt->bindParam(1, $this->usn);
       // Execute query
       $stmt->execute();
       $row = $stmt->fetch(PDO::FETCH_ASSOC);
       // Set properties
       if(!strcasecmp($this->usn,$row['usn']) && $this->password == $row['password'])
       {
         return true;
       }
       else
       {
        return false;
       }
     }
    public function update()
    {
               //        if($this->norowcheck()) return false;
             $query = "UPDATE USER
                      SET name = '$this->name', mobile = '$this->mobile' , email= '$this->email'
                      WHERE usn = '$this->usn'";
            // Prepare statement
            $stmt = $this->conn->prepare($query);
            // Execute query
            if($stmt->execute())
            {
              return true;
            }
            // Print error if something goes wrong
            printf("Error: %s.\n", $stmt->error);
            return false;
    }
/*
    public function delete()
    {
            if($this->norowcheck()) return false;
            $query = "DELETE FROM USER
                      WHERE usn = '$this->usn'";
            // Prepare statement
            $stmt = $this->conn->prepare($query);
            // Execute query
            if($stmt->execute())
            {
              return true;
            }
            // Print error if something goes wrong
            printf("Error: %s.\n", $stmt->error);
            return false;
    }*/
  }
  ?>
