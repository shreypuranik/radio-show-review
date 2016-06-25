$(document).ready(function(){
$("#showDetailsSubmit").click(function(){
    var showName = $("#showNameInput").val();
    var showHost = $("#showHostInput").val();
    $("#showDetailsDiv").load("addShowDetails.php?showName="+showName+"&showHost="+showHost);
})


})