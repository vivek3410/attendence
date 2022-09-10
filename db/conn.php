<?php
  // development connection
  // $host = 'localhost';
  // $db = 'attendence_db';
  // $user = 'root';
  // $pass = '';
  // $charset = 'utf8mb4';
// remote db connection.
  $host = 'remotemysql.com';
  $db = 'u1NmXqCzBg';
  $user = 'u1NmXqCzBg';
  $pass = 'EyFufOlYnJ';
  $charset = 'utf8mb4';
// dsn - data source name
  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

  try{
    $pdo = new PDO($dsn,$user,$pass);
    //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE-EXCEPTION);

  }
  catch(PDOException $e){
    echo '<h1 class="text-danger">No database found</h1>';
    throw new PDOException($e->getMessage());

  }
  require_once 'crud.php';
  require_once 'user.php';


  $crud = new crud($pdo);
  $user = new user($pdo);

  $user-> insertUser("admin","password")
 ?>
