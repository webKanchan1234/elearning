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
$adminLogemail= $_SESSION['adminLogemail'];
if(isset($_REQUEST['adminPassUpdate']))
{
    if($_REQUEST['inputnewPass']=="")
    {
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Fill All Fields</div>";
    }
    else
    {
        $sql = "SELECT * FROM admin where admin_email= '$adminLogemail' ";
        $result = $conn->query($sql);
        if($result->num_rows == 1)
        {
            $adminpass= $_REQUEST['inputnewPass'];
            $sql = "UPDATE admin SET admin_pass='$adminpass' where admin_email='$adminLogemail' ";
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
                    <input type="email" class="form-control" name="inputEmail" value="<?php echo $adminLogemail ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="inputnewPass">New Password</label>
                    <input type="password" class="form-control" id="inputnewPass" name="inputnewPass" placeholder="New Password">
                </div>
                <button type="submit" class="btn btn-danger mr-4 mt-4" name="adminPassUpdate">Update</button>
                <button type="reset" class="btn btn-secondary mr-4 mt-4">Reset</button>
                <?php if(isset($msg)) {echo $msg;}   ?>
            </form>
        </div>
    </div>
</div>

<?php
include('./adminInclude/footer.php');
?>