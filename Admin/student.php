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

<div class="col-sm-9 mt-5">
    <!-- ---table -->
    <p class="bg-dark text-center text-white p-2">List of Students</p>
    <?php
        $sql = "SELECT * FROM student";
        $result=$conn->query($sql);
        if($result->num_rows>0)
        {

        
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Student ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = $result->fetch_assoc()) {  
          echo '  <tr>';
          echo ' <th scope="row">'.$row['stu_id']. '</th>';
          echo ' <td>'.$row['stu_name'].'</td>';
           echo '  <td>'.$row['stu_email'].'</td>';
               echo '  <td>';
               echo '
               <form action="editstudent.php" method="POST" class="d-inline">
               <input type="hidden" name="id" value='.$row["stu_id"].'>
               <button class="btn btn-info mr-3" name="view" value="View"><i class="fas fa-pen"></i></button>
               </form>';
                  echo'
                  <form method="POST" class="d-inline">
                  <input type="hidden" name="id" value='.$row["stu_id"].'>
                  <button class="btn btn-secondary mr-3" name="delete" value="Delete"><i class="fas fa-trash-alt"></i></button>
                  </form>';
               echo' </td>';
           echo' </tr>';
             } ?>
        </tbody>
    </table>
    <?php }
    else "0 Results";

     ?>
</div>
</div>
<div>
    <a href="./addnewstudent.php" class="btn btn-danger float-right "><i class="fas fa-plus fa-2x"></i></a>
</div>

</div>

<!-- -------------delete course----------------------- -->
<?php
if(isset($_REQUEST['delete'])){
    
$sql = "DELETE FROM student where stu_id= {$_REQUEST['id']}";
if($conn->query($sql)==TRUE)
{
    echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
}
}
?>

<?php
include('./adminInclude/footer.php'); 
?>
  