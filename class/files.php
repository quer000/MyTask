<?php

class files extends valid
{

    function list()
    {
        if (!is_dir('files')) {
            return false;
        }

        $files = scandir("files/");

        foreach ($files as $file) {
            $ext = substr($file, strrpos($file, ".") + 1);
            
            if (in_array($ext, array("xml","json","csv")) && !empty($ext)) {
                $filesList[] = $file;
            }
        }
        return $filesList;
    }

    function findExt($myFile)
    {
        if (empty($myFile)) {
            return false;
        }

        $fileInfo = pathinfo("files/".$myFile);
        
        switch (strtolower($fileInfo['extension'])) {
            case "csv":
                return "csv";
            case "xml":
                return "xml";
            case "json":
                return "json";
            default:
                return false;
        }
    }








}
?>