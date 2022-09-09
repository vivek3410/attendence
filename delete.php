<?php
require_once 'includes/auth_check.php';
require_once 'db/conn.php';?>
<?php
  if(!$_GET['id']){
    echo 'error1';
  }
  else{
    // Get id values
    $id = $_GET['id'];
    // Call delete function
$result = $crud->deleteAttendee($id);
    // Redirict list
    if($result){
      header("Location: viewrecords.php");
    }
    else{
      echo 'error ffdg';
    }
  }
 ?>
