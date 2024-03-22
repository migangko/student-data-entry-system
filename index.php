<?php

session_start();
$mssg = "";
$mssg2 = "";
  $mysqli = new mysqli("localhost","root","","marks");
  if(isset($_POST['alogin'])){
    extract($_POST);
    $college_code  = htmlentities($college_code,ENT_QUOTES, 'UTF-8');
    $password  = htmlentities($password,ENT_QUOTES, 'UTF-8');
    $res = $mysqli->query("SELECT * FROM `login` WHERE `username`='$college_code' AND `password`='$password'");
    $row=mysqli_num_rows($res);
    if($row>0){
      $_SESSION['username']=$college_code;
      $_SESSION['type']='admin';
      header("location:examples/dashboard.php");
    }else{
      $mssg = "Username or password incorrect";
    }
  }
  if(isset($_POST['dlogin'])){
    extract($_POST);
    $dept_code  = htmlentities($dept_code,ENT_QUOTES, 'UTF-8');
    $password  = htmlentities($password,ENT_QUOTES, 'UTF-8');
    $res = $mysqli->query("SELECT * FROM `department` WHERE `dept_code`='$dept_code' AND `password`='$password'");
    $row=mysqli_num_rows($res);
    if($row>0){
      $_SESSION['username']=$dept_code;
      $_SESSION['type']='dept';
      header("location:examples/deptdashboard.php");
    }else{
      $mssg2 = "Username or password incorrect";
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
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
</head>
<style>
  html, body{
    height: 101vh;
  }
</style>
<body class="bg-default">
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-6 py-lg-6 pt-lg-6">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Welcome</h1>
              <p class="text-lead text-white">Dibrugarh Hanumanbax Surajmall Kanoi College</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
<div class="form-row">
  <div class="col-lg-6">
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-7 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-5">
              <div class="btn-wrapper text-center">
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <form role="form" method="POST">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" name="college_code" placeholder="College Code" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" name="password" placeholder="Password" type="password">
                  </div>
                  <p style="color:red;"><?php echo $mssg; ?></p>
                </div>
                <div class="text-center">
                  <button class="btn btn-primary my-4" type="submit" name="alogin" role="button">Admin login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  
      <!-- Page content -->
      <div class="col-lg-6">
  <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-7 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-5">
              <div class="btn-wrapper text-center">
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <form method="POST" role="form">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" name="dept_code" placeholder="Department Code" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" name="password" placeholder="Password" type="password">
                  </div>
                  <p style="color:red;"><?php echo $mssg2; ?></p>
                </div>
                <div class="text-center">
                  <button class="btn btn-primary my-4" type="submit" name="dlogin" role="button">Department login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 </div>
</div>
</div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>