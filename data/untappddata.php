<?php
class UntappdData extends UntappdApi
{
    private $reviewdata = array();
    private $cleandata = array();
    
    private function filterData()
    {   
        $limit = 0;
        $items =  $this->reviewdata['response']['checkins']['items'];

        foreach($items as $item){
            if($limit <= 10){
                $this->cleandata[$limit]["created"] = $item['created_at'];
                $this->cleandata[$limit]["rating"] = $item['rating_score'];
                $this->cleandata[$limit]["first_name"] = $item["user"]['first_name'];
                $this->cleandata[$limit]["last_name"] = $item["user"]['last_name'];
                $this->cleandata[$limit]["user_avatar"] = $item["user"]['user_avatar'];
                $this->cleandata[$limit]["brewery_name"] = $item['brewery']['brewery_name'];
                $this->cleandata[$limit]["beer_name"] = $item['beer']['beer_name'];
                $this->cleandata[$limit]["beer_style"] = $item['beer']['beer_style'];
                $this->cleandata[$limit]["beer_abv"] = $item['beer']['beer_abv'];
                $this->cleandata[$limit]["beer_ibu"] = $item['beer']['beer_ibu'];
                $this->cleandata[$limit]["beer_label"] = $item['beer']['beer_label'];
                $this->cleandata[$limit]["brewery_label"] = $item['brewery']['brewery_label'];
            }
            $limit++;
        }        
    }
       
    private function temporaryStorage()
    {   
        $this->reviewdata = $this->getDataRequest();

        $this->filterData();        

        $jsonfile = dirname(__FILE__) .  $this->storagefile;
        $reviews = json_encode($this->cleandata, JSON_PRETTY_PRINT);
        $fp = fopen($jsonfile, 'w');
        fwrite($fp, $reviews);
        fclose($fp);
    }

    public function runImport()
    {
        $this->temporaryStorage();
    }

    public function getAllUntappdData()
    {   
        $jsonfile = dirname(__FILE__) .  $this->storagefile;
        $reviews = file_get_contents($jsonfile);
        return json_decode($reviews, true);
    }   

}
?>
