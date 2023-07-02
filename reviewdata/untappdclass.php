<?php
class UntappdClass 
{
    public $userId = "";
    public $client_id = "";
    public $client_secret = "";

    public $agent = "UntappdPHP-GH-1.0";
    public $baseapi = "https://api.untappd.com/v4/";
    public $curl_request;
   

    public function __construct($client_id, $client_secret, $userId) 
    {
        $this->client_id = $client_id;
        $this->client_secret = $client_secret;
        $this->userId = $userId; 
        $this->curl_request = curl_init();
    }

    public function userCredentials(){
        return "?client_id=". $this->client_id ."&client_secret=". $this->client_secret ."";
    }

    public function getDataRequest($request){
        $url = $this->baseapi . $request . "/" . $this->userId . $this->userCredentials();
        $response = $this->processRequest($url); 
        return $response;
    }

    private function processRequest($request) {
		
		curl_setopt($this->curl_request, CURLOPT_URL, $request);
		curl_setopt($this->curl_request, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($this->curl_request, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($this->curl_request, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($this->curl_request, CURLOPT_USERAGENT, $this->agent);
        curl_setopt($this->curl_request, CURLOPT_POSTFIELDS, http_build_query(array()));

        $result = curl_exec($this->curl_request);
        curl_close($this->curl_request);

        return json_decode($result, true);
 	}
}
?>
