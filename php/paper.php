<?php
class Paper{
	public $title;
	public $downloadlink;
	public $authors = [];
	//public $authors;
	public $abstract;
	public $doi;
	public $conference;
	public $bibex;
	function __construct(){

	}

	function setTitle($title){
		$this->title = $title;

	}
	function getTitle(){
		return $this->title;
	}
	function setAuthors($authors){
		array_push($this->authors,$authors);
	//	$this->authors = $authors;
	}
	function getAuthors(){
		return $this->authors;
	}
	function setDownloadLink($link){
		//$this->downloadlink = "http://dl.acm.org/".$link;
		$this->downloadlink = $link;

	}
	function getDownloadLink(){
		return $this->downloadlink;
	}
	function setAbstract($abstract){
		$this->abstract = $abstract;
	}
	function getAbstract(){
		return $this->abstract;
		
	}
	function setDOI($doi){
		$this->doi = $doi;
	}
	function getDOI(){
		return $this->doi;
	}
	function setConference($conf){
		$this->conference = $conf;
	}

}
?>