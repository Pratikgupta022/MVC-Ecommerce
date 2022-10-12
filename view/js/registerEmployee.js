
$(document).ready(function (){
    $("form").submit(function (e){
        e.preventDefault();
        let formData = new FormData(this);
        let img = $("#image")[0].files;
        if (img.length>0){
            formData.append('image',img[0])
        }else{
            $("#alertmsg").text("Please select an image");
            $("#alertmsg").addClass("alert-danger")
            $("#alertmsg").css("display","block")
        }
        console.log(formData)
        $.ajax({
            url:'http://localhost/Test/index.php?action=registerEmployee',
            type:'post',
            data:formData,
            contentType:false,
            processData:false,
            success:function (res){
                // console.log(res)
                var formData =JSON.parse(res);
                if (formData.statusCode=='email'){
                    $("#alertmsg").css("display","block")
                    $("#alertmsg").addClass("alert-danger");
                    $("#alertmsg").text("Email already exists")
                }else if (formData.statusCode=='pan'){
                    $("#alertmsg").css("display","block")
                    $("#alertmsg").addClass("alert-danger")
                    $("#alertmsg").text("This PAN number is already registered do not match")
                }
                else if (formData.statusCode=='phone'){
                    $("#alertmsg").css("display","block")
                    $("#alertmsg").addClass("alert-danger")
                    $("#alertmsg").text("Phone number already exists")
                }
                else if(formData.statusCode==200){
                    window.location.href = "http://localhost/Test/index.php?action=admin";
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

