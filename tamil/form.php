<?php
function get_data($url) {
	$ch = curl_init();
$proxy="localhost:56789";
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
//	curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
//	curl_setopt($ch, CURLOPT_PROXY, $proxy);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_REFERER,$url);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
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
// echo $uu."\n";
//$uu="http://www.tamiljaffna.pw/2015/07/b-l-girl-drinks-full-b-l-ws-bottle-in.html";
//$uu="http://www.tamiljaffna.pw/2015/07/excellent-salesman.html";
//$uu="http://www.tamiljaffna.pw/2015/08/12-tnage-girl-tops-1df-soldier.html";
$datag=get_data($uu);
//echo $datag;
//echo $uu;
$daln=explode("\n",$datag);

foreach($daln as $lines)
{
//echo $lines;
$stp=stripos($lines,"www.youtube");
if($stp!=FALSE)
{
//echo $lines;
echo $stp;
$sq=stripos($lines,"?");
echo $sq;
echo $len=$sq-$stp;
$ss=substr($lines,$stp,$len);
$sss=str_replace("embed/","watch?v=",$ss);
echo "\nhttp://$sss\n";
header("Location: http://$sss");
}
}



//echo "\ndata";
//print_r($ar);


