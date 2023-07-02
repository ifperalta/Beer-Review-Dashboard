<?php
class UntappdData extends UntappdApi
{
    private $reviewdata = array();
    private $cleandata = array();
    
    private function filterData()
    {   
        $x = 1;
        $items =  $this->reviewdata['response']['checkins']['items'];

        foreach($items as $item){
            if($x <= $this->limit){
                $this->cleandata[$x]["created"] = $item['created_at'];
                $this->cleandata[$x]["rating"] = $item['rating_score'];
                $this->cleandata[$x]["checkin_comment"] = $item['checkin_comment'];
                $this->cleandata[$x]["first_name"] = $item["user"]['first_name'];
                $this->cleandata[$x]["last_name"] = $item["user"]['last_name'];
                $this->cleandata[$x]["user_avatar"] = $item["user"]['user_avatar'];
                $this->cleandata[$x]["brewery_name"] = $item['brewery']['brewery_name'];
                $this->cleandata[$x]["beer_name"] = $item['beer']['beer_name'];
                $this->cleandata[$x]["beer_style"] = $item['beer']['beer_style'];
                $this->cleandata[$x]["beer_abv"] = $item['beer']['beer_abv'];
                $this->cleandata[$x]["beer_ibu"] = $item['beer']['beer_ibu'];
                $this->cleandata[$x]["beer_label"] = $item['beer']['beer_label'];
                $this->cleandata[$x]["brewery_label"] = $item['brewery']['brewery_label'];
            }
            $x++;
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
