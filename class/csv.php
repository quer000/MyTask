<?php
class csv extends valid
{

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