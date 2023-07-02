<?php

/**
 * returns the beer and brewery information 
 */

function beerInformation(){
    $result = getReviewData();
    $limit = 0;
    foreach($result as $review => $item){
        if($limit < 1){
            $beerinfo = '<div class="review-row border">
                            <div class="review-card">         
                                <div class="review-row">     
                                    <div class="review-col-25">
                                        <img src="'. $item["beer_label"] .'" style="width: 100%;" />
                                    </div>   
                                    <div class="review-col-75">
                                        <div class="review-row">
                                            <div class="review-col-12">
                                                <h1 class="text-format size-25"><b>'. $item["beer_name"].'</b></h1>
                                            </div>
                                            <div class="review-col-12">
                                                <h3 class="text-format size-15"><i>'. $item["brewery_name"].'</i></h3>
                                            </div>
                                        </div>
                                        <div class="review-row">   
                                            <div class="review-col-50">
                                                <b>Beer Style</b> <br />
                                                '. $item["beer_style"] .'
                                            </div>
                                            <div class="review-col-25">
                                                <b>Alcohol Content</b> <br />
                                                ' . $item["beer_abv"] .  '
                                            </div>
                                            <div class="review-col-25">
                                                <b>Bitterness</b> <br />
                                                ' . $item["beer_ibu"] .  '
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
              
            return $beerinfo;
        }   
        $limit++;
    }    
}


/**
 * returns the user review and information 
 */

function userReview(){
    $user_reviews = "";
    $result = getReviewData();
    foreach($result as $review => $item){
        $fullname = $item["first_name"] . ' ' . $item["last_name"];
        $date = date("F j, Y", strtotime($item["created"]));

        if($item["rating"] <= 2.5){
            $rating = '<b class="card-title" style="color: #C52316;">Rating: ' . $item["rating"] .  '</b>';
        }else{
            $rating = '<b class="card-title" style="color: #5E871F;">Rating: ' . $item["rating"] .  '</b>';
        }

        $user_reviews .= '<div class="review-row border">
                        <div class="review-card">
                                <div class="review-row mb-4">     
                                    <div class="review-col-50">
                                        <i>'. $date .'</i>
                                    </div>
                                    <div class="review-col-50 text-align-right">
                                        '. $rating .'
                                    </div>
                                </div>
                                <div class="review-row">        
                                    <div class="review-col-15">
                                        <img src="'. $item["user_avatar"] .'" style="width: 96%;" />
                                    </div>
                                    <div class="review-col-75">
                                        <div class="review-row">
                                            <div class="review-review-col-full">
                                                <h4 class="text-format size-15"><b>' . $fullname .  '</b></h4>
                                                <p class="card-text text-format-p"> '. $item['checkin_comment']  .' </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>                         
                        </div>
                </div>';
    }
    
    return $user_reviews;
}
?>