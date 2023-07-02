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

$reviews = getData();

?>
<div class="container">
        <div class="div-wrapper">
            <div class="row">
                <div class="div-wrapper">
                    <h3>API Configuration</h3>
                    <?php echo $message; ?>   
                    <form action="" class="form-submit" method="post">   
                        <input type="text" name="clientid" placeholder="Client ID" value="<?php echo get_option("clientid") ?>" />
                        <input type="text" name="clientsecret" placeholder="Client Secret"  value="<?php echo  get_option("clientsecret"); ?>" />
                        <input type="text" name="reviewuserid" placeholder="User ID"  value="<?php echo  get_option("reviewuserid"); ?>" />
                        <input type="text" name="reviewlimit" placeholder="Limit"  value="<?php echo  get_option("reviewlimit"); ?>" />
                        <input type="submit" name="submit" class="btsub" value="Save" />
                    </form>
                </div> 

                <div class="div-wrapper">
                    <h3>Shortcode</h3>
                    <input type="text" name="clientsecret" id="inputfield" placeholder="Client Secret"  value="['beer-review']" />
                </div> 

                <div class="div-wrapper">
                    <h3><?php echo count($reviews) - 1; ?> reviews found </h3>
                </div> 
            </div>      
        </div>    
</div>