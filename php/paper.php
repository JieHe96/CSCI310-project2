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
	public $id;
	public $ftid;
	public $cftoken;
	public $cfid;
	public $conferencelink;
	public $downloadlink2;
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
	/**
     * @codeCoverageIgnore
     */	
	function setBibtex($bibtex){
		$this->bibtex = $bibtex;
	}
	/**
     * @codeCoverageIgnore
     */
	function getBibtex($bibtex){
		return $this->bibtex;
	}
	/**
     * @codeCoverageIgnore
     */
	function setId($id){
		$this->id = $id;
	}
	/**
     * @codeCoverageIgnore
     */
	function setFtid($ftid){
		$this->ftid = $ftid;
	}
	/**
     * @codeCoverageIgnore
     */
	function setCFtoken($cftoken){
		$this->cftoken = $cftoken;
	}
	/**
     * @codeCoverageIgnore
     */	
	function setCfid($cfid){
		$this->cfid = $cfid;
	}
	function setconferencelink($conferencelink){
		$this->conferencelink = $conferencelink;

	}

}
?>