
$(document).ready(function (){
    $("form").submit(function (e){
        e.preventDefault();
        let formData = new FormData(this);
        // console.log(formData)
        $.ajax({
            url:'http://localhost/Test/index.php?action=login',
            type:'post',
            data:formData,
            contentType:false,
            processData:false,
            success:function (res){
                console.log(res)
                var formData =JSON.parse(res);
                console.log(formData.type)
                if (formData.type == 'admin'){
                    window.location.href = "http://localhost/Test/index.php?action=admin";
                    console.log("Moving to admin page")
                }else if(formData.type == 'user'){
                    window.location.href = "http://localhost/Test/index.php?action=index";
                    console.log("Moving to Home page")
                }
                else if(formData.error){
                    $("#alertmsg").css("display","block")
                    $("#alertmsg").addClass("alert-danger")
                    $("#alertmsg").text("Wrong Credentials")
                }
                else{
                    $("#alertmsg").css("display","block")
                    $("#alertmsg").addClass("alert-danger")
                    $("#alertmsg").text("Every column is required")
                }
            }
        })
    })
})

