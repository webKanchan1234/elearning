<?php
if(!isset($_SESSION))
{
    session_start();
}
include('../dbConnection.php');
if(isset($_SESSION['is_login']))
{
    $stuemail = $_SESSION['stuLogemail'];
}
else
{
    echo '<script>location.href="../index.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link rel="stylesheet" href="../css/stustyle.css">
    
    
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@1,700&display=swap" rel="stylesheet"> 
    <title>Watch course</title>
</head>
<body>
    <div class="container-fluid bg-success p-2">
        <h3>Welcome to E-learning</h3>
        <a href="./myCourse.php" class="btn btn-danger">My course</a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-2 border-right">
                <h4 >Lessons</h4>
                <ul class="nav flex-column" id="playlist">
                    <?php
                        if(isset($_GET['course_id']))
                        {
                            $course_id = $_GET['course_id'];
                            $sql = "SELECT * FROM lesson where course_id='$course_id'";
                            $result = $conn->query($sql);
                            if($result->num_rows>0)
                            {
                                while($row = $result->fetch_assoc())
                                {
                                    echo '<li class="nav-item border-botton py-2" movieurl="'.$row['lesson_link'].'" style="cursor:pointer;">'.$row['lesson_name'].'</li>
                                    ';
                                }
                            }
                        }

                    ?>
                </ul>
            </div>
            <div class="col-sm-10">
                <video src="" id="videoarea" class="mt-4 w-75 ml-2" controls>
                </video>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/custom.js"></script>
</body>
</html>