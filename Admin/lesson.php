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

?>

<div class="col-sm-9 mt-5 mx-3">
    <form action="" class="mt-3 form-inline d-print-none">
        <div class="form-group mr-3">
            <label for="checkid"></label>
            <input type="text" class="form-control ml-3" id="checkid" name="checkid">
        </div>
        <button type="submit" class="btn btn-danger">Search</button>
    </form>



<?php
$sql = "SELECT course_id FROM course";
$result = $conn->query($sql);
while($row = $result->fetch_assoc())
{
    if(isset($_REQUEST['checkid']) && $_REQUEST['checkid']==$row['course_id'])
    {
        $sql= "SELECT * FROM course WHERE course_id= {$_REQUEST['checkid']}";
        $result=$conn->query($sql);
        $row = $result->fetch_assoc();
        if(($row['course_id'])==$_REQUEST['checkid'])
        {
            $_SESSION['course_id']= $row['course_id'];
            $_SESSION['course_name']= $row['course_name'];
            ?>
            <h3 class="bg-dark text-white mt-5 p-2">Course ID: <?php if(isset($row['course_id'])){echo $row['course_id'];}   ?> course name :
            <?php if(isset($row['course_name'])){echo $row['course_name'];}   ?></h3>
        <?php

        $sql = "SELECT * FROM lesson where course_id ={$_REQUEST['checkid']}";
        $result =$conn->query($sql);
                echo '<table class="table">
                <thead>
                    <tr>
                        <td scope="col">Lesson ID</td>;
                        <td scope="col">Lesson Name</td>;
                        <td scope="col">Lesson Link</td>;
                        <td scope="col">Lesson Action</td>;
                    </tr>
                </thead>
                <tbody>';
                while($row = $result->fetch_assoc())
                {
                    echo'<tr>';
                    echo '<th scope="row">'.$row['lesson_id'].'</th>';
                    echo '<td >'.$row['lesson_name'].'</td>';
                    echo '<th >'.$row['lesson_link'].'</th>';
                    echo '  <td>';
               echo '
               <form action="editlesson.php" method="POST" class="d-inline">
               <input type="hidden" name="id" value='.$row["lesson_id"].'>
               <button class="btn btn-info mr-3" name="view" value="View"><i class="fas fa-pen"></i></button>
               </form>';
                  echo'
                  <form method="POST" class="d-inline">
                  <input type="hidden" name="id" value='.$row["lesson_id"].'>
                  <button class="btn btn-secondary mr-3" name="delete" value="Delete"><i class="fas fa-trash-alt"></i></button>
                  </form>';
               echo' </td>';
                }
               echo' </tbody>';
               echo' </table>';
        }
        else
        {
            echo '<div class="alert alert-dark mt-4" role="alert">Course not fount</div>';
        }
        if(isset($_REQUEST['delete'])){
    
            $sql = "DELETE FROM lesson where lesson_id= {$_REQUEST['id']}";
            if($conn->query($sql)==TRUE)
            {
                echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
            }
            else{
                echo "Unable to delete data";
            }
            }
    }
}


?>
</div>
<div>
    <a href="./addLesson.php" class="btn btn-danger mt-5 "><i class="fas fa-plus fa-2x"></i></a>
</div>




<?php
include('./adminInclude/footer.php'); 
?>