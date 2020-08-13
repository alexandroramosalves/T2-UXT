<?php
 	 function clean($string) {
	   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

	   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$metadata = json_decode($_POST['metadata']);
		$data = json_decode($_POST['data']);
		$Sample = clean($metadata->sample);
		if(!file_exists("Samples")){
			mkdir("Samples");
		}else{
			if(!file_exists('Samples/'.$Sample)){
				mkdir('Samples/'.$Sample);
			}else{
				if(!file_exists('Samples/'.$metadata->userId.'/'.$Sample)){
					mkdir('Samples/'.$metadata->userId.'/'.$Sample);
				}
			}
		}

			$txt = "<rawtrace type=\"".$metadata->type."\" time=\"".$metadata->time."\" Class=\"".$data->Class."\" Id=\"".$data->Id."\" MouseClass=\"".$data->mouseClass."\" MouseId=\"".$data->mouseId."\" X=\"".$data->X."\" Y=\"".$data->Y."\" keys=\"".$data->Typed."\" scroll=\"".$metadata->scroll."\" height=\"".$metadata->height."\" url=\"".$metadata->url."\" />";
			file_put_contents('Samples/'.$metadata->userId.'/'.$Sample.'/trace.xml', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
			$handle = fopen('Samples/'.$metadata->userId.'/'.$Sample.'/lastTime.txt',"w");
			$content = fwrite($handle,$metadata->time);
			fclose($handle);
		
		echo "received ";
	}
