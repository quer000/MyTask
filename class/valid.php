<?php

/**
* funkcijos validation kintamieji
* @param string $myVal = atsinesama kintamojo reiksme isvalymui nuo nereikalingu tarpu, html tagu bei slashu
*
* funkcijos gender kintamieji
* @param string $gender = atsinesamas originalus lyties pavadinimas is failo turinio
*/

class valid
{   
    //funkcija skirta duomenu validacijai. per sia funkcija pereina post reiksme ir failu turinys
    function validation($myVal)
    {
        return trim(strip_tags(stripslashes($myVal)));
    }

    //lyties translate i lt
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