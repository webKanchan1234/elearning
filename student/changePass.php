<?php
if(!isset($_SESSION))
{
    session_start();
}
include('./stuInclude/header.php'); 
include('../dbConnection.php'); 

if(isset($_SESSION['is_login']))
{
    $stuLogemail= $_SESSION['stuLogemail'];
}
else{
    echo "<script> location.href='../index.php';</script>";
}
$stuLogemail= $_SESSION['stuLogemail'];
if(isset($_REQUEST['stuPassUpdate']))
{
    if($_REQUEST['inputnewPass']=="")
    {
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Fill All Fields</div>";
    }
    else
    {
        $sql = "SELECT * FROM student where stu_email= '$stuLogemail' ";
        $result = $conn->query($sql);
        if($result->num_rows == 1)
        {
            $stupass= $_REQUEST['inputnewPass'];
            $sql = "UPDATE student SET stu_pass='$stupass' where stu_email='$stuLogemail' ";
            if($conn->query($sql)==true)
            {
                $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>successfully change</div>";
            }
            else
            {
            $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Unable to change</div>";

            }
        }
    }
}

?>

<div class="col-sm-9 mt-5">
    <div class="row">
        <div class="col-sm-6">
            <form action="" class="mt-5 mx-5">
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" name="inputEmail" value="<?php echo $stuLogemail ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="inputnewPass">New Password</label>
                    <input type="password" class="form-control" id="inputnewPass" name="inputnewPass" placeholder="New Password">
                </div>
                <button type="submit" class="btn btn-danger mr-4 mt-4" name="stuPassUpdate">Update</button>
                <button type="reset" class="btn btn-secondary mr-4 mt-4">Reset</button>
                <?php if(isset($msg)) {echo $msg;}   ?>
            </form>
        </div>
    </div>
</div>

<?php
include('./stuInclude/footer.php');
?>