
$(document).ready(function() {
    $("#detailsPerPage").change(function () {
        let value = $("#detailsPerPage").val();
        $(".tableData").html("");
        $.ajax({
            type: "GET",
            url: `http://localhost/Test/index.php?action=admin`,
            data: {detailsPerPage:value},
            success: function (res) {
                console.log(res)
                // let data = JSON.parse(res);
                // console.log(data)
                // $("#tableData").html(data);
            }
        });
    });
});
