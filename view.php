<?php
$title = 'View Record';
require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';
// get  Attendendee by id
  if(!isset($_GET['id'])){
    echo "<h1 class='text-danger'>Please check details aand try again</h1>";

  }
  else{
    $id = $_GET['id'];
    $result = $crud->getAttendeeDetails($id);

?>


<div class="card" style="width: 18rem;">

  <div class="card-body">

    <h5 class="card-title">
     <?php echo $result['firstname'] . ' ' . $result['lastname']; ?>
    </h5>

    <h6 class="card-subtitle mb2 text-muted">
      <?php echo $result['name'] ?>
    </h6>

    <p class="card-text">
      Date of Birth: <?php echo $result['dateofbirth']; ?>
    </p>

    <p class="card-text">
      Email address: <?php echo $result['emailaddress']; ?>
    </p>

    <p class="card-text">
     Contact Number <?php echo $result['contactnumber']; ?>
    </p>

  </div>
</div>
<?php } ?>
<br>
<br><br>
<br>
<?php require_once 'includes/footer.php'; ?>
