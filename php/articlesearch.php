<?php
	include_once('APIcommunicator.php');
	$comm = new APIcommunicator();
	$comm->searchArticle($_POST['searchinput'],$_POST['xinput'],false);
?>