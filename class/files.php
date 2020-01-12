<?php

/**
* funkcijos list kintamieji
* @param array $files = pasiimamas failu sarasas is nurodytos direktorijos
* @param string $ext = pasiimamas tik failo pletinys
* @param array $filesList = sudedamas failu sarasas, kuris atitinka foreach cikle aprasytas salygas
*
* funkcijos findExt kintamieji
* @param string $myFile = atsinesamas failo pavadinimas, kuris yra patikrinamas
* @param array $fileInfo = surenkama detali failo informacija failo pletinio patikrai nukreipti failo turinio atidarymui
*/

class files extends valid
{
    //traukiamas failu sarasas tik tie failai, kurie yra xml, json arba csv formalo
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

    //failo pletinio patikra
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