<?php

/**
* funkcijos openJSON kintamieji
* @param string $myFile = atsinesamas failo vardas, kuri ketinama atidaryti
* @param array $myData = surenkamas visas paruostas failo turinys i si masyva
* @param array $row = kiekviena eilute priskyriama siam masyvui su paruosiamais reikiamais array keys
* @param string $data = atidaromas json failo turinys
* @param array $items = konvertuojamas gauta teksta i masyva
*/

class json extends valid
{
    //json failo turinio atidarymas, sudejimas i masyva ir atidavimas piesimui lenteleje
    function openJSON($myFile)
    {
        $myData = array();
        $row = array();
        $data = file_get_contents("files/".$myFile);
        $items = json_decode($data, true);
        
        if ($items === null) {
            return false;
        }
        
        foreach ($items as $rows) {
            $row['first_name'] = $this->validation($rows['first_name']);
            $row['age'] = $this->validation($rows['age']);
            $row['gender'] = $this->gender($this->validation($rows['gender']));
            array_push($myData, $row);
        }

        if (empty($myData)) {
            return false;
        }
        return $myData;
    }
}