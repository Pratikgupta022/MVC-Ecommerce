
$(document).ready(function (){
    $("form").submit(function (e){
        e.preventDefault();
        let formData = new FormData(this);
        // console.log(formData)
        $.ajax({
            url:'http://localhost/Test/index.php?action=register',
            type:'post',
            data:formData,
            contentType:false,
            processData:false,
            success:function (res){
                var formData =JSON.parse(res);
                if (formData.emailExists){
                    $("#alertmsg").css("display","block")
                    $("#alertmsg").addClass("alert-danger");
                    $("#alertmsg").text("Email already exists")
                }else if (formData.mpass){
                    $("#alertmsg").css("display","block")
                    $("#alertmsg").addClass("alert-danger")
                    $("#alertmsg").text("Passwords do not match")
                }
                else if(formData.statusCode=='200'){
                    window.location.href = "http://localhost/Test/index.php?action=login";
                }
                else{
                    $("#alertmsg").css("display","block")
                    $("#alertmsg").addClass("alert-danger")
                    $("#alertmsg").text("Every column is required")
                }
                // console.log(formData)
                // console.log(res)
            }
        })
    })
})

