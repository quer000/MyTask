<?php
class xml extends valid
{
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