 <?php
  header("Access-Control-Allow-Origin: *");
	function clean($string)
	{
		$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
		return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$userId = $_POST["userId"];
		$domain = clean($_POST["domain"]);
		if (!file_exists('Samples/' . $userId . '/' . $domain)) {
			mkdir('Samples/' . $userId . '/' . $domain, 0777, true);
		}
		$filename = 'Samples/' . $userId . '/' . $domain . '/lastTime.txt';
		if (file_exists($filename)) {
			$handle = fopen($filename, "r");
			$content = fread($handle, filesize($filename));
			fclose($handle);
			echo $content;
		} else {
			echo 0;
		}
	}
?>