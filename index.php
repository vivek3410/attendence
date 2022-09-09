
<?php
$title = 'Index';
require_once 'includes/header.php';
require_once 'db/conn.php';
// get all Attendence
$result = $crud->getSpecialties();
?>

  <h1 class="text-center">Registration For Division </h1>

  <!--
      -First name
      -Last name
      -Date of birth (Use DatePicker)
      -Speciality (Artificaial Intellegence,Big Data,etc..,)
      -Email Address
      -Contact Number

  -->
  <form method="post" action="sucess.php">
    <div class="mb-3">
      <label for="firstname" class="form-label">First Name</label>
      <input type="text" class="form-control" id="firstname" name="firstname">

    </div>
    <div class="mb-3">
      <label for="lastname" class="form-label">Last Name</label>
      <input type="text" class="form-control" id="lastname" name="lastname" >

    </div>
    <div class="mb-3">
      <label for="dob" class="form-label">Date Of Birth</label>
      <input type="text" class="form-control" id="dob" name="dob" >
    </div>
    <div class="mb-3">
      <label for="Speciality" class="form-label">Specialization</label>
      <select class="form-select" aria-label="Default select example" id="Speciality" name="Speciality">
          <?php while($r=$result->fetch(PDO::FETCH_ASSOC)){ ?>
              <option value="<?php echo $r['speciality_id'] ?>"><?php echo $r['name']; ?></option>
          <?php } ?>
      </select>
    </div>
    <div class="mb-3">

      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">

      <label for="phone" class="form-label">Contact Number</label>
      <input type="text" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone">
      <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
    </div>

    <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
  </form>
  <br>
  <br><br>
  <br>
<?php require_once 'includes/footer.php'; ?>
