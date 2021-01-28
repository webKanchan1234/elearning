<?php
if(!isset($_SESSION))
{
    session_start();
}
include_once('../dbConnection.php');

if(isset($_POST['checkemail']) && isset($_POST['stuemail']))
{
    $stuemail = $_POST['stuemail'];
    $sql = "SELECT stuemail FROM student where stu_email= '".$stuemail."'";
    $result= $conn->query($sql);
    $row= $result->num_rows;
    echo json_encode($row);
}

if(isset($_POST['stusignup']) && isset($_POST['stuname']) && isset($_POST['stuemail']) && isset($_POST['stupass']))
{
    $stuname = $_POST['stuname'];
    $stuemail = $_POST['stuemail'];
    $stupass = $_POST['stupass'];

    $sql = "INSERT INTO student (stu_name, stu_email, stu_pass) values(' $stuname', '$stuemail','$stupass')";
    if($conn->query($sql)==TRUE){
        echo json_encode("OK");
    }
    else{
        echo json_encode("Failed");
    }

}

//----------student login verification--------------------------------
if(!isset($_SESSION['is_login']))
{
if(isset($_POST['checklogemail']) && isset($_POST['stuloginemail']) && isset($_POST['stuloginpass']))
{
    $stuloginemail = $_POST['stuloginemail'];
    $stuloginpass = $_POST['stuloginpass'];

    $sql = "SELECT stu_email, stu_pass FROM student where stu_email='".$stuloginemail."' AND stu_pass='".$stuloginpass."'";
    $result =$conn->query($sql);
    $row = $result->num_rows;
    if($row === 1)
    {
        $_SESSION['is_login']=true;
        $_SESSION['stuLogemail']=$stuloginemail;
        echo json_encode($row);
    }
    else if($row === 0)
    {
        echo json_encode($row);
    }
}
}
?>