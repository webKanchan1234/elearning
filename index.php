<?php
include('./dbConnection.php');
include('./mainInclude/header.php')
?>
<!-- ------------------------end navigation------------------- -->
    
<!-- ------------------start video---------------------------------->
<div class="container-fluid remove-vid-marg">
    <div class="vid-parent">
        <video playsinline autoplay muted loop>
            <source src="video/vid.mp4">
        </video>
        <div class="video-overlay"></div>
    </div>
    <div class="vid-content">
        <h1 class="my-content">Welcome to learning</h1> 
        <small class="my-content">Learn and implement</small><br>
        <?php
            
            
            if(!isset($_SESSION['is_login']))
            {
              echo  '<a href="" class="btn btn-danger mt-3" data-toggle="modal" data-target="#stuRegModelCenter
                ">Get started</a>';
            }
            else{
        
                echo '<a href="student/studentProfile.php" class="btn btn-primary mt-3">My profile</a>';
            }
        
        ?>
        
    </div>
</div>


<!-- ------------------end video-------------------------------- -->

<!-- ---------------start text banner----------------------------- -->
<div class="container-fluid bg-danger text-banner">
    <div class="row banner-button">
        <div class="col-sm">
            <h5><i class="fas fa-book-open mr-3"></i> 100+ Online courses</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-users mr-3"></i> Expert Instructor</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-keyboard mr-3"></i> Lifetime access</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-ruppe-sign mr-3"></i> Money back Guarantee</h5>
        </div>

    </div>
</div>



<!-- ---------------end text banner----------------------------- -->

<!-- --------------------start popular courses----------------------- -->

<div class="container mt-5">
    <h1 class="text-center">Popular Courses</h1>
    <div class="card-deck mt-4">
    <?php
        $sql = "SELECT * FROM course LIMIT 3,3";
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
    <div class="card-deck mt-4">
    <?php
        $sql = "SELECT * FROM course LIMIT 3";
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
    <div class="text-center m-2">
        <a href="courses.php" class="btn btn-danger btn-sm">View All Courses</a>
    </div>
</div>
<!-- --------------------end popular courses----------------------- -->

<!-- ------------------start contact us------------------------ -->
<?php
include('./contact.php');
?>

<!-- --------------end contact us------------------------ -->

<!-- -----------start testimonial-------------------------------- -->
<div class="container-fluid mt-5" style="background-color: #4B7289;" id="feedback">
    <h1 class="text-center testyheading p-4">Student's feedback</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="owlcarousel" id="testimonial-slide">

            <?php
                $sql = "SELECT s.stu_name, s.stu_occ, s.stu_img, f.r_content FROM student AS s JOIN feedback AS f ON s.stu_id=f.stu_id";
                $result  = $conn->query($sql);
                if($result->num_rows>0)
                {
                    while($row = $result->fetch_assoc())
                    {
                        $s_img = $row['stu_img'];
                        $n_img = str_replace('..','.',$s_img);
                          
            ?>
                <div class="testimonial">
                    <p class="discription">
                        <?php echo $row['r_content'];  ?>
                    </p>
                    <div >
                        <img src="<?php echo $n_img; ?>" alt="">
                    </div>
                    <div class="testimonial-prof">
                        <h4><?php echo $row['stu_name']; ?></h4>
                        <small><?php echo $row['stu_occ']; ?></small>
                    </div>
                </div>
              <?php  }
                } ?>
            </div>
        </div>
    </div>
</div>


<!-- -----------end testimonial-------------------------------- -->


<!-- -----------start social -------------------------------- -->


<!-- -----------end social-------------------------------------------- -->


<!-- ------------------start about section--------------------------- -->

<div class="container-fluid p-4" style="background-color:#E9ECEF">
    <div class="container" tyle="background-color:#E9ECEF">
        <div class="row text-center">
            <div class="col-sm">
                <h5>About Us</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis excepturi laboriosam ratione necessitatibus iusto odit doloribus expedita minima illum quibusdam.</p>
            </div>
            <div class="col-sm">
                <h5>Catogary</h5>
                <a href="" class="text-dark">Web Development</a>
                <a href="" class="text-dark">Web Designing</a>
                <a href="" class="text-dark">Android app dev</a>
                <a href="" class="text-dark">iOS Deve</a>
                <a href="" class="text-dark">Data Analysis</a>
            </div>
            <div class="col-sm">
                <h5>contact us</h5>
                <p>ischool pvt ltd,<br>Near police camp,barouni,<br>Bihar-232445<br> Phone-+9193xxxxxx45</p>
            </div>
        </div>
    </div>
</div>

<!-- ------------------end about section--------------------------- -->


<!-- --------------------------start footer----------------------- -->
<?php
include('./mainInclude/footer.php')
?>