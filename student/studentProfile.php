<?php
if(!isset($_SESSION))
{
    session_start();
}
include('./stuInclude/header.php');
include('../dbConnection.php');
if(isset($_SESSION['is_login']))
{
    $stuloginemail= $_SESSION['stuLogemail'];
}
else{
    echo '<script>location.href="../index.php";</script>';
}

$sql = "SELECT * FROM student where stu_email= '$stuloginemail'";
$result = $conn->query($sql);
if($result->num_rows == 1)
{
    $row = $result->fetch_assoc();
    $stuid= $row['stu_id'];
    $stuname= $row['stu_name'];
    $stuocc= $row['stu_occ'];
    $stuimg= $row['stu_img'];
}
if(isset($_REQUEST['updateStuNameBtn']))
{
    if($_REQUEST['stuname']=="")
    {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill all fields</div>';
    }
    else{
        $stuname = $_REQUEST['stuname'];
        $stuOcc = $_REQUEST['stuOcc'];
        $stu_Img = $_FILES['stu_img']['name'];
        $stu_Img_temp = $_FILES['stu_img']['tmp_name'];
        $image_folder = '../img/stu/'.$stu_Img;
        move_uploaded_file($stu_Img_temp,$image_folder);

        $sql = "UPDATE student SET stu_name= '$stuname' ,stu_occ= '$stuOcc', stu_img= '$image_folder', where stu_email='$stuloginemail' ";

        if($conn->query($sql)==true)
        {
        $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Update succesfully</div>';
        }
        else
        {
        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to update</div>';

        }

    }
}

?>
<div class="col-sm-6 mt-5">
    <form action="" class="mx-5" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stuId">Student ID</label>
            <input type="text" class="form-control" id="stuId" name="stuId" value="<?php if(isset($stuid)){echo $stuid; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="stuEmail"> Email</label>
            <input type="email" class="form-control" id="stuEmail" name="stuEmail" value="<?php if(isset($stuloginemail)){echo $stuloginemail; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="stuname"> Name</label>
            <input type="text" class="form-control" id="stuname" name="stuname" value="<?php if(isset($stuname)){echo $stuname; } ?>" >
        </div>
        <div class="form-group">
            <label for="stuocc"> Occupation</label>
            <input type="text" class="form-control" id="stuocc" name="stuOcc" value="<?php if(isset($stuocc)){echo $stuocc; } ?>" >
        </div>
        <div class="form-group">
            <label for="stuimg"> Upload image</label>
            <input type="file" class="form-control" id="stu_img" name="stu_img" value="<?php if(isset($stuimg)){echo $stuimg; } ?>" >
        </div>
        
        <button type="submit" class="btn btn-primary" name="updateStuNameBtn">Update</button>
        <?php if(isset($msg)){echo $msg; }  ?>
    </form>
</div>

<?php
include('stuInclude/footer.php');
?>