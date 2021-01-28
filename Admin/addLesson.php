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



if(isset($_REQUEST['lessonSubmitBtn']))
{echo "sub";
    if(($_REQUEST['course_name']=="") || ($_REQUEST['lesson_desc']=="") || ($_REQUEST['course_id']=="")|| ($_REQUEST['lesson_name']==""))
    {
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Fill All Fields</div>";
    }

    $course_name = $_REQUEST['course_name'];    
    $lesson_desc = $_REQUEST['lesson_desc'];    
    $course_id = $_REQUEST['course_id'];    
    $lesson_name = $_REQUEST['lesson_name'];    
    $lesson_link = $_FILES['lesson_link']['name'];
    $lesson_link_tmp = $_FILES['lesson_link']['tmp_name'];
    $link_folder = '../lessonvid/'.$lesson_link;
    move_uploaded_file($lesson_link_tmp, $link_folder);

    $sql = "INSERT INTO lesson (lesson_name, lesson_desc, lesson_link, course_id, course_name) values ('$lesson_name', ' $lesson_desc', '$link_folder', ' $course_id', '$course_name')";

    if($conn->query($sql)==true)
    {
        $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>Lesson add successfully</div>";

    }
    else{
        $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to add</div>";

    }


}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Lesson</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" name="course_id" id="course_id" value="<?php  if(isset($_SESSION['course_id'])) {echo $_SESSION['course_id'];} ?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course name</label>
            <input type="text" class="form-control" name="course_name" id="course_name" value="<?php  if(isset($_SESSION['course_name'])) {echo $_SESSION['course_name'];} ?>">
        </div>
        <div class="form-group">
            <label for="lesson_name">Lesson name</label>
            <input type="text" class="form-control" name="lesson_name" id="lesson_name" >
        </div>
        <div class="form-group">
            <label for="lesson_desc">Lesson desc</label>
            <textarea type="text" class="form-control" name="lesson_desc" id="lesson_desc" ></textarea>
        </div>
        <div class="form-group">
            <label for="lesson_link">Lesson link</label>
            <input type="file" class="form-control" name="lesson_link" id="lesson_link" >
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-danger " id="lessonSubmitBtn" name="lessonSubmitBtn">Submit</button>
            <a href="lesson.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;}   ?>
    </form>
</div>

<?php
include('./adminInclude/footer.php'); 
?>