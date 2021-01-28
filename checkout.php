<?php
include('./dbConnection.php');
session_start();
if(!isset($_SESSION['stuLogemail']))
{
    echo '<script>location.href="loginorsignup.php"</script>';
}
else{
    header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
    $stulogemail = $_SESSION['stuLogemail'];
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="GENERATOR" content="Evrsoft First Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@1,700&display=swap" rel="stylesheet"> 
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-6 offset-sm-3 jumbotrone">
            <h3 class="mb3">Welcome to learning payment page</h3>
            <form action="./PaytmKit/pgRedirect.php" method="POST">
                <div class="form-group row">
                    <label for="ORDER_ID" class="col-sm-4 col-form-label">ORDER ID</label>
                    <div class="col-sm-8">
                        <input id="ORDER_ID" class="form-control" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo "ORDS" .rand(10000,99999999) ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="CUST_ID" class="col-sm-4 col-form-label">CUST ID</label>
                    <div class="col-sm-8">
                    <input id="CUST_ID" class="form-control" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php  if(isset($stulogemail)) {echo $stulogemail;} ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="TXN_AMOUNT" class="col-sm-4 col-form-label">Amount</label>
                    <div class="col-sm-8">
                    <input title="TXN_AMOUNT" type="text"  class="form-control" tabindex="10"  name="TXN_AMOUNT"  value="<?php  if(isset($_REQUEST['id'])) {echo $_REQUEST['id'];} ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    
                    <div class="col-sm-8">
                    <input  type="hidden" id="INDUSTRY_TYPE_ID"  class="form-control" tabindex="4" maxlength="12"  name="INDUSTRY_TYPE_ID" autocomplete="off"  value="Retail" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    
                    <div class="col-sm-8">
                    <input  type="hidden" id="CHANNEL_ID"  class="form-control" tabindex="4" maxlength="12"  name="CHANNEL_ID" autocomplete="off"  value="WEB" readonly>
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" name="Check out" onclick="">
                    <a href="./courses.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
            <small class="form-text text-muted">Note: Complete Payment by clicking checkout button </small>
        </div>
    </div>
</div>

</body>
</html>
 <?php 
 }

?>
