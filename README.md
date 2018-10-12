# GabAPI-OAuthPHP-class
Gab.com API OAuth PHP class for app authorization 
# Gab.com API | OAuth/PHP Class
GabAPI/OAuthPHP Class written by Michael Carcara <michael.carcara@gmail.com>
This PHP Class is to authorize users to login with Gab.com via GabAPI
Set the class settings to your Gab.com App settings: Redirect URI, ClientID, Client Secret
If you find this code useful please follow me on Gab and share the GitHub Url tagging me!
I want to be able to keep track of all the developers that this source code helped. :)
## License
This project is licensed under the GNU License - see the 
[LICENSE.md](LICENSE.md) file for details
## Acknowledgments
* Gab.com Developers API
## Getting Started
Simply upload the gab.php file to your HTTP/HTTPS server and 
configure the define() variables to your Gab.com App settings
### Prerequisites
``` Gab.com PRO account and understanding of PHP scripting ```
### Gab.com API Examples
Complete Documentation : https://developers.gab.com
#### User Details Example
``` $curl = curl_init(); curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.gab.com/v1.0/me/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer ACCESS_TOKEN"
  ), )); $response = curl_exec($curl); $err = curl_error($curl); 
curl_close($curl); if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
```
#### Post Example
``` $curl = curl_init(); curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.gab.com/v1.0/posts",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => 
"------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: 
form-data; name=\"body\"\r\n\r\nSample post with multiple media 
attachments\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: 
form-data; 
name=\"media_attachments[]\"\r\n\r\nsample-media-attachment-id-1\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: 
form-data; 
name=\"media_attachments[]\"\r\n\r\nsample-media-attachment-id-2\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: 
form-data; 
name=\"reply_to\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: 
form-data; 
name=\"is_quote\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: 
form-data; 
name=\"nsfw\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: 
form-data; 
name=\"premium_min_tier\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: 
form-data; 
name=\"group\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: 
form-data; 
name=\"topic\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: 
form-data; 
name=\"poll\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: 
form-data; 
name=\"poll_option_1\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: 
form-data; 
name=\"poll_option_2\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: 
form-data; 
name=\"poll_option_3\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: 
form-data; 
name=\"poll_option_4\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer ACCESS_TOKEN",
    "content-type: multipart/form-data; 
boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
  ), )); $response = curl_exec($curl); $err = curl_error($curl); 
curl_close($curl); if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
```
#### Feed Example
``` $curl = curl_init(); curl_setopt_array($curl, array(
  CURLOPT_URL => 
"https://api.gab.com/v1.0/feed/?before=2018-10-03T19:35:47+00:00",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer ACCESS_TOKEN"
  ), )); $response = curl_exec($curl); $err = curl_error($curl); 
curl_close($curl); if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
```
#### Popular Users Example
``` $curl = curl_init(); curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.gab.com/v1.0/popular/users/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer ACCESS_TOKEN"
  ), )); $response = curl_exec($curl); $err = curl_error($curl); 
curl_close($curl); if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
```
