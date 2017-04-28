<?php
use PHPUnit\Framework\TestCase;

include_once('paper.php');
class APIcommunicator{
	public $papers;
	public $acmurl;

	function __construct(){
		$this->papers = [];
		$this->acmurl = "http://dl.acm.org/";
	}
	function searchByAuthor($searchinput,$xinput,$isTest){
		for($i=0; $i<5; $i++){
			$searchinput = str_replace(" ","+",$searchinput);
			//$searchURL = "http://api.crossref.org/works?filter=has-full-text:true,has-abstract:true";
			$searchURL = "http://api.crossref.org/works?filter=member:320";
			$searchURL .= "&query.author=".$searchinput;
			$searchURL .= "&rows=".$xinput;		
			$result = $this->execSearchTerm($searchURL);
			$result = json_decode($result, true);
			if(array_key_exists("items",$result["message"])){
				break;
			}
		}
		if(!array_key_exists("items",$result["message"])){
			if(!$isTest) echo "error";//@codeCoverageIgnore
			else return "error";
		}
		$result = $result["message"]["items"];
		$this->crossrefACMgenerate($result);
		if($isTest){
			return $this->papers;
		}
		echo json_encode($this->papers);//@codeCoverageIgnore
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
	/**
     * @codeCoverageIgnore
     */	
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
				if(array_key_exists("given",$wholename)&&array_key_exists("family",$wholename)){
					$paper->setAuthors($wholename["given"]." ".$wholename["family"]);
				}else if(!array_key_exists("given",$wholename)&&array_key_exists("family",$wholename)){
					$paper->setAuthors($wholename["family"]);
				}else if(array_key_exists("given",$wholename)&&!array_key_exists("family",$wholename)){
					$paper->setAuthors($wholename["given"]);
				}
			}
			if(array_key_exists ("DOI",$xmlobject[$i])){
				
				$paper->setDOI($xmlobject[$i]["DOI"]);
				$searchURL = "http://dx.doi.org/".$paper->getDOI();
				/* rotating proxy, need to delete*/
				$auth = base64_encode('chen475@usc.edu:123321');
				$aContext = array(
    				'http' => array(
        				'proxy' => 'us-wa.proxymesh.com:31280',
       					'request_fulluri' => true,
       					'header' => "Proxy-Authorization: Basic $auth",
   					),
				);
				$cxContext = stream_context_create($aContext);
				$html = file_get_contents($searchURL,False, $cxContext);
				/**/
				//$html = file_get_contents($searchURL);
				libxml_use_internal_errors(true);
				$dom = new DOMDocument();
				$dom->loadHTML($html);
				$dom->saveHTML();
				$links = $dom->getElementsByTagName('a');
				foreach ($links as $link){
					if($link->getAttribute('title')=='FullText PDF'||$link->getAttribute('title')=='Get this Article'){
    					$paper->setDownloadLink($this->acmurl.$link->getAttribute('href'));
    					$this->AnalyzeLink($paper,$link->getAttribute('href'));
					}	
				}
			}else{
				$paper->setDOI("");
			}	
			$this->getAbstract($paper);
			$this->generateBibtex($paper);
			array_push($this->papers,$paper);
		}
	}

	function getAbstract($paper){
		$searchURL = $this->acmurl."tab_abstract.cfm?";
		$searchURL .= "id=".$paper->id;
		$searchURL .= "&type=Article&usebody=tabbody&";
		$searchURL .= "cfid=".$paper->cfid;
		$searchURL .= "&cftoken=".$paper->cftoken;
		$auth = base64_encode('chen475@usc.edu:123321');
		$aContext = array(
    		'http' => array(
       			'proxy' => 'us-wa.proxymesh.com:31280',
				'request_fulluri' => true,
       			'header' => "Proxy-Authorization: Basic $auth",
   			),
   		);
		$cxContext = stream_context_create($aContext);
		$html = file_get_contents($searchURL,False, $cxContext);
		ob_start();
		var_dump($html);
		$text = ob_get_clean();
		$text = $this->getSubstring($text,">","</div>");
		$text .= "</div>";
		$text = $this->getSubstring($text,">","</div>");
		str_replace("<p>"," ", $text);
		str_replace("</p>"," ", $text);
		$paper->setAbstract($text);

	}

	function AnalyzeLink($paper,$downloadlink){
		$id = $this->getSubstring($downloadlink,"id=","&");
		$paper->setId($id);
		$ftid = $this->getSubstring($downloadlink,"ftid=","&");
		$paper->setFtid($ftid);
		$cfid = $this->getSubstring($downloadlink,"CFID=","&");
		$paper->setFtid($cfid);
		$templink = $downloadlink."***";
		$cftoken = $this->getSubstring($templink,"CFTOKEN=","***");
		$paper->setCFtoken($cftoken);

	}

	function generateBibtex($paper){
		$link = "http://dl.acm.org/exportformats.cfm?id=".$paper->id."&expformat=bibtex";
		$paper->setBibtex($link);
	}

	function getSubstring($string, $start, $end){
    	$string = ' ' . $string;
    	$ini = strpos($string, $start);
    	if ($ini == 0) return '';
    	$ini += strlen($start);
    	$len = strpos($string, $end, $ini) - $ini;
    	return substr($string, $ini, $len);
	}

}


?>