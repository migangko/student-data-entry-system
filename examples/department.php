<?php
session_start();
if(!isset($_SESSION['username'])||$_SESSION['type']!=='admin'){
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Student data entry system</title>
  <!-- Favicon -->
  <link rel="icon" href="" type="">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" href="dashboard.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Create college</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="department.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Department create account</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dataentry.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">College data entry</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="viewdept.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Department data</span>
              </a>
            </li>
                <a class="btn btn-primary my-4" href="login.php" role="button">Logout</a>
              </a>
            </li>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">admin</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                </ol>
              </nav>
            </div>
          </div>
<!-- Card stats -->
          <div class="row">
            <div class="col">
              <div class="card card-stats"> 
<!-- Card body -->
<div class="card-body">
  <div class="row">
    <div class="col">
      <form method="POST" action="view.php">
          <div class="form-group">
            <label for="inputEmail4">College code</label>
            <input type="number" class="form-control" name="college_code" id="inputEmail4" placeholder="Enter college code" required>
          </div>
          <div class="form-group">
            <label for="inputEmail4">Department</label>
            <input type="text" class="form-control" name="department" id="inputEmail4" placeholder="Enter department" required>
          </div>
          <div class="form-group">
            <label for="inputState">Course</label>
            <select id="inputState" name="course" class="form-control" required>
              <option value="" selected>Choose</option>
              <option>HS</option>
              <option>BA</option>
              <option>BSC</option>
              <option>BCA</option>
              <option>MSC</option>
              <option>PG</option>
            </select>
          </div>
          <div class="form-group">
            <label for="inputState">Semester</label>
            <select id="inputState" name="semester" class="form-control" required>
              <option value="" selected>Choose</option>
              <option>1ST</option>
              <option>2ND</option>
              <option>3RD</option>
              <option>4TH</option>
              <option>5TH</option>
              <option>6TH</option>
            </select>
          </div>
          <div class="form-group">
            <label for="inputEmail4">Subjects</label> (Comma seperated*)
            <input type="text" class="form-control" name="subjects" id="inputEmail4" placeholder="Enter subjects" required>
          </div>
          <div class="form-group">
            <label for="inputEmail4">Department code</label>
            <input type="number" class="form-control" name="dept_code" id="inputEmail4" placeholder="Enter department code" required>
          </div>
          <div class="form-group">
            <label for="inputEmail4">Password</label>
            <input type="password" class="form-control" name="password" id="inputEmail4" placeholder="Enter password" required>
          </div>
        <div class="text-center">
        <button class="btn btn-primary my-4" type="submit" name="submit">View</button>
      </div>
      </form>
    </div>
  </div>
<!-- Form creation -->
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>