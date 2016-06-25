<?php
include_once("class.RSRData.php");

$rsrData = new RSRData();

$radioShows = array();

$show = array();
$show['showName'] = "Show A";
$show['showHost'] = "Show Host";

$radioShows[] = $show;

$show = array();
$show['showName'] = "Show B";
$show['showHost'] = "Show Host";

$radioShows[] = $show;

$show = array();
$show['showName'] = "Show C";
$show['showHost'] = "Show Host";

$radioShows[] = $show;

foreach($radioShows as $show){
    $rsrData->addShowToCollection($show['showName'], $show['showHost']);
}