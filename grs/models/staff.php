<?php
  class Staff
  {
    // DB Stuff
    private $conn;
    private $table = 'STAFF';

    // Properties
    public $categoryId;
    public $staffId;
    public $name;
    public $work;
    public $mobile;
    public $email;

    // Constructor with DB
    public function __construct($db)
    {
      $this->conn = $db;
    }
    public function read()
    { $query = "SELECT * FROM STAFF";
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
        //$posts_arr['data'] = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
          extract($row);
          //echo"hello";
          $post_item = array('staffId' => $staffId,'name' => $name,'work' =>$work,'mobile' =>$mobile,'email' =>$email);
          // Push to "data"
          array_push($posts_arr, $post_item);
          // array_push($posts_arr['data'], $post_item);
        }
       }
       return $posts_arr;
     }
     public function readStaffToUpdate()
     {
        $query = "SELECT * FROM STAFF WHERE staffId='$this->staffId'";
        //Prepare statement
        $stmt = $this->conn->prepare($query);
        // Execute query
        $stmt->execute();
        return $stmt;
     }
     public function readCategoryStaffs()
     {
    //   echo "s";
       $query = "SELECT staffId,name,work,STAFF.mobile,STAFF.email FROM STAFF
                 INNER JOIN ADMIN
                 ON ADMIN.categoryId=STAFF.categoryId
                 WHERE ADMIN.adminId=?";
       //Prepare statement
       $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->adminId);
       // Execute query
       $stmt->execute();
       return $stmt;
      }
    public function create()
    {
          $query="INSERT into STAFF(categoryId,name,work,mobile,email) values('$this->categoryId','$this->name','$this->work','$this->mobile','$this->email')";
          $stmt=$this->conn->prepare($query);
              // echo "shsr";
          if($stmt->execute())
          {  //   echo "sssssshr";
            return true;
          }
          // echo "shr";
          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);
          return false;
     }

     public function update()
     {
             if($this->norowcheck()) return false;
             $query = "UPDATE STAFF
                       SET name = '$this->name', work = '$this->work', mobile = '$this->mobile', email = '$this->email'
                       WHERE staffId = '$this->staffId'";
             // Prepare statement
             $stmt = $this->conn->prepare($query);
             // Execute query
            // echo " suuu";
             if($stmt->execute())
             {
               return true;
             }
            // echo "r";
             // Print error if something goes wrong
             printf("Error: %s.\n", $stmt->error);
             return false;
     }
     public function  norowcheck()
     {
           // Create query
           $query = "SELECT * FROM STAFF WHERE categoryId = ? and staffId= ?";
           // Prepare statement
           $stmt = $this->conn->prepare($query);
           // Bind ID
           $stmt->bindParam(1, $this->categoryId);
           $stmt->bindParam(2, $this->staffId);
           // Execute query
           $stmt->execute();
           $num=$stmt->rowCount();
         //  echo $num;
           if($num==0)
            return true;
           else
            return false;

     }
     public function delete()
     {
             if($this->norowcheck()) return false;
             $query = "DELETE FROM STAFF
                       WHERE staffId = '$this->staffId'";
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
}
