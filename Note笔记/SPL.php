<?php
$dir = new DirectoryIterator(dirname("./a.txt"));
foreach ($dir as $fileinfo){
	if(!$fileinfo->isDir()){
		echo $fileinfo->getFilename(),"\t",$fileinfo->getSize(),PHP_EOL,"\n\t";
	}
}
?>