<?php
use PHPUnit\Framework\TestCase;
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
	}
	function getAuthors(){
		return $this->authors;
	}
	function setDownloadLink($link){
		//$this->downloadlink = "http://dl.acm.org/".$link;
		$this->downloadlink = $link;
	}
	/**
     * @codeCoverageIgnore
     */	
	function getDownloadLink(){
		return $this->downloadlink;
	}
	/**
     * @codeCoverageIgnore
     */	
	function setAbstract($abstract){
		$this->abstract = $abstract;
	}
	/**
     * @codeCoverageIgnore
     */	
	function getAbstract(){
		return $this->abstract;
		
	}
	/**
     * @codeCoverageIgnore
     */	
	function setDOI($doi){
		$this->doi = $doi;
	}
	/**
     * @codeCoverageIgnore
     */	
	function getDOI(){
		return $this->doi;
	}
	/**
     * @codeCoverageIgnore
     */	
	function setConference($conf){
		$this->conference = $conf;
	}
	
}
?>