<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
<script src="jquery-1.9.1.min.js"></script>
<script src="jquery.devrama.lazyload.min-0.9.3.js"></script>
<script type="text/javascript">      
    $(function(){
        $.DrLazyload();
    });
     
</script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>  
<?php
//require 'db.php';
require 'instagram.class.php';
require 'instagram.config.php';
echo "<div>";
echo "<a href=\"\instagram\instagram\index.php\">Logout</a>";
echo "</div> <br><br>"  ;  
// Receive OAuth code parameter
$code = $_GET['code'];

// Check whether the user has granted access
if (true === isset($code)) {
    
  // Receive OAuth token object
  $data = $instagram->getOAuthToken($code);
  // Take a look at the API response
  if(empty($data->user->username))
    {
    header('Location: index.php');

    }
    else
    {
        session_start();
	$_SESSION['userdetails']=$data;
	$user=$data->user->username;
	$fullname=$data->user->full_name;
	$bio=$data->user->bio;
	$website=$data->user->website;
	$id=$data->user->id;
	$token=$data->access_token;
             
    $url="https://api.instagram.com/v1/users/$id/media/recent/?access_token=$token";
      
    $ch= curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json')); 
      
        
        
    $response=curl_exec($ch);
    
	$jsjs = json_decode($response);
        
    foreach($jsjs->data as $item){
        $images=$item->images->standard_resolution->url;
        echo "<img data-size=\"1024:588\" data-lazy-src=".$images."></img>";
    }
    
    

 }
}
else {
    echo "Code not found";
}

?>
    </body>
</html>
