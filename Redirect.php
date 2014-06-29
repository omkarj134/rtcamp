<?php

session_start();
require('twitteroauth/twitteroauth.php');
require('config.php');

$connection = new TwitterOauth(CONSUMER_KEY,CONSUMER_SECRET);

$request_token=$connection->getRequestToken(OAUTH_CALLBACK);

$_SESSION['oauth_token']=$token=$request_token['oauth_taken'];

$_SESSION['oauth_taken_secret']=$request_token['oauth_token_secret'];

switch($connection->http_code){
        case 200: $url=$connection->getAuthorizeURL($token);
		          header('Location:'.$url);
				  break;
		default: echo "Oops ! Wrong HTTP code".$connection->http_code;		  
		
		}
		
?>		
