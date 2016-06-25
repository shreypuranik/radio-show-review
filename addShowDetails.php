<div class="col-sm-2"></div>
<div class="col-sm-7"><?php
include_once("class.RSRData.php");

if (!empty($_GET['showName'])
    && !empty($_GET['showHost']))
{
    $rsrData = new RSRData();
    $rsrData->addShowToCollection($_GET['showName'], $_GET['showHost']);
    echo '<p>Thanks. This is now in the system</p>';
}
else{
    echo '<p>Hmm. Not quite right! Try again.</p>';
}
?>
    <p>Shows that are available to review can be seen <a href="availableShows.php">here</a>.</p>
</div>
<div class="col-sm-3"></div>