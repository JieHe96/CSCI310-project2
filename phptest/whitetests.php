<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class Alltest extends TestCase
{

	/**
     * @covers Paper::__construct
     * @covers Paper::getTitle
     * @covers Paper::getAuthors
     * @covers Paper::getDownloadLink
     */
	public function testPaperConstructor() {
		include_once(dirname(__File__).'/../php/paper.php');

		$title = "The Adventures of Tom Sawyer";
		$authors = "Mark Twain";
		$downloadlink = "www.google.com";
		
		$paper = new Paper();
		$paper->setTitle($title);
		$paper->setAuthors($authors);
		$paper->setDownloadLink($downloadlink);

		$this->assertEquals($title, $paper->getTitle());
		$this->assertEquals($authors, $paper->getAuthors());
		$this->assertEquals($downloadlink, $paper->getDownloadLink());
	}



}

?>