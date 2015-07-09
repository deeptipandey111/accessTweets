<html>
<title>twitter,yo</title>
<head>
<script src="//cdnjs.cloudflare.com/ajax/libs/twemoji/1.3.2/twemoji.min.js"></script>
</head>
<body>
<?php
require_once('TwitterAPIExchange.php');
$settings = array(
    'oauth_access_token' => "3266870948-Ki8WUTtIgdhRcTP1GRS83TnjcDw97Vky94JL8a0",
    'oauth_access_token_secret' => "jYCTAXzD5HjKr4gfMRoUeIKnzB423iOX1OvOBJwRF5RXq",
    'consumer_key' => "b9UgnHoMooJDKGKp6CMGUBBVN",
    'consumer_secret' => "Znsqm821845jxiHCRD2o8lfacCCGET7meJxiEVHkCsfAYYzvjl"
);
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$requestMethod = 'GET';
$p1 = '?q=#';
//$p2 = $_POST["q"];
$p2 = 'food';//keep changing this $p2 to get tweets for different hashtags
$p3 = '&result_type=recent&geocode=12.966757,77.566720,15mi';
$getfield = $p1 . $p2 . $p3;
$twitter = new TwitterAPIExchange($settings);
$output = json_decode($twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest(), TRUE);
$string = $output["statuses"];
$echotext = "<table border='2'>"."<tr><td>Tweet ID</td><td>Tweet</td><td>Reply</td></tr>";
foreach($string as $items)
{
        $q1 = "<a href=https://twitter.com/statuses/";
        $q2 = " target='_blank'>Reply here</a>"."<br /><br />";
        $link = $q1 . $items["id"] .$q2;
        $id = $items["id"];
        $t = $items["text"];
        $echotext .= "<tr><td>" . $id . "</td><td>" . $t . "</td><td>" . $link . "</td></tr>"; 
        //echo "<tr><td>"+$id+"</td><td>"+$t+"</td><td>"+$link+"</td></tr>";
}
$echotext .= "</table>";
echo $echotext;
?>

</body>
</html>