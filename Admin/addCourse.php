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



if(isset($_REQUEST['courseSubmitBtn']))
{
    if(($_REQUEST['course_name']=="") || ($_REQUEST['course_desc']=="") || ($_REQUEST['course_author']=="")|| ($_REQUEST['course_duration']=="")||($_REQUEST['course_original_price']=="")||($_REQUEST['course_price']==""))
    {
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Fill All Fields</div>";
    }

    $course_name = $_REQUEST['course_name'];    
    $course_desc = $_REQUEST['course_desc'];    
    $course_author = $_REQUEST['course_author'];    
    $course_duration = $_REQUEST['course_duration'];    
    $course_original_price = $_REQUEST['course_original_price'];    
    $course_price = $_REQUEST['course_price'];    
    $course_image = $_FILES['course_img']['name'];    
    $course_image_temp = $_FILES['course_img']['tmp_name'];    
    $image_folder = '../img/courseimg/'.$course_image;
    move_uploaded_file($course_image_temp,$image_folder);

    $sql = "INSERT INTO course(course_name, course_desc, course_author, course_duration, course_original_price, course_price, course_img) values ('$course_name', ' $course_desc', '$course_author', ' $course_duration', '$course_original_price', ' $course_price', '$image_folder')";

    if($conn->query($sql)==true)
    {
        $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>successfully inserted</div>";

    }
    else{
        $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to add</div>";

    }


}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Courses</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" name="course_name" id="course_name">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea name="course_desc" id="course_desc" rows="2" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="course_author">Course author</label>
            <input type="text" class="form-control" name="course_author" id="course_author">
        </div>
        <div class="form-group">
            <label for="course_duration">Course duration</label>
            <input type="text" class="form-control" name="course_duration" id="course_duration">
        </div>
        <div class="form-group">
            <label for="course_original_price">Course original_price</label>
            <input type="text" class="form-control" name="course_original_price" id="course_original_price">
        </div>
        <div class="form-group">
            <label for="course_price">Course price</label>
            <input type="text" class="form-control" name="course_price" id="course_price">
        </div>
        <div class="form-group">
            <label for="course_img">Course img</label>
            <input type="file" class="form-control-file" name="course_img" id="course_img">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger " id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;}   ?>
    </form>
</div>

<?php
include('./adminInclude/footer.php'); 
?>