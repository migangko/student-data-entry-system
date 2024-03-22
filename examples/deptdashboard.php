<?php
session_start();
if(!isset($_SESSION['username'])||$_SESSION['type']!=='dept'){
  header("location:login.php");
}else{
  $department = $_SESSION['username'];
  $mysqli= new mysqli("localhost","root","","marks");
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
              <a class="nav-link active" href="deptdashboard.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Department Dashboard</span>
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
      <form>
          <div class="form-group">
            <label for="inputState">Course</label>
            <select id="thecourse" onchange="getTableData()" class="form-control">
              <?php
$course = $mysqli->query("SELECT DISTINCT `course` FROM `student`");
while($row=mysqli_fetch_assoc($course)){

?>
              <option value="<?php echo $row['course']; ?>"><?php echo $row['course']; ?></option>
<?php
  }
?>
            </select>
          </div>
          <div class="form-group">
            <label for="inputState">Semester</label>
            <select id='thesem' onchange="getTableData()" class="form-control">
              <?php
$semester = $mysqli->query("SELECT * FROM `department` WHERE `dept_code`='$department'");
while($row=mysqli_fetch_assoc($semester)){

?>
              <option value="<?php echo $row['semester']; ?>"><?php echo $row['semester']; ?></option>
<?php
  }
?>
            </select>
          </div>
      </form>
    </div>
  </div>
  <div class="row">
      <div class="col">
          <table class="table table-responsive">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col"> Student name</th>
                <th scope="col">Email</th>
                <th scope="col">Parent name</th>
                <th scope="col">Exam roll no</th>
                <th scope="col">Exam registration no</th>
                <th scope="col">Phone no</th>
                <th scope="col">Blood group</th>
                <th scope="col">Subject</th>
              </tr>
            </thead>
            <tbody id="theTable">

            </tbody>
          </table>
      </div>
    </div>     
<script>
  function getTableData(){
    var course = document.getElementById('thecourse').value
    var semester = document.getElementById('thesem').value
    var tableBody = document.getElementById('theTable')
    if(course==null||semester==null){return}else{
      const response = fetch('test.php?course='+course+'&semester='+semester+'&table=1')
      .then(res=>res.json())
      .then(data=>{
        tableBody.innerHTML=''
        for(let x=0;x<data.length;x++){
          tableBody.innerHTML+=
            "<tr><td>"+x+"</td><td>"+data[x].name+"</td><td>"+data[x].email+"</td><td>"+data[x].parents_name+"</td><td>"+data[x].exam_roll+"</td><td>"+data[x].exam_registration+"</td><td>"+data[x].phone+"</td><td>"+data[x].blood_group+"</td><td>"+data[x].subject+"</td></tr>"
        }
      })
    }
  }
  getTableData()
</script>
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