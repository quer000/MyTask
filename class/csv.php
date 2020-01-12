<?php

/**
* funkcijos openCSV kintamieji
* @param string $myFile = atsinesamas failo vardas, kuri ketinama atidaryti
* @param array $myData = surenkamas visas paruostas failo turinys i si masyva
* @param array $row = kiekviena eilute priskyriama siam masyvui su paruosiamais reikiamais array keys
* @param array $rows = naudojamas istraukti kiekvienos eilutes masyva
* @param bool $firstRow = patikrina ar failo turinyje traukiama pirmoji eilute, kuri yra nereikalinga
* $file = atidaromas csv failas
*/

class csv extends valid
{
    //csv failo turinio atidarymas, sudejimas i masyva ir atidavimas piesimui lenteleje
    function openCSV($myFile)
    {
        $myData = array();
        $row = array();
        $firstRow = true;
        $file = fopen("files/".$myFile, "r");

        while (($rows = fgetcsv($file)) !== FALSE) {
            if ($firstRow) {
                if ($this->validation($rows[0]) == "first_name" && $this->validation($rows[1]) == "age"
                    && $this->validation($rows[2]) == "gender") {
                    $firstRow = false;
                } else {
                    return false;
                }
            } else {
                $row['first_name'] = $this->validation($rows[0]);
                $row['age'] = $this->validation($rows[1]);
                $row['gender'] = $this->gender($this->validation($rows[2]));
                array_push($myData, $row);
            }
        }

        fclose($file);

        if (empty($myData)) {
            return false;
        }
        return $myData;
    }
}