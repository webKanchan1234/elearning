<?php
include('./mainInclude/header.php'); 
?>

<div class="container mt-4" id="contact">
    <h2 class="text-center mb-4">Contact us</h2>
    <div class="row">
        <div class="col-md-8">
            <form action="" method="POST">
                <input type="text" class="form-control" name="name" placeholder="Name"> <br>
                <input type="text" class="form-control" name="subject" placeholder="Subject"> <br>
                <input type="email" class="form-control" name="email" placeholder="Email"> <br>
                <textarea name="message" class="form-control" placeholder="How can we help you?" style="height:150px;" ></textarea> <br>
                <input type="submit" value="Send" class="btn btn-primary"> <br> <br>
            </form>
        </div> <!-------------End 1st column -->
        <div class="col-md-4 stripe text-center text-white"> <!-------------start 2nd column -->
            <h4>Ischool</h4>
            <p>ischool,
                Near police camp barauni,
                Bihar -  30035 <br>
                Phone +9134xxxxx45 <br>
                www.ischool.com
            </p>
        </div>
    </div>
</div>
