<?php
	 function clean($string) {
	   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

	   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$userId = $_POST["userId"];
		$domain = clean($_POST["domain"]);
		if (file_exists('Samples/'.$userId.'/'.$domain))
		{
            echo "ANALYSIS SCHEDULED";
            //chamar analisador para gerar CSV
            exec("C:\xampp\htdocs\t2uxt\adapter\analysis.exe ".$userId."/".$domain);
            //analisador chamará algoritmo em python para analisar csv gerado
		}
	}
 ?>