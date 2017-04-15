<?php

include_once('paper.php');
class APIcommunicator{
	public $papers;

	function __construct(){
		$this->papers = [];
	}

	function searchByKeywords($searchinput,$xinput,$isTest){
		/*crossref API */
		//$searchURL = "http://api.crossref.org/works?query.contributor=".$searchinput."&filter=full-text.type:application/pdf&rows=".$xinput;
		//$searchURL = "http://api.crossref.org/works?query.author=".$searchinput."&filter=publisher-name:Association+for+Computing+Machinery+(ACM)&rows=".$xinput;
		//$searchURL = "http://api.crossref.org/works?query.author=wang&filter=publisher-name:Association+for+Computing+Machinery+(ACM)";
		
		//echo var_dump($this->papers);
		/* arxiv API */
		
		$searchURL = "http://export.arxiv.org/api/query?search_query=all:".$searchinput."&start=0&max_results=".$xinput;
		$result = $this->execSearchTerm($searchURL);
		$result = simplexml_load_string($result)->entry;
		$this->generatePapers($result);
		echo json_encode($this->papers);	
		
	}
	function searchByAuthor($searchinput,$xinput,$isTest){
		for($i=0; $i<20; $i++){
			$searchinput = str_replace(" ","+",$searchinput);
			$searchURL = "http://api.crossref.org/works?filter=has-full-text:true,has-abstract:true";
			//$searchURL = "http://api.crossref.org/works?filter=member:320";
			$searchURL .= "&query.author=".$searchinput;
			$searchURL .= "&rows=".$xinput;		
			$result = $this->execSearchTerm($searchURL);
			$result = json_decode($result, true);
			if(array_key_exists("items",$result["message"])){
				break;
			}
		}
		if(!array_key_exists("items",$result["message"])){
			echo "error";
			return;
		}
		$result = $result["message"]["items"];
		$this->crossrefACMgenerate($result);
		//echo var_dump($this->papers);
		echo json_encode($this->papers);
	}
	function execSearchTerm($searchTerm) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $searchTerm);
    	curl_setopt($ch, CURLOPT_HEADER, 0);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$searchresult = curl_exec($ch);
		curl_close($ch);
		return $searchresult;
	}
	/* arxiv API */
	function generatePapers($xmlobject){
		for($i=0; $i<sizeof($xmlobject); $i++){
			$paper = new Paper();
			$paper->setTitle((string)$xmlobject[$i]->title);
			$paper->setAuthors((string)$xmlobject[$i]->author->name);
			$paper->setAbstract((string)$xmlobject[$i]->summary);
			$link = (string)$xmlobject[$i]->link[1]->attributes()->href;
			$paper->setDownloadLink($link);
			array_push($this->papers,$paper);
		}
	}
	/* crossref API */
	function crossrefACMgenerate($xmlobject){
		for($i=0; $i<sizeof($xmlobject); $i++){
			$paper = new Paper();
			$paper->setTitle($xmlobject[$i]["title"][0]);
			for($j=0; $j<sizeof($xmlobject[$i]["author"]);$j++){
				$wholename = $xmlobject[$i]["author"][$j];
				$paper->setAuthors($wholename["given"]." ".$wholename["family"]);
			}
			if(array_key_exists ("abstract",$xmlobject[$i])){
				$paper->setAbstract($xmlobject[$i]["abstract"]);
			}else{
				$paper->setAbstract("Not available for this paper");
			}
			/*
			if(array_key_exists ("event",$xmlobject[$i])){
				$paper->setConference($xmlobject[$i]["event"]);
			}else{
				$paper->setConference("NULL");
			}
			*/
			/*
			if(array_key_exists ("DOI",$xmlobject[$i])){
				$paper->setDOI($xmlobject[$i]["DOI"]);
				$searchURL = "http://dx.doi.org/".$paper->getDOI();
				$html = file_get_contents($searchURL);
				libxml_use_internal_errors(true);
				$dom = new DOMDocument();
				$dom->loadHTML($html);
				$dom->saveHTML();
				$links = $dom->getElementsByTagName('a');
				foreach ($links as $link){
					if($link->getAttribute('title')=='FullText PDF'){
    					$paper->setDownloadLink($link->getAttribute('href'));
					}
		         	
				}
			}else{
				$paper->setDOI("");
			}	
			*/
			
			$paper->setDownloadLink($xmlobject[$i]["link"][0]["URL"]);
			array_push($this->papers,$paper);
		}
	}

	function getFullText(){

	}
}


?>