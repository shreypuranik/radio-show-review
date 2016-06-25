$(document).ready(function(){
$("#showDetailsSubmit").click(function(){
    var showNameInput = $("#showNameInput").val();
    var showHostInput = $("#showHostInput").val();
    $.post( "addShowDetails.php", { showName: showNameInput, showHost: showHostInput })
        .done(function( data ) {
            alert( "Data Loaded: " + data );
        });
    return false;
})


})