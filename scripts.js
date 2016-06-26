$(document).ready(function(){
$("#showDetailsSubmit").click(function(){
    var showNameInput = $("#showNameInput").val();
    var showHostInput = $("#showHostInput").val();
    $.post( "addShowDetails.php", { showName: showNameInput, showHost: showHostInput })
        .done(function( data ) {
            $("#showDetailsDiv").html(data);
        });
    return false;
})

    $("#showReviewSubmit").click(function(){
        var showNameInput = $("#showName").val();
        var showHostInput = $("#showReviewInput").val();
        var reviewerNameInput = $("#reviewerNameInput").val();

    $.post( "addShowReview.php", { showName: showNameInput, showHost: showHostInput })
            .done(function( data ) {
                $("#showDetailsDiv").html(data);
            });

        return false;
    })
})