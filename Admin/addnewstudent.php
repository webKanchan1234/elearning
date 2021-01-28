<?php
if(!isset($_SESSION))
{
    session_start();
}
include('./adminInclude/header.php'); 
include('../dbConnection.php'); 

if(isset($_SESSION['is_adminlogin']))
{
    $adminLogemail= $_SESSION['adminLogemail'];
}
else{
    echo "<script> location.href='../index.php';</script>";
}



if(isset($_REQUEST['newStuSubmitBtn']))
{
    if(($_REQUEST['stu_name']=="") || ($_REQUEST['stu_email']=="") || ($_REQUEST['stu_pass']=="")|| ($_REQUEST['stu_occ']==""))
    {
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Fill All Fields</div>";
    }

    $stuname = $_REQUEST['stu_name'];
    $stuemail = $_REQUEST['stu_email'];
    $stupass = $_REQUEST['stu_pass'];
    $stuocc = $_REQUEST['stu_occ'];

    $sql = "INSERT INTO student (stu_name, stu_email, stu_pass, stu_occ) values('$stuname', '$stuemail', '$stupass', '$stuocc')";

    if($conn->query($sql)==true)
    {
        $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>Add student successfully</div>";

    }
    else{
        $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to add student</div>";

    }


}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Courses</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stu_name"> Name</label>
            <input type="text" class="form-control" name="stu_name" id="stu_name">
        </div>
        
        <div class="form-group">
            <label for="stu_email">Email</label>
            <input type="text" class="form-control" name="stu_email" id="stu_email">
        </div>
        <div class="form-group">
            <label for="stu_pass">Password</label>
            <input type="text" class="form-control" name="stu_pass" id="stu_pass">
        </div>
        <div class="form-group">
            <label for="stu_occ">Occupation</label>
            <input type="text" class="form-control" name="stu_occ" id="stu_occ">
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-danger " id="newStuSubmitBtn" name="newStuSubmitBtn">Submit</button>
            <a href="student.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;}   ?>
    </form>
</div>

<?php
include('./adminInclude/footer.php'); 
?>