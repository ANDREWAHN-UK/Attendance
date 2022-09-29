<?php
$title ='Home';
require_once 'includes/header.php';

require_once 'db/conn.php';

$results = $crud->getSpecialties();
?>

<h1 class ="text-center title">Registration for Conference</h1>

  <form method="post" action="success.php">

  <div class="mb-3 form-field">
      <label for="firstName" class="form-label">First Name</label>
      <input type="text" class="form-control" id="firstName" name="firstName">
    </div>

    <div class="mb-3 form-field">
      <label for="lastName" class="form-label">Last Name</label>
      <input type="text" class="form-control" id="lastName" name="lastName">
    </div>

    <div class="mb-3 form-field">
      <label for="dateOfBirth" class="form-label">Date of Birth</label>
      <input type="text" class="form-control" id="dateOfBirth" name="dateOfBirth">
    </div>

  <div class="mb-3 form-field">
      <label for="specialty" class="form-label">Area of Expertise</label>
      <select class="form-select" aria-label="Default select example" id="specialty" name="specialty">
      <!-- see viewrecords.php for commenting to explain the below -->
      <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)){?>

          <option 
          value="<?php  echo $r['specialty_id']?>">
           <?php  echo $r['name'];  ?>
          </option>

      <?php } ?>  

  </select>
      
    </div>

    <div class="mb-3 form-field">
      <label for="inputEmail" class="form-label">Email address</label>
      <input type="email" class="form-control" id="inputEmail" name="inputEmail" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    
    <div class="mb-3 form-field">
      <label for="contactNumber" class="form-label">Contact Number</label>
      <input type="text" class="form-control" id="contactNumber" name="contactNumber" aria-describedby="contactNumberHelp">
      <div id="contactNumberHelp" class="form-text">We'll never share your number with anyone else.</div>
    </div> 
<!-- next bit is for uploading images to user profiles -->
<br/>
    <div class="mb-3 form-field custom-file">
      <label for="avatar" class="form-label">Upload Profile image </label>
      <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar" >  
      <div id="avatarHelp" class="form-text text-danger">File upload is optional.</div>  
    </div> 

    <div class="d-grid gap-2 col-6 mx-auto">
    <button type="submit" class="btn btn-primary" name="registerButton">Register</button>
    </div>
</form>  

<?php 
require_once 'includes/footer.php';
?>