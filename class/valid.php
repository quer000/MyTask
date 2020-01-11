<?php
class valid
{
    function validation($myVal)
    {
        return trim(strip_tags(stripslashes($myVal)));
    }

    function gender($gender)
    {
        switch (strtolower($gender)) {
            case "male":
                return "Vyras";
            case "female":
                return "Moteris";
            default:
                return "Nenustatyta";
        }
    }


}