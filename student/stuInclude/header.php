<?php
include_once('../dbConnection.php');
if(!isset($_SESSION))
{
    session_start();
}
if(isset($_SESSION['is_login']))
{
    $stuloginemail= $_SESSION['stuLogemail'];
}
if(isset($stuloginemail))
{
    $sql  = "SELECT stu_img FROM student where stu_email= '$stuloginemail'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $stu_img = $row['stu_img'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@1,700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/stustyle.css">
</head>
<body>
    <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow" style="background-color: #225470;">
        <a href="studentProfile.php" class="navbar-brand col-sm-3 col-md-2 mr-2">E-learning </a>
    </nav>

    <!-- ----------------------start sidebar--------------------------- -->
    <div class="container-fluid mb-5" style="margin-top: 40px;">
        <div class="row">
            <nav class="col-sm-2 bg-lighter sidebar py-d d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2 mt-4">
                            <img src="<?php echo $stu_img ?>" alt="student image" class="img-thumbnail rounded-cirle">
                        </li>
                        <li class="nav-item ">
                            <a href="studentProfile.php"  class="nav-link  "><i class="fas fa-user"></i>Profile <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="myCourse.php"  class="nav-link  "><i class="fab fa-accessible-icon"></i>Mycourse</a>
                        </li>
                        <li class="nav-item">
                            <a href="stuFeedback.php"  class="nav-link  "><i class="fab fa-accessible-icon"></i>Feedback</a>
                        </li>
                        <li class="nav-item">
                            <a href="changePass.php"  class="nav-link  "><i class="fas fa-key"></i>Change Password</a>
                        </li>
                        <li class="nav-item">
                            <a href="../logout.php"  class="nav-link  "><i class="fas fa-sign-out-alt"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        

    <!-- ----------------------end sidebar--------------------------- -->
</body>
</html>