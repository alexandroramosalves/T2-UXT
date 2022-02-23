<?php
    function getDirContents($dir, &$results = array()) {
        $files = scandir($dir);
    
        foreach ($files as $key => $value) {
            $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
            if (!is_dir($path)) {
                $results[] = $path;
            } else if ($value != "." && $value != "..") {
                getDirContents($path, $results);
                $results[] = $path;
            }
        }
    
        return $results;
    }

    function getDirContents01($dir){
        $results = array();
        $files = scandir($dir);

            foreach($files as $key => $value){
                if(!is_dir($dir. DIRECTORY_SEPARATOR .$value)){
                    $results[] = $value;
                } else if(is_dir($dir. DIRECTORY_SEPARATOR .$value)) {
                    $results[] = $value;
                    getDirContents($dir. DIRECTORY_SEPARATOR .$value);
                }
            }
    }

    $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('samples'));

$files = array(); 

foreach ($rii as $file) {

    if ($file->isDir()){ 
        continue;
    }

    $files[] = $file->getPathname(); 

}

function listFolderFiles($dir){
    $ffs = scandir($dir);

    unset($ffs[array_search('.', $ffs, true)]);
    unset($ffs[array_search('..', $ffs, true)]);

    // prevent empty ordered elements
    if (count($ffs) < 1)
        return;

    echo '<ol>';
    foreach($ffs as $ff){
        echo '<li>'.$ff;
        if(is_dir($dir.'/'.$ff)) listFolderFiles($dir.'/'.$ff);
        echo '</li>';
    }
    echo '</ol>';
}

function listar(){
    $root = $_SERVER['DOCUMENT_ROOT'];
    $search = "trace.xml";
    $found_files = glob("$root/*/trace.xml");
    $downloadlink = str_replace("$root/", "", $found_files[0]);
    if (!empty($downloadlink)) {
        echo "<a href=\"https://t2uxtweb.azurewebsites.net/$downloadlink\">$search</a>";
    } 
}


 $dir_iterator = new RecursiveDirectoryIterator("./samples");
 $iterator = new RecursiveIteratorIterator($dir_iterator, RecursiveIteratorIterator::SELF_FIRST);
 
foreach(new LimitIterator(new SortedFileIterator($iterator, "xml"), 0, 10) as $fileinfo) {
    echo "<a href=\"https://t2uxtweb.azurewebsites.net/$fileinfo\">$fileinfo</a>".": "." B; modified " . date("Y-m-d H:i:s", $fileinfo->getMTime())."<br/>";
}


 class SortedFileIterator extends SplHeap {
    public function __construct(Iterator $iterator, $ext) {
        foreach($iterator as $item) {
            if ($item->isFile() && $item->getExtension() == $ext) {
                $this->insert($item);
            }
        }
    }
    public function compare($b, $a) {
        return $a->getMTime() == $b->getMTime() ? 0 : ($a->getMTime() > $b->getMTime() ? 1 : - 1);
    }
}


?>    