<footer class="container-fluid bg-dark text-center p-2">
    <small class="text-white">Copyright &copy; 2020 || Design by ischool <a href="" data-toggle="modal" data-target="#adminLoginModelCenter">Admin Login</a></small>
</footer>

<!-- --------------------------end footer------------------------ -->

<!-- -------------------start registration signup--------------------- -->

<div class="modal fade" id="stuRegModelCenter" tabindex="-1" aria-labelledby="stuRegModelCenter
Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stuRegModelCenter
        Label">Student Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!-----------------Start registration form----------------->
      <?php include('studentRegistration.php')  ?>
  <!-----------------End registration form------------------>
      </div>
      <div class="modal-footer">
      <span id="successmsg"></span>
      <button type="button" class="btn btn-primary" onclick="addStu()" id="signup">Signup</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<!-- ------------------------end registration-signup--------------------------- -->


<!-- -------------------start student----------------- login ------------------- -->
<div class="modal fade" id="stuLoginModelCenter" tabindex="-1" aria-labelledby="stuLoginModelCenter
Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stuLoginModelCenter
        Label">Student Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form id="stuLoginForm">     <!-----------------Start Login form----------------->
    
    <div class="form-group">
        <i class="fas fa-envelope"></i>
        <label for="stuLogemail" class="font-weight-bold pl-2">Email</label>
        <input type="email" class="form-control" id="stuLogemail" name="stuLogemail" placeholder="Email" >
    </div>
    <div class="form-group">
        <i class="fas fa-key"></i>
        <label for="stuLogpass" class="font-weight-bold pl-1">Password</label>
        <input type="password" class="form-control" id="stuLogpass" name="stuLogpass" placeholder="Password" >
        
    </div>
  
 
 </form>      <!-----------------End Login form------------------>
</div>
      <div class="modal-footer">
      <small id="statuslogmsg"></small>
      <button type="button" onclick="stuLogin()">Login</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        
      </div>
    </div>
  </div>
</div>
<!-- -------------------End student login -->

<!-- -------------------start Admin----------------- login ------------------- -->
<div class="modal fade" id="adminLoginModelCenter" tabindex="-1" aria-labelledby="adminLoginModelCenter
Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adminLoginModelCenter
        Label">Admin Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form id="adminLoginForm">     <!-----------------Start Admin form----------------->
    
    <div class="form-group">
        <i class="fas fa-envelope"></i>
        <label for="adminLogemail" class="font-weight-bold pl-2">Email</label>
        <input type="email" class="form-control" id="adminLogemail" name="adminLogemail" placeholder="Email" >
    </div>
    <div class="form-group">
        <i class="fas fa-key"></i>
        <label for="adminLogpass" class="font-weight-bold pl-1">Password</label>
        <input type="password" class="form-control" id="adminLogpass" name="adminLogpass" placeholder="Password" >
        
    </div>
  
 
 </form>      <!-----------------End Admin form------------------>
</div>
      <div class="modal-footer">
  <button type="button" class="btn btn-primary" id="adminLoginBtn" onclick="adminLogin()">Login</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        
      </div>
    </div>
  </div>
</div>
<!-- -------------------End Adminlogin------------ -->





    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>

    <script type="text/javascript" src="js/owl-carousel.js"></script>
    <script type="text/javascript" src="js/ajaxrequest.js"></script>
    <script type="text/javascript" src="js/adminajaxrequest.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        var start_scr= 0;
        var star_change= $('.bg');
        var offset= star_change.offset();
        if(star_change.length)
        {
          $(document).scroll(function(){
            start_scr= $(this).scrollTop();
            if(start_scr>offset.top)
            {
              $('.bg').css('background-color','#ff0066');
            }
            else{
              $('.bg').css('background-color','');
            }
          })
        }
      })
    </script>
</body>
</html>