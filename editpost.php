<?php
require_once 'db/conn.php';
// Get vlaues from post operation
if(isset($_POST['submit'])){
  // extract values from the $_POST array
  $id = $_POST['id'];
  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $dob = $_POST['dob'];
  $email = $_POST['email'];
  $contact = $_POST['phone'];
  $speciality = $_POST['Speciality'];


  // Call crud function
  $result = $crud->editAttendee($id,$fname, $lname, $dob, $email, $contact , $speciality);

  // Redirect to index.php
  if($result == true){
    header("Location: viewrecords.php");
  }
  else{
    echo 'error';
  }
}
else{

}
?>
