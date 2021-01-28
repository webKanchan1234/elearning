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
    <p class="bg-dark text-white p-2">List of Feedback</p>
    <?php
        $sql = "SELECT * FROM feedback";
        $result = $conn->query($sql);
        if($result->num_rows>0)
        {
            echo '<table class="table">
            <thead>
            <tr>
                <th scope="col">Feedback ID</th>
                <th scope="col">Content</th>
                <th scope="col">Student ID</th>
                <th scope="col">Action ID</th>
            </tr>
            </thead>
            <tbody>';
                while($row= $result->fetch_assoc())
                {
                    echo '<tr>';
                    echo '<th scope="col">'.$row['r_id'].'</th>';
                    echo '<th >'.$row['r_content'].'</th>';
                    echo '<th >'.$row['stu_id'].'</th>';
                    echo '<th >';
                    echo '
               
                  <form method="POST" class="d-inline">
                  <input type="hidden" name="id" value='.$row["r_id"].'>
                  <button class="btn btn-secondary mr-3" name="delete" value="Delete"><i class="fas fa-trash-alt"></i></button>
                  </form>';
               echo' </th>';
                }
            echo'</tbody>
            </table>';  
        }else
        {
            echo "0 Results";
        }
        if(isset($_REQUEST['delete'])){
    
            $sql = "DELETE FROM feedback where r_id= {$_REQUEST['id']}";
            if($conn->query($sql)==TRUE)
            {
                echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
            }
            else{
                echo "Unable to delete data";
            }
            }
    ?>
</div>


<?php
include('./adminInclude/footer.php'); 
?>