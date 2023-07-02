<?php
if(isset($_POST['submit'])){
    $config = array(
        "clientid" => $_POST['clientid'],
        "clientsecret" => $_POST['clientsecret'],
        "reviewuserid" => $_POST['reviewuserid'],
        "reviewlimit" => $_POST['reviewlimit'],
    );
    saveApiSettings($config);
}

if(isset($_POST['submit-import'])){
    runDataImport();
}
?>
<div class="container">
        <div class="div-wrapper">
            <div class="row">
                <div class="div-wrapper">
                    <h2>Untappd Configurations</h2>
                    <?php echo $message; ?>   
                    <form action="" class="form-submit" method="post">   
                        <input type="text" name="clientid" placeholder="Client ID" value="<?php echo get_option("clientid") ?>" />
                        <input type="text" name="clientsecret" placeholder="Client Secret"  value="<?php echo  get_option("clientsecret"); ?>" />

                        <div class="row-half">
                            <label>User ID</label>
                            <input type="text" class="short-field" name="reviewuserid" placeholder="User ID"  value="<?php echo  get_option("reviewuserid"); ?>" />
                        </div>
                        <div class="row-half">
                            <label>Number of reviews to display</label>
                            <input type="text" class="short-field" name="reviewlimit" placeholder="Limit"  value="<?php echo  get_option("reviewlimit"); ?>" />
                        </div>
                        <input type="submit" name="submit" class="btsub" value="Save Configurations" />
                    </form>
                </div> 

                <div class="div-wrapper">
                    <h2>Insert the shortcode in page HTML Editor</h2>
                    <input type="text" name="clientsecret" id="inputfield" placeholder="Client Secret"  value="[beer-review-list]" />
                </div> 

                <div class="div-wrapper">
                    <div class="row-half text-center">
                            <h1>Import Review Data</h1>
                            <h3>
                                <?php 
                                $reviews = count(getReviewData());
                                if($reviews > 0){
                                    echo $reviews . " Reviews Found";
                                }else{
                                    echo "Nothing found - please check the API configurations";
                                }  
                            ?>
                            </h3>
                    </div>
                    <div class="row-half">
                        <form action="" class="form-submit" method="post">   
                            <input type="submit" name="submit-import" class="btsub" value="Import Untappd Reviews" />
                        </form>
                    </div>
                </div> 
            </div>      
        </div>    
</div>