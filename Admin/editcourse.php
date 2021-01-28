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
    
    if (($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") || ($_REQUEST['course_author'] == "") || ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_original_price'] == "") || ($_REQUEST['course_price'] == ""))
    {
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Fill All Fields</div>";
    } else {
        $course_id = $_REQUEST['course_id'];
        $course_name = $_REQUEST['course_name'];
        $course_desc = $_REQUEST['course_desc'];
        $course_author = $_REQUEST['course_author'];
        $course_duration = $_REQUEST['course_duration'];
        $course_original_price = $_REQUEST['course_original_price'];
        $course_price = $_REQUEST['course_price'];
        $course_img = '../img/courseimg/' . $_FILES['course_img']['name'];

        $sql = "UPDATE course SET course_id= '$course_id', course_name= '$course_name',course_desc= '$course_desc', course_author= '$course_author', course_duration= '$course_duration', course_original_price= '$course_original_price', course_price= '$course_price', course_img= '$course_img' WHERE course_id = '$course_id' ";

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
    <h3 class="text-center">Update New Courses</h3>
    <?php

    if (isset($_REQUEST['view'])) {
        $sql = "SELECT * FROM course where course_id={$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }

    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" name="course_id" id="course_id" 
            value="<?php if (isset($row['course_id'])) {echo $row['course_id'];}  ?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course name</label>
            <input type="text" class="form-control" name="course_name" id="course_name" 
            value="<?php if (isset($row['course_name'])) {echo $row['course_name'];}  ?>">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea name="course_desc" id="course_desc"  rows="2" class="form-control" value="<?php if (isset($row['course_author'])) {echo $row['course_desc'];}  ?>"></textarea>
        </div>
        <div class="form-group">
            <label for="course_author">Course author</label>
            <input type="text" class="form-control" name="course_author" id="course_author" value="<?php if (isset($row['course_author'])) {echo $row['course_author'];}  ?>">
        </div>
        <div class="form-group">
            <label for="course_duration">Course duration</label>
            <input type="text" class="form-control" name="course_duration" id="course_duration" value="<?php if (isset($row['course_duration'])) {
                                                                                                            echo $row['course_duration'];
                                                                                                        }  ?>">
        </div>
        <div class="form-group">
            <label for="course_original_price">Course original_price</label>
            <input type="text" class="form-control" name="course_original_price" id="course_original_price" value="<?php if (isset($row['course_original_price'])) {
                                                                                                                        echo $row['course_original_price'];
                                                                                                                    }  ?>">
        </div>
        <div class="form-group">
            <label for="course_price">Course price</label>
            <input type="text" class="form-control" name="course_price" id="course_price" value="<?php if (isset($row['course_price'])) {
                                                                                                        echo $row['course_price'];
                                                                                                    }  ?>">
        </div>
        <div class="form-group">
            <label for="course_img">Course img</label>
            <img src="<?php if (isset($row['course_img'])) {
                            echo $row['course_img'];
                        }  ?>" alt="" class="image-thumbnails" width="120px" height="70px">
            <input type="file" class="form-control-file" name="course_img" id="course_img">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger " id="requpdate" name="requpdate">Update</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if (isset($msg)) {
            echo $msg;
        }   ?>
    </form>
</div>



<?php
include('./adminInclude/footer.php');
?>