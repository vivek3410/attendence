<?php
  $title = "Sucess";
  require_once 'includes/header.php';
  require_once 'db/conn.php';

  if(isset($_POST['submit'])){
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $speciality = $_POST['Speciality'];

    $isSuccess = $crud->insertAttendees($fname,$lname,$dob,$email,$contact,$speciality);
    if($isSuccess){
      echo '<h1 class="text-center text-success">You have been registered succcessfully!</h1>';
    }  else{
      echo '<h1 class="text-center text-danger">There was an error while processing</h1>';
    }

  }
  else{
    echo 'failed';
  }

 ?>


 <br><br><br>

 <!-- This printed out values that were passed to the action page using method="get" -->
 <!-- <div class="card" style="width: 18rem;">

   <div class="card-body">

     <h5 class="card-title">
      <?php //echo $_GET['firstname'] . ' ' . $_GET['lastname']; ?>
     </h5>

     <h6 class="card-subtitle mb2 text-muted">
       <?php //echo $_GET['Speciality']; ?>
     </h6>

     <p class="card-text">
       Date of Birth: <?php //echo $_GET['dob']; ?>
     </p>

     <p class="card-text">
       Email address: <?php //echo $_GET['email']; ?>
     </p>

     <p class="card-text">
      Contact Number <?php //echo $_GET['phone']; ?>
     </p>

   </div>

 </div> -->

 <div class="card" style="width: 18rem;">

   <div class="card-body">

     <h5 class="card-title">
      <?php echo $_POST['firstname'] . ' ' . $_POST['lastname']; ?>
     </h5>

     <h6 class="card-subtitle mb2 text-muted">
       <?php echo $_POST['Speciality'] ?>
     </h6>

     <p class="card-text">
       Date of Birth: <?php echo $_POST['dob']; ?>
     </p>

     <p class="card-text">
       Email address: <?php echo $_POST['email']; ?>
     </p>

     <p class="card-text">
      Contact Number <?php echo $_POST['phone']; ?>
     </p>

   </div>

 </div>

 <?php require_once 'includes/footer.php'; ?>
