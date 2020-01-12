<!DOCTYPE html>
<html>
    <head>
        <title>Failai</title>
        <script src="js/script.js"></script>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <?php
        //klasiu autoloaderis
        require_once "autoloader.php";
        $files = new files();
        $xml = new xml();
        $csv = new csv();
        $json = new json();
        //traukiamas failu sarasas 
        $filesList = $files->list();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['showContent'])) {
            //reiksmes siuntimas per validacijas
            $myFile = $files->validation($_POST['showContent']);
            //failo pletinio patikra
            $checked = $files->findExt($myFile);

            //pasirenkamas budas failo turiniui atverti
            if ($checked != false) {
                switch (strtolower($checked)) {
                    case "csv":
                        $load = $csv->openCSV($myFile);
                        break;
                    case "xml":
                        $load = $xml->openXML($myFile);
                        break;
                    case "json":
                        $load = $json->openJSON($myFile);
                        break;
                    default:
                        $load = false;
                }
            } else {
                $load = false;
            }

            if ($load === false && !empty($myFile)) {
                $error = "Nepavyko atverti failo ".$myFile;
            } else {
                $error = "";
            }
        } else {
            $myFile = "";
            $load = false;
            if ($filesList != false) {
                $error = "";
            } else {
                $error = "Direktorija pervadinta arba pašalinta";
            }
        }
    ?>
</head>