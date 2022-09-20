<?php
$title = 'Edit Records';
require_once 'includes/header.php';

require_once 'db/conn.php';

$results = $crud->getSpecialties();

if (!isset($_GET['id'])) {
  include 'includes/errormessage.php';
  header("Location: viewrecords.php"); //if someone navigates here without a query string, they get redirected to viewrecords
} else {
  $id = $_GET['id'];
  $attendee = $crud->getAttendeeDetails($id);
?>

  <h1 class="text-center title">Edit Record</h1>

  <form method="post" action="editpost.php">

    <input type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>" />

    <div class="mb-3 form-field">
      <label for="firstName" class="form-label">First Name</label>
      <input type="text" class="form-control" value="<?php echo $attendee['firstName'] ?>" id="firstName" name="firstName">
    </div>

    <div class="mb-3 form-field">
      <label for="lastName" class="form-label">Last Name</label>
      <input type="text" class="form-control" value="<?php echo $attendee['lastName'] ?>" id="lastName" name="lastName">
    </div>

    <div class="mb-3 form-field">
      <label for="dateOfBirth" class="form-label">Date of Birth</label>
      <input type="text" class="form-control" value="<?php echo $attendee['dateOfBirth'] ?>" id="dateOfBirth" name="dateOfBirth">
    </div>

    <div class="mb-3 form-field">
      <label for="specialty" class="form-label">Area of Expertise</label>
      <select class="form-select" aria-label="Default select example" id="specialty" name="specialty">

        <!-- see viewrecords.php for commenting to explain the below -->

        <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>

          <option value="<?php echo $r['specialty_id'] ?>" <?php if ($r['specialty_id'] == $attendee['specialty_id']) echo 'selected' ?>>

            <?php echo $r['name'];  ?>

          </option>

        <?php } ?>

      </select>

    </div>

    <div class="mb-3 form-field">
      <label for="inputEmail" class="form-label">Email address</label>
      <input type="email" class="form-control" value="<?php echo $attendee['emailAddress'] ?>" id="inputEmail" name="inputEmail" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>

    <div class="mb-3 form-field">
      <label for="contactNumber" class="form-label">Contact Number</label>
      <input type="text" class="form-control" value="<?php echo $attendee['contactNumber'] ?>" id="contactNumber" name="contactNumber" aria-describedby="contactNumberHelp">
      <div id="contactNumberHelp" class="form-text">We'll never share your number with anyone else.</div>
    </div>

    <div class=" gap-2 col-2 mx-auto">
      
    <a href="viewrecords.php" class="btn btn-info">Back to list</a>
    <button type="submit" class="btn btn-success" name="registerButton">Save changes</button>

    </div>
  </form>

<?php   } ?>


<?php
require_once 'includes/footer.php';
?>