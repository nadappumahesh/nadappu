<?php
function get_data($url) {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_REFERER,"$url");
	//curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0); 
	curl_setopt($ch, CURLOPT_TIMEOUT, 400);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$uu = test_input($_POST["url"]);
$size=$_POST["size"];

 echo $uu."\n";
$uu="http://www.slideshare.net/AmazonWebServices/aws-june-webinar-series-deep-dive-protecting-your-data-with-aws-encryption-49480249";
#size="data-normal";
$datag=get_data($uu);
//echo $datag;
$daln=explode("\n",$datag);
echo $size;
//print_r($daln);
echo "<title> $uu </title>";
foreach($daln as $lines)
{
if(false!=strpos($lines,$size))
{

$lines=str_replace($size,"src",$lines);
echo "<img $lines >\n <hr>\n";
}
}



//echo "\ndata";
//print_r($ar);


