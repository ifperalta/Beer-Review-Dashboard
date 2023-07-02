<?php
function saveApiSettings($config){
    update_option('clientid', $config["clientid"]);  
    update_option('clientsecret', $config["clientsecret"]); 
    update_option('reviewuserid', $config["reviewuserid"]);  
    update_option('reviewlimit', $config["reviewlimit"]);  
}
?>