<?php
  class Grievance
  {
    // DB Stuff
    public $conn;
    public $table = 'GRIEVANCE';

    // Properties
    public $grievanceId;
    public $usn;
    public $adminId;
    public $subject;
    public $deatails;
    public $status;
    public $regDate;
    public $text;

    // Constructor with DB
    public function __construct($db)
    {
      $this->conn = $db;
    }

    public function create()
    {
          $query="insert into GRIEVANCE(usn,adminId,subject,details,status) values('$this->usn','$this->adminId','$this->subject','$this->details','$this->status')";
          $stmt=$this->conn->prepare($query);
          if($stmt->execute())
          {
            return true;
          }
          return false;
     }

     // Get categories
     public function read_usn()
     { $query = "SELECT * FROM GRIEVANCE WHERE usn = ?";
       //Prepare statement
       $stmt = $this->conn->prepare($query);
       $stmt->bindParam(1, $this->usn);
         //echo " object3";
       // Execute query
       $stmt->execute();
        // echo " object4";
       return $stmt;
       // $num = $result->rowCount();
       // // Check if any posts
       //   //echo " object";
       // if($num > 0)
       // {
       //   // Post array
       //   $posts_arr = array();
       //   //$posts_arr['data'] = array();
       //   while($row = $result->fetch(PDO::FETCH_ASSOC))
       //   {
       //     extract($row);
       //     //echo"hello";
       //     $post_item = array('grievanceId' => $grievanceId,'subject' => $subject,'details' => $details,'regDate' =>$regDate,'status'=>$status);
       //     // Push to "data"
       //     array_push($posts_arr, $post_item);
       //     // array_push($posts_arr['data'], $post_item);
       //   }
       //  }
       //  return $posts_arr;
      }
      public function read()
      {
        $query = "SELECT * FROM GRIEVANCE";
        //Prepare statement
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->usn);
          //echo " object3";
        // Execute query
        $stmt->execute();
         // echo " object4";
        $result = $stmt;
        $num = $result->rowCount();
        // Check if any posts
          //echo " object";
        if($num > 0)
        {
          // Post array
          $posts_arr = array();
          //$posts_arr['data'] = array();
          while($row = $result->fetch(PDO::FETCH_ASSOC))
          {
            extract($row);
            //echo"hello";
            $post_item = array('usn'=>$usn,'grievanceId' => $grievanceId,'subject' => $subject,'details' => $details,'regDate' =>$regDate);
            // Push to "data"
            array_push($posts_arr, $post_item);
            // array_push($posts_arr['data'], $post_item);
          }
         }
         return $posts_arr;
       }

       public function grievanceCount()
       {
         $this->status="open";
         $query = "SELECT * FROM GRIEVANCE WHERE usn=? AND status=?";
         $stmt = $this->conn->prepare($query);
         $stmt->bindParam(1, $this->usn);
         $stmt->bindParam(2,$this->status);
         $stmt->execute();
         $num1 = $stmt->rowCount();
         $this->status="check";
         $stmt->bindParam(1, $this->usn);
         $stmt->bindParam(2,$this->status);
         $stmt->execute();
         $num2 = $stmt->rowCount();
         $this->status="remark";
         $stmt->bindParam(1, $this->usn);
         $stmt->bindParam(2,$this->status);
         $stmt->execute();
         $num3 = $stmt->rowCount();
         return [$num1,$num2,$num3];
        }
        public function readStatusWise()
        {
          $query = "SELECT * FROM GRIEVANCE WHERE usn=? AND status=?";
          //Prepare statement
          $stmt = $this->conn->prepare($query);
          $stmt->bindParam(1, $this->usn);
          $stmt->bindParam(2, $this->status);
            //echo " object3";
          // Execute query
          $stmt->execute();
           // echo " object4";
          return $stmt;
         }
         public function readAdminWise()
         {
           $query = "SELECT * FROM GRIEVANCE WHERE adminId=? AND status=?";
           //Prepare statement
           $stmt = $this->conn->prepare($query);
           $stmt->bindParam(1, $this->adminId);
           $stmt->bindParam(2, $this->status);
             //echo " object3";
           // Execute query
           $stmt->execute();
            // echo " object4";
           return $stmt;
          }

         public function grievanceRemarked()
         {
           $query = "SELECT * FROM GRIEVANCE
                     INNER JOIN REMARKS
                     ON  GRIEVANCE.grievanceId = REMARKS.grievanceId
                     WHERE usn=? and status=? and GRIEVANCE.grievanceId=?";
           //Prepare statement
           $stmt = $this->conn->prepare($query);
           $stmt->bindParam(1, $this->usn);
           $stmt->bindParam(2, $this->status);
           $stmt->bindParam(3, $this->grievanceId);
           // Execute query
           $stmt->execute();
            // echo " object4";
           return $stmt;
          }
          public function grievanceForAdmin()
          {
            $query = "SELECT * FROM GRIEVANCE
                      WHERE adminId=? and status=? and grievanceId=?";
            //Prepare statement
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->adminId);
            $stmt->bindParam(2, $this->status);
            $stmt->bindParam(3, $this->grievanceId);
            // Execute query
            $stmt->execute();
             // echo " object4";
            return $stmt;
           }
           public function insertRemarks()
           {
                // if($this->norowcheck()) return false;
                 $query1 = "UPDATE GRIEVANCE
                           SET status = 'remark'
                           WHERE grievanceId = '$this->grievanceId'";
                 // Prepare statement
                 $stmt1 = $this->conn->prepare($query1);
                 // Execute query
                 $stmt1->execute();
                 $query="INSERT into REMARKS(grievanceId,remarks) values('$this->grievanceId','$this->text')";
                 $stmt=$this->conn->prepare($query);
                 if($stmt->execute())
                 {
                   return true;
                 }
                 // Print error if something goes wrong
                 //printf("Error: %s.\n", $stmt->error);
                 return false;
            }
            public function remarkDetailsAdmin()
            {
              $query = "SELECT * FROM GRIEVANCE
                        INNER JOIN REMARKS
                        ON  GRIEVANCE.grievanceId = REMARKS.grievanceId
                        WHERE adminId=? and status=? and GRIEVANCE.grievanceId=?";
              //Prepare statement
              $stmt = $this->conn->prepare($query);
              $stmt->bindParam(1, $this->adminId);
              $stmt->bindParam(2, $this->status);
              $stmt->bindParam(3, $this->grievanceId);
              // Execute query
              $stmt->execute();
               // echo " object4";
              return $stmt;
             }
             public function getGrievanceUserAdmin()
             {
              // echo "suhas";
               $query = "SELECT * FROM USER,GRIEVANCE
                         WHERE status=? and GRIEVANCE.grievanceId=? and GRIEVANCE.usn = USER.usn";
               //Prepare statement
               $stmt = $this->conn->prepare($query);
               //$stmt->bindParam(1, $this->adminId);
               $stmt->bindParam(1, $this->status);
               $stmt->bindParam(2, $this->grievanceId);
               // Execute query
               $stmt->execute();
                // echo " object4";
               return $stmt;
              }
              public function updateOpenToRemark()
              {
                   // if($this->norowcheck()) return false;
                    $query1 = "UPDATE GRIEVANCE
                              SET status = 'check'
                              WHERE grievanceId = '$this->grievanceId'";
                    // Prepare statement
                    $stmt1 = $this->conn->prepare($query1);
                    // Execute query
                    if($stmt1->execute())
                    {
                      return true;
                    }
                    // Print error if something goes wrong
                    //printf("Error: %s.\n", $stmt->error);
                    return false;
               }


  }
  ?>
