<?php
include_once("class.RSRTemplate.php");
echo RSRTemplate::getPageHeader();
echo RSRTemplate::getShowsForDate($_GET['date']);
echo RSRTemplate::getPageFooter();
?>