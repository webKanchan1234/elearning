<?php
include('./dbConnection.php');
include('./mainInclude/header.php');
?>

<div class="container-fluid bg-dark">
    <div class="row">
        <img src="img/img3.jpg" alt="" style="height: 500px;width:100%; object-fit:cover;box-shadow:10px;">
    </div>
</div>

<!--------------------courses--------------------------------------------------> 
<div class="container mt-5">
    <h1 class="text-center">All Courses</h1>
    
    <div class="row mt-5">
    <?php
        $sql = "SELECT * FROM course";
        $result = $conn->query($sql);
        if($result->num_rows>0)
        {
            while($row = $result->fetch_assoc())
            {
                $courseid = $row['course_id'];
                echo '
                <a href="courseDetail.php?course_id='.$row['course_id'].'" class="btn" style="text-align:left; padding:0;margin:0;">
                <div class="card">
                <img src="'.str_replace('..','.',$row['course_img']).'" alt="" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">'.$row['course_name'].'</h5>
                    <p class="card-text">'.$row['course_desc'].'</p>
                </div>
                <div class="card-footer">
                    <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['course_original_price'].'</del></small><span class="font-weight-bolder">&#8377 '.$row['course_price'].'</span></p>
                    <a href="courseDetail.php?course_id='.$row['course_id'].'" class="font-weight-bolder btn btn-primary text-white float-right">Enroll</a>
                </div>
                 </div>
                </a>
                
                ';
            }
        }
    ?>
    </div>
    
</div>

<!--  ------------end courses------------------------ -->



<?php
include('./mainInclude/footer.php')
?>