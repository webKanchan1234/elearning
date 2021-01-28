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

$sql = "SELECT * FROM student where stu_email= '$stuloginemail' ";
$result = $conn->query($sql);
if($result->num_rows == 1)
{
    $row = $result->fetch_assoc();
    $stuid = $row['stu_id'];

}

if(isset($_REQUEST['submitFeedbackBtn']))
{
    if($_REQUEST['f_content']=="")
    {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill all fields</div>';

    }
    else
    {
        $fcontent = $_REQUEST['f_content'];
        $sql = "INSERT INTO feedback (r_content,stu_id) values ('$fcontent','$stuid' )";
        if($conn->query($sql)==true)
        {
        $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Submitted successfully</div>';
        }
        else
        {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Unable to Submit</div>';
        }
    }
}

?>

<div class="col-sm-6 mt-5">
    <form action="" class="mx-5" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stuid">Student ID</label>
            <input type="text" class="form-control" id="stuid" name="stuid" value="<?php if(isset($stuid)){echo $stuid;} ?>" readonly>
        </div>
        <div class="form-group">
            <label for="f_content">Write Feedback</label>
            <textarea type="text" class="form-control" id="f_content" name="f_content" value="<?php if(isset($f_content)){echo $f_content;} ?>" row="2"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="submitFeedbackBtn">Submit</button>
        <?php if(isset($msg)){echo $msg;} ?>
    </form>
</div>
</div>

<?php
include('stuInclude/footer.php');
?>