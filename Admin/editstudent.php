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

include('../dbConnection.php');

if (isset($_REQUEST['requpdate'])) {
    
    if (($_REQUEST['stu_id'] == "") || ($_REQUEST['stu_email'] == "") || ($_REQUEST['stu_pass'] == "") || ($_REQUEST['stu_pass'] == "")||($_REQUEST['stu_occ'] == "") )
    {
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Fill All Fields</div>";
    } else {
        $stuid = $_REQUEST['stu_id'];
        $stuname = $_REQUEST['stu_name'];
        $stuemail = $_REQUEST['stu_email'];
        $stupass = $_REQUEST['stu_pass'];
        $stuocc = $_REQUEST['stu_occ'];

        $sql = "UPDATE student SET stu_id= '$stuid', stu_name= ' $stuname',stu_email= '$stuemail', stu_pass= '$stupass', stu_occ= '$stuocc' WHERE stu_id = '$stuid' ";

        if($conn->query($sql)==true)
        {
            $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>Update successfully</div>";
        }
        else
        {
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Unable to update</div>";
        }
    }
}

?>


<div class="col-sm-6 mt-5 mx-3 jumbotron">
    
    <?php

    if (isset($_REQUEST['view'])) {
        $sql = "SELECT * FROM student where stu_id={$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }

    ?>
    
    <h3 class="text-center">Update student details</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stu_id"> ID</label>
            <input type="text" class="form-control" name="stu_id" id="stu_id" value="<?php  if(isset($row['stu_id'])) {echo $row['stu_id'];} ?>">
        </div>
        <div class="form-group">
            <label for="stu_name"> Name</label>
            <input type="text" class="form-control" name="stu_name" id="stu_name" value="<?php  if(isset($row['stu_name'])) {echo $row['stu_name'];} ?>">
        </div>
        
        <div class="form-group">
            <label for="stu_email">Email</label>
            <input type="text" class="form-control" name="stu_email" id="stu_email" value="<?php  if(isset($row['stu_email'])) {echo $row['stu_email'];} ?>">
        </div>
        <div class="form-group">
            <label for="stu_pass">Password</label>
            <input type="text" class="form-control" name="stu_pass" id="stu_pass" value="<?php  if(isset($row['stu_pass'])) {echo $row['stu_pass'];} ?>">
        </div>
        <div class="form-group">
            <label for="stu_occ">Occupation</label>
            <input type="text" class="form-control" name="stu_occ" id="stu_occ" value="<?php  if(isset($row['stu_occ'])) {echo $row['stu_occ'];} ?>">
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-danger " id="requpdate" name="requpdate">Update</button>
            <a href="student.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;}   ?>
    </form>
</div>
    
    


<?php
include('./adminInclude/footer.php');
?>