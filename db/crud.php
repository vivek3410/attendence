<?php
  class crud{
    // private database object
    private $db;

      // constructor to initalize private variable to the database connection
    function __construct($conn){
      $this->db = $conn;
    }

    // function to insert a new record into the attendee database
    public function insertAttendees($fname, $lname, $dob, $email, $contact , $speciality){
      try {
        // define sql statement to be excuted
        $sql = "INSERT INTO attendence(firstname,lastname,dateofbirth,emailaddress,contactnumber,speciality_id) VALUES (:fname,:lname,:dob,:email,:contact,:speciality)";
        // prepare the sql statement for excution
        $stmt = $this->db->prepare($sql);
        // bind all placeholders to the actual values
        $stmt->bindparam(':fname',$fname);
        $stmt->bindparam(':lname',$lname);
        $stmt->bindparam(':dob',$dob);
        $stmt->bindparam(':email',$email);
        $stmt->bindparam(':contact',$contact);
        $stmt->bindparam(':speciality',$speciality);

        $stmt->execute();

        return true;
      } catch (PDOException $e) {
          echo $e->getMessage();
          return false;
      }
    }
    public function editAttendee($id,$fname, $lname, $dob, $email, $contact , $speciality){
      try{
        $sql = "UPDATE `attendence` SET `firstname`=:fname,`lastname`=:lname,
        `dateofbirth`=:dob,`emailaddress`=:email,`contactnumber`=:contact,`speciality_id`=:speciality
         WHERE attendee_id= :id";
         $stmt = $this->db->prepare($sql);
         // bind all placeholders to the actual values
          $stmt->bindparam(':id',$id);
         $stmt->bindparam(':fname',$fname);
         $stmt->bindparam(':lname',$lname);
         $stmt->bindparam(':dob',$dob);
         $stmt->bindparam(':email',$email);
         $stmt->bindparam(':contact',$contact);
         $stmt->bindparam(':speciality',$speciality);

         $stmt->execute();

         return true;
      }
      catch (PDOException $e) {
          echo $e->getMessage();
          return false;
      }
    }


    public function getAttendees(){

      $sql = "SELECT * FROM `attendence` a inner join specialitys s on a.speciality_id = s.speciality_id";
      $result = $this->db->query($sql);
      return $result;
    }

    public function getAttendeeDetails($id){
      try{
        $sql = "SELECT * FROM `attendence` a inner join specialitys s on a.speciality_id = s.speciality_id where attendee_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id',$id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
      }
      catch (PDOException $e) {
          echo $e->getMessage();
          return false;
      }
    }
    public function deleteAttendee($id){
      try{
        $sql = "DELETE FROM `attendence` WHERE attendee_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id',$id);
        $stmt->execute();
      }
      catch (PDOException $e) {
          echo $e->getMessage();
          return false;
      }
    }
    public function getSpecialties(){
      $sql = "SELECT * FROM `specialitys`";
      $result = $this->db->query($sql);
      return $result;
      return $result;

    }


}
 ?>
