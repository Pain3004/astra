var base_path = $("#url").val();
$(document).ready(function() {
    //================================ start aging report  ===================================
    $("#AgingReportBtn").click(function(){
        $.ajax({
            type: "GET",
            url: base_path + "/admin/createAgingReport",
            async: false,
            success: function (text) {
            }
        });
        $("#ViewAgingReport").modal("show");
    });
    $(".closeViewAgingReport").click(function(){
        $("#ViewAgingReport").modal("hide");
    });
    $(".reportagi").click(function(){
        $("#report").show();
        $("#current").hide();
    });
    $(".currentagi").click(function(){
        $("#report").hide();
        $("#current").show();
    });
    //=================================== end aging report ======================================
});