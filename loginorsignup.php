<?php
include('./dbConnection.php');
include('./mainInclude/header.php');
?>

<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./img/img1.jpg" alt="" style="height: 300px; width:100%; object-fit:cover;box-shadow:10px;">
    </div>
</div>

<div class="container jumbotron mb-5">
    <div class="row">
        <div class="col-md-4">
            <h3 class="mb-3">Already registered || Login</h3>
            <form action="" role="form" id="stuLoginForm">
                <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <label for="stuLogEmail" class="pl-2 font-weight-bolder">Email</label>
                    <small id="statusLogMsg1"></small>
                    <input type="email" class="form-control" id="stuLogEmail" name="stuLogEmail" placeholder="Email">
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <label for="stuLogPass" class="pl-2 font-weight-bolder">Pass</label>
                    <input type="password" class="form-control" id="stuLogPass" name="stuLogPass" placeholder="Password">
                </div>
                <button type="button" class="btn btn-primary" id="stuLoginBtn" onclick="checkStuLogin()">Login</button>
            </form> <br>
            <small id="statusLogMsg"></small>
        </div>
        <div class="col-md-6 offset-md-1">
            <h5 class="mb-3">New User ||Sign up</h5>
            <form action="" role="form" id="stuLoginForm">
                <div class="form-group">
                    <i class="fas fa-user"></i>
                    <label for="stuname" class="pl-2 font-weight-bolder">Name</label>
                    <small id="stausMsg1"></small>
                    <input type="text" class="form-control" id="stuname" name="stuname" placeholder="Name">
                </div>
                <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <label for="stuemail" class="pl-2 font-weight-bolder">Email</label>
                    <small id="statusLogMsg2"></small>
                    <input type="email" class="form-control" id="stuemail" name="stuemail" placeholder="Email">
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <label for="stupass" class="pl-2 font-weight-bolder">Password</label>
                    <input type="password" class="form-control" id="stupass" name="stupass" placeholder="Password">
                </div>
                <button type="button" class="btn btn-primary" id="stuLoginBtn" onclick="addStu()">Signup</button>
            </form><br>
            <small id="statusLogMsg"></small>
        </div>
    </div>
</div>

<?php
include('./contact.php')
?>
<?php
include('./mainInclude/footer.php')
?>