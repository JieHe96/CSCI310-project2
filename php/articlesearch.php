<?php
	include_once('APIcommunicator.php');
	$comm = new APIcommunicator();
	$comm->searchByAuthor($_POST['searchinput'],$_POST['xinput'],false);
	//$comm->searchByKeywords($_POST['searchinput'],$_POST['xinput'],false);

?>