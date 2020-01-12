<?php

/**
* funkcijos openXML kintamieji
* @param string $myFile = atsinesamas failo vardas, kuri ketinama atidaryti
* @param array $myData = surenkamas visas paruostas failo turinys i si masyva
* @param array $row = kiekviena eilute priskyriama siam masyvui su paruosiamais reikiamais array keys
* @param object $data = atidaromas xml failo turinys
*/

class xml extends valid
{
    //xml failo turinio atidarymas, sudejimas i masyva ir atidavimas piesimui lenteleje
    function openXML($myFile)
    {
        $myData = array();
        $row = array();
        $data = @simplexml_load_file("files/".$myFile);

        if ($data === false) {
            return false;
        }

        foreach ($data->item as $rows) {
            $row['first_name'] = $this->validation($rows->first_name);
            $row['age'] = $this->validation($rows->age);
            $row['gender'] = $this->gender($this->validation($rows->gender));
            array_push($myData, $row);
        }

        if (empty($myData)) {
            return false;
        }
        return $myData;
    }
}