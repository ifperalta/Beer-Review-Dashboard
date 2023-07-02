<?php
function getReviewData(){
    $info = array("client_id"  => get_option("clientid"),
                  "client_secret" => get_option("clientsecret"),
                  "userId" => get_option("reviewuserId"),
                  "limit" => get_option("reviewlimit"),
                  "agent" => "UntappdPHP-GH-1.0",
                  "baseapi" => "https://api.untappd.com/v4/",
                  "storagefile" => "/datareviews.json",
                  "request" => "beer/checkins");
                
    $reviews = new UntappdData($info);
    return $reviews->getAllUntappdData();
}

function runDataImport(){

    $info = array("client_id"  => get_option("clientid"),
                  "client_secret" => get_option("clientsecret"),
                  "userId" => get_option("reviewuserId"),
                  "limit" => get_option("reviewlimit"),
                  "agent" => "UntappdPHP-GH-1.0",
                  "baseapi" => "https://api.untappd.com/v4/",
                  "storagefile" => "/datareviews.json",
                  "request" => "beer/checkins");

    $reviews = new UntappdData($info);
    $reviews->runImport();
}
?>