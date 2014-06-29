<?php

session_start();
require('twitteroauth/twitteroauth.php');
require('config.php');


if(empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret']))
{
     header('Location: clearsession.php');
}
$access_token=$_SESSION['access_token'];
$connection=new TwitterOauth(CONSUMER_KEY,CONSUMER_SECRET, $access_token['oauth_token'],$access_token['oauth_token_secret']);
$content=$connection->get('account/verify_credentials');
echo "<pre>",print_r($content, true), "</pre>";

?>
