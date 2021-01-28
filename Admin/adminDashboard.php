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
$sql = "SELECT * FROM course";
$result =$conn->query($sql);
$totalcourse = $result->num_rows;

$sql = "SELECT * FROM student";
$result =$conn->query($sql);
$totalstudent = $result->num_rows;

$sql = "SELECT * FROM courseorder";
$result =$conn->query($sql);
$sell = $result->num_rows;

?>
            <div class="col-sm-9 mt-5">
                <div class="row mx-5 text-center">
                    <div class="col-sm-4 mt-5">
                        <div class="card text-center bg-danger mb-3" style="max-width:18rem;">
                            <div class="card-header">Courses</div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $totalcourse; ?></h4>
                                <a href="courses.php" class="btn text-center">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-5">
                        <div class="card text-center bg-danger mb-3" style="max-width:18rem;">
                            <div class="card-header">Student</div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $totalstudent; ?></h4>
                                <a href="student.php" class="btn text-center">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-5">
                        <div class="card text-center bg-danger mb-3" style="max-width:18rem;">
                            <div class="card-header">Sold</div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $sell; ?></h4>
                                <a href="sellReport.php" class="btn text-center">View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-5 mt-5 text-center">
                    <!-- table---------------------- -->
                    <p class="text-white bg-dark p-2">Course ordered</p>
                    <?php
                        $sql = "SELECT * FROM courseorder";
                        $result = $conn->query($sql);
                        if($result->num_rows>0)
                        {
                  echo '<table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Course ID</th>
                                <th scope="col">Student Email</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>';
                        while($row = $result->fetch_assoc())
                        {
                          echo ' <tr>
                                <th scope="row">'.$row['order_id'].'</th>
                                <td>'.$row['course_id'].'</td>
                                <td>'.$row['stu_email'].'</td>
                                <td>'.$row['order_date'].'</td>
                                <td>'.$row['amount'].'</td>
                                <td><form class="d-inline" action="" method="">
                                <input type="hidden" id="id" name="id" value='.$row['co_id'].'>
                                <button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i>
                                </button>
                                </form>
                                </td>
                            </tr>';
                        }
                      echo '</tbody>
                    </table>';
                    }
                    else{
                        echo "0 Results";
                    }
                    if(isset($_REQUEST['delete']))
                    {
                        $sql = "DELETE FROM courseorder where co_id= {$_REQUEST['id']}";
                        if($conn->query($sql)===true)
                        {
                            echo '<meta http-equiv="refresh" content=0;URL=?deleted"/>';
                        }
                        else
                        {
                            echo "Unable to delete data";
                        }
                    }
                ?>
                </div>
            </div>
        </div>
   </div>
   <!-- --------------------------end sidebar------------------- -->



<?php
include('./adminInclude/footer.php'); 
?>
  
   