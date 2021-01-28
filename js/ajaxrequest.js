//---------------------checking email exist or not during typing----------------
$(document).ready(function(){
    $("#stuemail").on("keypress blur", function (){
        var stuemail = $("#stuemail").val();
        $.ajax({
            url:"student/addStudent.php",
            method:'POST',
            data: {
                checkemail : "checkemail",
                stuemail : stuemail,
            },
            success:function(data){
                if(data!=0)
                {
                     $("#statusMsgemail").html('<small style="color:red;">Email already exist</samll>');
                    $("#signup").Attr("disabled",true);
                }
            },
        });
    });
});



function addStu(){
    var reg =/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass = $("#stupass").val();
    
    if(stuname.trim()=="")
    {
        $("#statusMsgname").html('<small style="color:red;">Please Enter your name</samll>');
        $("#stuname").focus();
        return false;
    }
    else if(stuemail.trim()=="")
    {
        $("#statusMsgemail").html('<small style="color:red;">Please Enter your email</samll>');
        $("#stuemail").focus();
        return false;
    }
    else if(stuemail.trim() !="" && !reg.test(stuemail))
    {
        $("#statusMsgpass").html('<small style="color:red;">Please Enter your valid email e.g example@gmail.com</samll>');
        $("#stuemail").focus();
        return false;
    }
    else if(stupass.trim()=="")
    {
        $("#statusMsg3").html('<small style="color:red;">Please Enter your password</samll>');
        $("#stupass").focus();
        return false;
    }
    else{
    $.ajax({
        url:'student/addStudent.php',
        method:'POST',
        dataType:"json",               //define datatype
        data:{
            stusignup:"stusignup",
            stuname :stuname,
            stuemail : stuemail,
            stupass : stupass,
        },

        success:function(data){
            console.log(data);
            if(data=="OK")
            {
                $("#successmsg").html("<span class='alert alert-success' >Registration successfully !</span>");
                clearStuRegFields();
            }
            
            else if(data=="Failed")
            {
                $("#successmsg").html("<span class='alert alert-danger'>Unable to register</span>");
            }
        }
    })

    }

}

function clearStuRegFields(){
    $("#stuRegForm").trigger("reset");
    $("#statusMsgname").html(" ");
    $("#statusMsgemail").html(" ");
    $("#statusMsgpass").html(" "); 
}

//----------------student login-----------------------------
function stuLogin(){
    
    var stuloginemail = $("#stuLogemail").val();
    var stuloginpass = $("#stuLogpass").val();
    $.ajax({
        url:'student/addStudent.php',
        method:'POST',
        data:{
            checklogemail: "checklogemail",
            stuloginemail : stuloginemail,
            stuloginpass : stuloginpass,
        },
        success:function(data){
            if(data==0)
            {
                $("#statuslogmsg").html("<span class='alert alert-danger'>Invalid email id or wrong password</span>");
            }
            else if(data==1)
            {
                $("#statuslogmsg").html('<div class="spinner-border text-success" role="status"></div>');
                setTimeout(() =>{
                    window.location.href="index.php";
                },1000);
            }
        },
    });
}