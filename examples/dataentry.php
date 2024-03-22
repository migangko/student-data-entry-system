<?php

$mysqli = new mysqli("localhost","root","","marks");

?>
<?php
session_start();
if(!isset($_SESSION['username'])||$_SESSION['type']!=='admin'){
  header("location:login.php");
}
if(isset($_POST['submit'])){
  extract($_POST);
  $college  = htmlentities($college,ENT_QUOTES, 'UTF-8');
  $department = htmlentities($department,ENT_QUOTES, 'UTF-8');
  $course = htmlentities($course,ENT_QUOTES, 'UTF-8');
  $semester = htmlentities($semester,ENT_QUOTES, 'UTF-8');
  $name = htmlentities($name,ENT_QUOTES, 'UTF-8');
  $email = htmlentities($email,ENT_QUOTES, 'UTF-8');
  $parent_name = htmlentities($parent_name,ENT_QUOTES, 'UTF-8');
  $exam_roll = htmlentities($exam_roll,ENT_QUOTES, 'UTF-8');
  $exam_registration = htmlentities($exam_registration,ENT_QUOTES, 'UTF-8');
  $phone = htmlentities($phone,ENT_QUOTES, 'UTF-8');
  $blood_group = htmlentities($blood_group,ENT_QUOTES, 'UTF-8');
  $subjects = '';
  foreach ($subject as $sub) {
    $sub = htmlentities($sub,ENT_QUOTES, 'UTF-8');
    $subjects=$subjects.$sub.', ';
  }
  $res = $mysqli->query("INSERT INTO `student`(`college`, `name`, `email`, `parents_name`, `exam_roll`, `exam_registration`, `department`, `phone`, `course`, `semester`, `blood_group`, `subject`) VALUES ('$college','$name','$email','$parent_name','$exam_roll','$exam_registration','$department','$phone','$course','$semester','$blood_group','$subjects')");

  if($res){
    header("refresh:0");
  }else{
    $mysqli->error;
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
<style>
  .customcheckbox{
    margin-right: 5%;
    height: 15px;
    width: 15px;
  }
  .customlabel{
    margin-right: 5px;
  }
</style>
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
              <a class="nav-link" href="department.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Department create account</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="dataentry.php">
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
              <h6 class="h2 text-white d-inline-block mb-0">Admin</h6>
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
                      <form method="POST">
                      <div class="form-row">
                          <div class="form-group col-md-4">
                            <label for="inputState">College name</label>
                            <select id="inputState" required name='college' class="form-control">
                              <option value="" selected>Choose</option>
<?php
$colleges = $mysqli->query("SELECT * FROM `colleges`");
while($row=mysqli_fetch_assoc($colleges)){

?>
                              <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
<?php
  }
?>
                            </select>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputEmail4">Student name</label>
                            <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Enter student name" required>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputEmail4">Student email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Enter email" required>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputEmail4">Parent name</label>
                            <input type="text" name="parent_name" class="form-control" id="inputEmail4" placeholder="Enter parent name" required>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputEmail4">Exam roll no</label>
                            <input type="number" name="exam_roll" class="form-control" id="inputEmail4" placeholder="Enter roll number" required>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputEmail4">Exam registration no</label>
                            <input type="number" name="exam_registration" class="form-control" id="inputEmail4" placeholder="Enter registration number" onchange="checkRegistration(this.value)" required>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputState">Department</label>
                            <select required name="department" id='hisdepartment' class="form-control" onchange="getSubjects()">
                              <option value="" selected>Choose</option>
<?php
$colleges = $mysqli->query("SELECT * FROM `department`");
while($row=mysqli_fetch_assoc($colleges)){

?>
                              <option value="<?php echo $row['department']; ?>"><?php echo $row['department']; ?></option>
<?php
  }
?>
                            </select>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputEmail4">Phone No</label>
                            <input type="number" required name="phone" class="form-control" id="inputEmail4" placeholder="Enter phone number">
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-4">
                            <label for="inputState">Course</label>
                            <select id="inputState" required name="course" class="form-control">
                              <option value="" selected>Choose</option>
                              <option value="HS">HS</option>
                              <option value="BA">BA</option>
                              <option value="BSC">BSC</option>
                              <option value="BCA">BCA</option>
                              <option value="MSC">MSC</option>
                              <option value="PG">PG</option>
                            </select>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputState">Semester</label>
                            <select id='hissemester' required name="semester" class="form-control" onchange="getSubjects()">
                              <option value="" selected>Choose</option>
                              <option value="1ST">1st Sem</option>
                              <option value="2ND">2nd Sem</option>
                              <option value="3RD">3rd Sem</option>
                              <option value="4TH">4th Sem</option>
                              <option value="5TH">5th Sem</option>
                              <option value="6TH">6th Sem</option>
                            </select>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputEmail4">Blood group</label>
                            <input type="text" name="blood_group" class="form-control" id="inputEmail4" placeholder="Enter blood group" required>
                          </div>
                          <div class="form-group col">
                            <label for="inputEmail4" id='subjectlabel' style="color:white;">Subject</label>
                            <div id="display"></div>
                          </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary" id='finalButton' disabled>Submit</button>
                        <p style="color:red;" id="message"></p>
                      </form>
                    </div>
                  </div>
<!-- Form creation -->
<script>
  function getSubjects(){
    var department = document.getElementById('hisdepartment').value
    var semester = document.getElementById('hissemester').value
    var display = document.getElementById('display')
    if(department==null||semester==null){return}else{
      const response = fetch('test.php?department='+department+'&semester='+semester+'&sub=1')
      .then(res=>res.json())
      .then(data=>{
        display.innerHTML=''
        
        if(data.length>0){
          document.getElementById('subjectlabel').style.color=''
          document.getElementById('finalButton').disabled=''
        }else{
          document.getElementById('subjectlabel').style.color='white'
          document.getElementById('finalButton').disabled='true'
        }
          for(let x=0;x<data.length;x++){
            display.innerHTML+="<label class='customlabel'>"+data[x]+"</label><input type='checkbox' name='subject[]' class='customcheckbox' value='"+data[x]+"'>"
          }
      })
    }
  }
  function checkRegistration(number){
      const response = fetch('test.php?reg='+number+'&check=1')
      .then(response=>response.json())
      .then(data=>{
        if(data=='found'){
          document.getElementById('message').innerHTML='Registration number already exist';
          document.getElementById('finalButton').disabled='True'
        }else{
          document.getElementById('finalButton').disabled=''
          document.getElementById('message').innerHTML='';
        }
      })
    }
  
</script>
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