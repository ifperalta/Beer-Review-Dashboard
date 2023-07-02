<?php
class UntappdApi 
{
    public $userId = "";
    public $client_id = "";
    public $client_secret = "";

    public $curl;
    public $config;    
    public $agent;
    public $baseapi;
    
    public $storagefile;
    public $request;

    public function __construct($config) 
    {
        $this->client_id = $config["client_id"];
        $this->client_secret = $config["client_secret"];
        $this->userId = $config["userId"]; 
        $this->curl = curl_init();
        $this->config = $config;
        $this->agent = $config["agent"];
        $this->baseapi = $config["baseapi"];
        
        $this->storagefile = $config["storagefile"];
        $this->request = $config["request"];
    }
    
    public function userCredentials(){
        return "?client_id=". $this->client_id ."&client_secret=". $this->client_secret ."";
    }

    public function getDataRequest(){
        $url = $this->baseapi . $this->request . "/" . $this->userId . $this->userCredentials();
        $response = $this->processRequest($url); 
        return $response;
    }

    private function processRequest($url) {
		curl_setopt($this->curl, CURLOPT_URL, $url);
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($this->curl, CURLOPT_USERAGENT, $this->agent);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, http_build_query(array()));

        $result = curl_exec($this->curl);
        curl_close($this->curl);

        return json_decode($result, true);
 	}
}
?>