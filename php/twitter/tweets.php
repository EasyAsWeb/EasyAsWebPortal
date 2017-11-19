<?php
session_start();

if( isset( $_GET['username'] ) AND $_GET['username'] != '' ):

    require_once('oauth/twitteroauth.php'); //Path to twitteroauth library

    $username = $_GET['username'];
    $limit = ( isset( $_GET['count'] ) AND $_GET['count'] != '' ) ? $_GET['count'] : 2;
    $consumerkey = "sBKbkDzCfYQvG9NSECVsC6xJd";
    $consumersecret = "G1fbg4wKzZWaKlKbm87GXYI27SnLVLka2raOAFFEqEilleOarx";
    $accesstoken = "42361199-y636cQ7FHfCa6wEErm0YXQ396KAIMOfOCiUv4ihaH";
    $accesstokensecret = "zdaVYo3p5cZOdIgrZUxeyyHJ8v3rVNy979XJripipKJqq";

    function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
      $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
      return $connection;
    }

    $connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
    $twitter_feed = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$username."&count=".$limit);
    echo json_encode($twitter_feed);

endif;

?>