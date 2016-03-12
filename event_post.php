<?php

$file = "likes.txt";

$get = file_get_contents($file);

if( file_put_contents($file, ++$get) ){
	echo $get;
}

?>