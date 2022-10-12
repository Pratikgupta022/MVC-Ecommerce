
$(document).ready(function (){
    $("form").submit(function (e){
        e.preventDefault();
        let formData = new FormData(this);
        console.log(formData)
        $.ajax({
            url:'http://localhost/Test/index.php?action=edituser',
            type:'post',
            data:formData,
            contentType:false,
            processData:false,
            success:function (res){
                var formData =JSON.parse(res);
                console.log(formData.statusCode);
                if(formData.statusCode==200){
                    window.location.href = "http://localhost/Test/index.php?action=admin";
                }else if(formData.statusCode==400){
                    $("#alertmsg").css("display","block")
                    $("#alertmsg").addClass("alert-danger")
                    $("#alertmsg").text("Error  data")
                }
                console.log(res)
            }
        })
    })
})

