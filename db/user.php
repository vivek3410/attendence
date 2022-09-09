<?php
class user{
  private $db;

    // constructor to initalize private variable to the database connection
  function __construct($conn){
    $this->db = $conn;
  }

  public function insertUser($username,$password){
      try {
        $result = $this->getUserByUsername($username);
        if($result['num']>0){
          return false;
        }
        else{

              $new_password = md5($password.$username); //encrypting the password with md5 hash func
              // define sql statement to be excuted
              $sql = "INSERT INTO users(username,password) VALUES (:username,:password)";
              // prepare the sql statement for excution
              $stmt = $this->db->prepare($sql);
              // bind all placeholders to the actual values
              $stmt->bindparam(':username',$username);
              $stmt->bindparam(':password',$new_password);

              // execute statments
              $stmt->execute();
              return true;
        }

      }
      catch (PDOException $e) {
          echo $e->getMessage();
          return false;
      }
  }

  public function getUser($username,$password){
    try{
      $sql = "SELECT * FROM `users` where username = :username and password = :password";
      $stmt = $this->db->prepare($sql);
      $stmt->bindparam(':username',$username);
      $stmt->bindparam(':password',$password);
      $stmt->execute();
      $result = $stmt->fetch();
      return $result;
    }
    catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }

  }
  public function getUserByUsername($username){
    try{
      $sql = "select count(*) as num from users where username = :username";
      $stmt = $this->db->prepare($sql);
      $stmt->bindparam(':username',$username);
      $stmt->execute();
      $result = $stmt->fetch();
      return $result;
    }
    catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
  }
  }
 ?>
