<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@1,700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/adminstyle.css">
</head>
<body>
   <!-- --------------------------start navbar------------------- -->

    <nav class="navbar navbar-dark fixed-top p-0 shadow" style="background-color: #225470;">
        <a href="adminDashboard.php" class="navbar-brand col-sm-3 col-md-2 mr-2">E-learning <small>Admin Area</small></a>
    </nav>
   <!-- --------------------------end navbar------------------- -->

   <!-- -------------------------start sidebar------------------- -->
   <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticy">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="adminDashboard.php" class="nav-link">
                                <i class="fas fa-techometer-alt"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="courses.php" class="nav-link">
                                <i class="fas fa-accessible-icon"></i>
                                Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="lesson.php" class="nav-link">
                                <i class="fas fa-accessible-icon"></i>
                                Lession
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="student.php" class="nav-link">
                                <i class="fas fa-users"></i>
                                Student
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="sellReport.php" class="nav-link">
                                <i class="fas fa-table"></i>
                                Sell Report
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="adminPaymentStatus.php" class="nav-link">
                                <i class="fas fa-table"></i>
                                Payment Status
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="feedback.php" class="nav-link">
                                <i class="fas fa-accessible-icon"></i>
                                Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="adminChangePass.php" class="nav-link">
                                <i class="fas fa-key"></i>
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link">
                                <i class="fas fa-accessible-icon"></i>
                               Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>