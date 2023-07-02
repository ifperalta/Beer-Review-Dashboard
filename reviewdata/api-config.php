<?php 

function getData(){

    $info = array("client_id"  => get_option("clientid"),
                   "client_secret" => get_option("clientsecret"),
                   "userId" => get_option("reviewuserId"),
                   "limit" => get_option("reviewlimit"));

    $request = new UntappdClass($info['client_id'], $info['client_secret'], $info['userId']);
    $result = $request->getDataRequest('beer/checkins');

    $items = $result['response']['checkins']['items'];
    $limit = 0;

    $beer_review = array();

    if(!empty($items)){
        foreach($items as $item){
            if($limit <= $info["limit"]){
                $beer_review[$limit]["created"] = $item['created_at'];
                $beer_review[$limit]["rating"] = $item['rating_score'];
                $beer_review[$limit]["first_name"] = $item["user"]['first_name'];
                $beer_review[$limit]["last_name"] = $item["user"]['last_name'];
                $beer_review[$limit]["user_avatar"] = $item["user"]['user_avatar'];
                $beer_review[$limit]["brewery_name"] = $item['brewery']['brewery_name'];
                $beer_review[$limit]["beer_name"] = $item['beer']['beer_name'];
                $beer_review[$limit]["beer_style"] = $item['beer']['beer_style'];
                $beer_review[$limit]["beer_abv"] = $item['beer']['beer_abv'];
                $beer_review[$limit]["beer_ibu"] = $item['beer']['beer_ibu'];
                $beer_review[$limit]["beer_label"] = $item['beer']['beer_label'];
                $beer_review[$limit]["brewery_label"] = $item['brewery']['brewery_label'];
            }
            $limit++;
        }
    }
    return $beer_review;
}
?>
