<?php 
/*
		GabAPI-OAuthPHP Class written by Michael Carcara <michael.carcara@gmail.com>
		
		This PHP Class is to authorize users to login with Gab.com via GabAPI
		Set the class settins to your Gab.com App settings: Redirect URI, ClientID, Client Secret
		
		If you find this code useful please follow me on Gab and share the GitHub Url tagging me!
		
		I want to be able to keep track of all the developers that this source code helped. :)
		
*/ 

/// Create session for storing Gab.com API access token 
session_start(); 

/// GabAPI-OAuthPHP Class using Gab.com API 
class GabAPI-OAuthPHP { 
// Must be exact match to Gab.com App Request URI
   var $RedirectURI = '{PATH TO FILE}?callback';
   /*
    NOTE: This must be an exact match!
   */
   
// Gab.com App Client ID
   var $ClientID = '{YOUR APP CLIENT ID}';
   
// Gab.com App Client Secret
   var $ClientSecret = '{YOUR APP CLIENT SECRET}';
   
/* Prepare Gab.com API AppScope Options
 
	read: Read access to your profile and feeds
	engage-user: Follow or mute users
	engage-post: Vote, repost, quote or report posts
	write-post: Send new posts
	notifications: Access notification */

 var $AppScope = array('read', 'engage-user', 'engage-post', 'notifications', 'write-post'); 

/// Send user to Gab.com API Authorization page
 function authorizeUrl(){
  $authorizeAPI = "https://api.gab.com/oauth/authorize?client_id=%s&redirect_uri=%s&scope=%s&response_type=code";
  return header(sprintf("Location: ".$authorizeAPI, $this->ClientID,urlencode($this->RedirectURI),implode("%20", $this->AppScope)));
}

/// Send Gab.com API access code back to Gab for the access token 
function getAccessToken($code){
  $curl = curl_init("https://api.gab.com/oauth/token");
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, rawurldecode(http_build_query(array(
        'client_id' => $this->ClientID,
        'redirect_uri' => $this->RedirectURI,
        'client_secret' => $this->ClientSecret,
        'code' => $code,
        'grant_type' => 'authorization_code'
  ))));
  $json = json_decode(curl_exec($curl));
  return $json->access_token;
}
}

/// Execute GabAPI/OAuthPHP Class 
$gab = new GabAPI-OAuthPHP; 

/// Gab.com API access token expired so refresh GabAPI/OAuthPHP Class 
if(isset($_GET['reset'])){
  session_destroy();
    header(sprintf("Location: %s", $gab->RedirectURI)); die();
}

/// User has granted GabAPI-OAuthPHP Class login access 
if(isset($_GET['callback'])){ 

/// Execute GabAPI/OAuthPHP Class 
$gab = new GabAPI-OAuthPHP; 

/// Strip the Gab.com API access code from url and get access token 
$strip_uri = explode("&code=", $_SERVER['REQUEST_URI']); $code = $strip_uri[1];
    
/*
 
This following PHP code using cURL is provided by Gab.com API developer documentation for other usage goto https://developers.gab.com
!!!Play with this code at your own risk!!!

*/
 
/// Send Gab.com API request for logged in user details 
$curl = curl_init(); curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.gab.com/v1.0/me/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer ".$gab->getAccessToken($code)
  ), )); 

/// Set response from Gab.com API 
$response = curl_exec($curl); 

/// Set error from Gab.com API 
$err = curl_error($curl); curl_close($curl); 

/// If something went wrong then show error 
if ($err) {
  echo("GabAPI/OAuthPHP Class Error #: ".$err." !"); // Gab.com API Error Response
  
} else {
/* 

This will only pull the JSON data; !!!! 
Choose what to do with this own your own. !!! 
*/

 echo $response; // Gab.com API JSON Response
}

/// Gab.com API sent GabAPI/OAuthPHP Class an access code
}else{

/// Execute GabAPI/OAuthPHP Class 
$gab = new GabAPI_OAuthPHP; 

/// Send user to login Gab.com with GabAPI/OAuthPHP Class 
$gab->authorizeURL();
    
}
?> 
