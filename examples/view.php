<?php
session_start();
if(!isset($_SESSION['username'])||$_SESSION['type']!=='admin'){
  header("location:login.php");
}
?>
<?php

$mysqli = new mysqli("localhost","root","","marks");

if(isset($_POST['submit'])){
  extract($_POST);
  $sub_arr = preg_split ("/\,/", $subjects);
  $college_code  = htmlentities($college_code,ENT_QUOTES, 'UTF-8');
  $department = htmlentities($department,ENT_QUOTES, 'UTF-8');
  $course = htmlentities($course,ENT_QUOTES, 'UTF-8');
  $semester = htmlentities($semester,ENT_QUOTES, 'UTF-8');
  $dept_code = htmlentities($dept_code,ENT_QUOTES, 'UTF-8');
  $password = htmlentities($password,ENT_QUOTES, 'UTF-8');
  $res = $mysqli->query("INSERT INTO `department`(`college_code`, `department`, `course`, `semester`, `dept_code`, `password`) VALUES ('$college_code','$department','$course','$semester','$dept_code','$password')");
  foreach($sub_arr as $subj){
    $subj = htmlentities($subj,ENT_QUOTES, 'UTF-8');
    $res = $mysqli->query("INSERT INTO `subject`(`department`, `semester`, `subject`) VALUES ('$department','$semester','$subj')");
  }
  if($res){
    header("refresh:0");
  }else{
    echo $mysqli->error;
  }
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
              <a class="nav-link active" href="dashboard.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Create college</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="department.php">
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
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom"></nav>
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
                    <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Department</th>
                              <th scope="col">Course</th>
                              <th scope="col">Department Code</th>
                              <th scope="col">Password</th>
                            </tr>
                          </thead>
                          <tbody>
<?php
  $depts = "SELECT * FROM `department`";
  $res = $mysqli->query($depts);
  $x=1;
  while($row=mysqli_fetch_assoc($res)){
?>
                            <tr>
                              <td><?php echo $x; ?></td>
                              <td><?php echo $row['department']; ?></td>
                              <td><?php echo $row['course']; ?></td>
                              <td><?php echo $row['dept_code']; ?></td>
                              <td><?php echo $row['password']; ?></td>
                            </tr>
<?php 
$x++;
}
 ?>
                          </tbody>
                        </table>
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