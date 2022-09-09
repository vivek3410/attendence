
<?php
$title = 'Edit Record';
require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';
// get all Attendence
$result = $crud->getSpecialties();
if(!isset($_GET['id'])){
  echo 'error';
}
else{
  $id = $_GET['id'];
  $attendee = $crud->getAttendeeDetails($id);
?>

  <h1 class="text-center">Edit Record</h1>

  <form method="post" action="editpost.php">

    <input type="hidden" name="id"value="<?php echo $attendee['attendee_id'] ?>">
    <div class="mb-3">
      <label for="firstname" class="form-label">First Name</label>
      <input type="text" class="form-control" id="firstname" value="<?php echo $attendee['firstname'] ?>" name="firstname">

    </div>
    <div class="mb-3">
      <label for="lastname" class="form-label">Last Name</label>
      <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $attendee['lastname'] ?>">

    </div>
    <div class="mb-3">
      <label for="dob" class="form-label">Date Of Birth</label>
      <input type="text" class="form-control" id="dob" name="dob" value="<?php echo $attendee['dateofbirth'] ?>" >
    </div>
    <div class="mb-3">
      <label for="Speciality" class="form-label">Specialization</label>
      <select class="form-select" aria-label="Default select example" id="Speciality" name="Speciality" value="<?php echo $attendee['name'] ?>">
          <?php while($r=$result->fetch(PDO::FETCH_ASSOC)){ ?>
              <option value="<?php echo $r['speciality_id'] ?>" <?php if($r['speciality_id'] == $attendee['speciality_id']) echo 'selected' ?>>
                <?php echo $r['name'] ?>"
              </option>
          <?php } ?>
      </select>
    </div>
    <div class="mb-3">

      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" value="<?php echo $attendee['emailaddress'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">

      <label for="phone" class="form-label">Contact Number</label>
      <input type="text" class="form-control" value="<?php echo $attendee['contactnumber'] ?>"id="phone" aria-describedby="phoneHelp" name="phone">
      <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
    </div>
<a href="viewrecords.php" class="btn btn-default">Back to List</a>
    <button type="submit" class="btn btn-success btn-block" name="submit">Save Changes</button>
  </form>
<?php } ?>
  <br>
  <br><br>
  <br>
<?php require_once 'includes/footer.php'; ?>
