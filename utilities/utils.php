<?php
// add_action('wp_ajax_send_form', 'send_form'); 
// add_action('wp_ajax_nopriv_send_form', 'send_form');

// add_action( 'wp_ajax_my_action', 'my_action' );
// add_action( 'wp_ajax_nopriv_my_action', 'my_action' );

// function send_form(){
//     echo 'Done!';
//     wp_die();
// }

function saveApiSettings($config){
    update_option('clientid', $config["clientid"]);  
    update_option('clientsecret', $config["clientsecret"]); 
    update_option('reviewuserid', $config["reviewuserid"]);  
    update_option('reviewlimit', $config["reviewlimit"]);  
}
?>