<?php

echo "<p>Olá Mundoww</p>";

rasmname();


function get_filelist_as_array($dir, $recursive = true, $basedir = '', $include_dirs = false) {
    if ($dir == '') {return array();} else {$results = array(); $subresults = array();}
    if (!is_dir($dir)) {$dir = dirname($dir);} // so a files path can be sent
    if ($basedir == '') {$basedir = realpath($dir).DIRECTORY_SEPARATOR;}

    $files = scandir($dir);
    foreach ($files as $key => $value){
        if ( ($value != '.') && ($value != '..') ) {
            $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
            if (is_dir($path)) {
                // optionally include directories in file list
                if ($include_dirs) {$subresults[] = str_replace($basedir, '', $path);}
                // optionally get file list for all subdirectories
                if ($recursive) {
                    $subdirresults = get_filelist_as_array($path, $recursive, $basedir, $include_dirs);
                    $results = array_merge($results, $subdirresults);
                }
            } else {
                // strip basedir and add to subarray to separate file list
                $subresults[] = str_replace($basedir, '', $path);
            }
        }
    }
    // merge the subarray to give the list of files then subdirectory files
    if (count($subresults) > 0) {$results = array_merge($subresults, $results);}
    return $results;
}
function getDirContents($dir, $filter = '', &$results = array()) {
    $files = scandir($dir);

    foreach($files as $key => $value){
        $path = realpath($dir.DIRECTORY_SEPARATOR.$value); 

        if(!is_dir($path)) {
            if(empty($filter) || preg_match($filter, $path)) $results[] = $path;
        } elseif($value != "." && $value != "..") {
            getDirContents($path, $filter, $results);
        }
    }

    return $results;
}
function rasmname(){

	$directory = "samples";

    $files_dirs = iterator_to_array( new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory),RecursiveIteratorIterator::SELF_FIRST) );

	echo '<html><body><pre>';
	// create a new associative multi-dimensional array with dirs as keys and their files
	$dirs_files = array();
	foreach($files_dirs as $dir){

		if(is_dir($dir)){
			$d = preg_replace('/\/\.$/','',$dir);
			$dirs_files[$d] = array();
			
			foreach($files_dirs as $file){				
				if(is_file($file) AND $d == dirname($file)){
					$f = basename($file);
					$dirs_files[$d][] = $f;
					print_r($file);
				}
			}
		}
	}

	// sort dirs
	ksort($dirs_files);

	foreach($dirs_files as $dir => $files){
		$c = substr_count($dir,'/');
		//echo  str_pad(' ',$c,' ', STR_PAD_LEFT)."$dir\n";
		// sort files
		//asort($files);
		foreach($files as $file){
			echo($c)
			//echo str_pad(' ',$c,' ', STR_PAD_LEFT)."|_$file\n";
		}
	}
	echo '</pre></body></html>';

  }
 ?>
