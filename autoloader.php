<?php
//loudinam visas klases
spl_autoload_register(function($className)
{
	$file = "class/".$className . '.php';
	if (file_exists($file)) {
		include $file;
	}
});
?>