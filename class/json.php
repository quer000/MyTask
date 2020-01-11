<?php
class json extends valid
{
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