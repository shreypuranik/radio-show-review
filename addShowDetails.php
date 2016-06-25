<div class="col-sm-2"></div>
<div class="col-sm-7"><?php
include_once("class.RSRData.php");

if (!empty($_POST['showName'])
    && !empty($_POST['showHost']))
{
    $rsrData = new RSRData();
    $rsrData->addShowToCollection($_POST['showName'], $_POST['showHost']);
    echo '<p>Thanks. This is now in the system</p>';
}
else{
    echo '<p>Hmm. Not quite right! Try again.</p>';
}
?>
    <p>Shows that are available to review can be seen <a href="index.php?page=view-shows">here</a>.</p>
</div>
<div class="col-sm-3"></div>
