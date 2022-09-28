<?php
include_once 'includes/session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="site.css">
  <title>
    Attendance <?php echo $title; ?>
  </title>
</head>

<body>
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg bg-dark ">

      <a class="navbar-brand" href="index.php">IT Conference</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="viewrecords.php">List of attendees</a>
          </li>

        </ul>
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
          <!-- Pay attention to the below mixing of PHP and HTML -->
          <?php
          if (!isset($_SESSION['username'])) { ?>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Log in</a>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="#">Hello <?php echo $_SESSION['username'] ?>! </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Log Out </a>
            </li>
          <?php } ?>





        </ul>

      </div>

    </nav>

    <br>