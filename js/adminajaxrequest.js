function adminLogin(){
    console.log("click");
    var adminLogemail = $("#adminLogemail").val();
    var adminLogpass = $("#adminLogpass").val();
    $.ajax({
        url:'Admin/admin.php',
        method:'POST',
        data:{
            checklogemail: "checklogemail",
            adminLogemail : adminLogemail,
            adminLogpass : adminLogpass,
        },
        success:function(data){
            if(data==0)
            {
                $("#statusadminlogmsg").html("<span class='alert alert-danger'>Invalid email id or wrong password</span>");
            }
            else if(data==1)
            {
                $("#statusadminlogmsg").html("<span class='alert alert-success'>success loading....</span>");

                setTimeout(() =>{
                    window.location.href="Admin/adminDashboard.php";
                },1000);
            }
        },
    });
}