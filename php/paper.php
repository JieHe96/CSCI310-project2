<?php
class Paper{
	public $title;
	public $downloadlink;
	public $authors;
	function __construct(){

	}

	function setTitle($title){
		$this->title = $title;

	}
	function getTitle(){
		return $this->title;
	}
	function setAuthors($authors){
		return $this->authors = $authors;
	}
	function getAuthors(){
		return $this->authors;
	}
	function setDownloadLink($link){
		$this->downloadlink = $link;

	}
	function getDownloadLink(){
		return $this->downloadlink;
	}
}
?>