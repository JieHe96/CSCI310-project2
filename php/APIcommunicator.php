<?php

include_once('paper.php');
class APIcommunicator{
	public $papers;

	function __construct(){
		$this->papers = [];
	}

	function searchArticle($searchinput,$xinput,$isTest){
		/* arxiv API */
		$searchURL = "http://export.arxiv.org/api/query?search_query=all:".$searchinput."&start=0&max_results=".$xinput;
		$result = $this->execSearchTerm($searchURL);
		$result = simplexml_load_string($result)->entry;
		$this->generatePapers($result);

		echo json_encode($this->papers);
		/*IEEE API
		$searchURL = "http://ieeexplore.ieee.org/gateway/ipsSearch.jsp?querytext=java&au=".$searchinput;
		$result = $this->execSearchTerm($searchURL);
		$result = simplexml_load_string($result)->document;
		$this->generatePapers($result);
		echo json_encode($this->papers);
		*/
	}
	function execSearchTerm($searchTerm) {
		$ch = curl_init();
		$options = array(CURLOPT_URL => $searchTerm,CURLOPT_RETURNTRANSFER => 1);
		curl_setopt_array($ch, $options);
		$searchresult = curl_exec($ch);
		curl_close($ch);
		return $searchresult;
	}

	function generatePapers($xmlobject){
		for($i=0; $i<sizeof($xmlobject); $i++){
			$paper = new Paper();
			$paper->setTitle((string)$xmlobject[$i]->title);
			$paper->setAuthors((string)$xmlobject[$i]->author->name);
			/* arxiv API */
			$link = (string)$xmlobject[$i]->link[1]->attributes()->href;
			$paper->setDownloadLink($link);

			array_push($this->papers,$paper);
		}
	}
}


?>