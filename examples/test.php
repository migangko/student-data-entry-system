<?php

$mysqli = new mysqli("localhost","root","","marks");

if(isset($_GET['sub'])){
    $department = $_GET['department'];
    $semester = $_GET['semester'];
    $sublist = array();
    $res = $mysqli->query("SELECT * FROM `subject` WHERE `department`='$department'&& `semester`='$semester'");
    while($row=mysqli_fetch_assoc($res)){
        array_push($sublist,$row['subject']);
    }
    
    echo json_encode($sublist);
}

if(isset($_GET['check'])){
    $reg=$_GET['reg'];
    $res = $mysqli->query("SELECT * FROM `student` WHERE `exam_registration`='$reg'");
    $count = mysqli_num_rows($res);
    if($count>0){
        echo json_encode('found');
    }else{
        echo json_encode('notfound');
    }
}

if(isset($_GET['table'])){
    $course=$_GET['course'];
    $semester=$_GET['semester'];
    $result = array();
    $depts = "SELECT * FROM `student` WHERE `course`='$course' AND `semester`='$semester'";
    $res = $mysqli->query($depts);
    $x=1;
    while($row=mysqli_fetch_assoc($res)){
        array_push($result,$row);
    }

    echo json_encode($result);
    
}
?>