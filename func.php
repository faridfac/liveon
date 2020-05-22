<?php
function reff($name, $phone, $email){
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://marketing-api.liveon.id/referral.php');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "name=$name&email=$email&phone=$phone&plan=&insta_plan=&provider=&refrr_code=OnESJ2gB&utm_source=&utm_medium=&utm_campaign=&utm_content=&utm_term=");
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

  $headers = array();
  $headers[] = 'Connection: keep-alive';
  $headers[] = 'Access-Control-Allow-Origin: *';
  $headers[] = 'Accept: */*';
  $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36';
  $headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
  $headers[] = 'Origin: https://www.liveon.id';
  $headers[] = 'Sec-Fetch-Site: same-site';
  $headers[] = 'Sec-Fetch-Mode: cors';
  $headers[] = 'Sec-Fetch-Dest: empty';
  $headers[] = 'Referer: https://www.liveon.id/vipaccess/';
  $headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $result = curl_exec($ch);
  return $result;
}

function get_mail($domain, $email){
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://generator.email/$domain/$email",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_HTTPHEADER => array(
      "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3",
      "accept-encoding: gzip, deflate, br",
      "upgrade-insecure-requests: 1",
      "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36",
      "cookie: _ga=GA1.2.659238676.1567004853; _gid=GA1.2.273162863.1569757277; embx=%5B%22$email%40$domain%22%2C%22hcycl%40nongzaa.tk%22%5D; _gat=1; io=io=tIcarRGNgwqgtn40OGr4; surl=$domain%2F$email",
      "Content-Type: text/plain"
    ),
  ));

  $result = curl_exec($curl);
  return $result;
}

function get_between($string, $start, $end){
   $string = " ".$string;
   $ini = strpos($string,$start);
   if ($ini == 0) return "";
   $ini += strlen($start);
   $len = strpos($string,$end,$ini) - $ini;
   return substr($string,$ini,$len);
}

function verify($linkreff){
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://marketing-api.liveon.id/$linkreff",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
  ));

  $response = curl_exec($curl);
  return $response;
}
function color($color = "default" , $text) {
  $arrayColor = array(
    'grey' 		=> '1;30',
    'red' 		=> '1;31',
    'green' 	=> '1;32',
    'yellow' 	=> '1;33',
    'blue' 		=> '1;34',
    'purple' 	=> '1;35',
    'nevy' 		=> '1;36',
    'white' 	=> '1;0',
  );
  return "\033[".$arrayColor[$color]."m".$text."\033[0m";
}
function nama(){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://ninjaname.horseridersupply.com/indonesian_name.php");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$ex = curl_exec($ch);
	// $rand = json_decode($rnd_get, true);
	preg_match_all('~(&bull; (.*?)<br/>&bull; )~', $ex, $name);
	return $name[2][mt_rand(0, 14) ];
}
?>
