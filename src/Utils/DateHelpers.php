<?php

namespace App\Utils;

use DateTime;
use DateTimeZone;

class DateHelpers{
    public function validateDate(string $format, string $date){
        switch($format){
            case $format==="yyyy-m-d":
                $validation= preg_match('/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/',$date);
                return ["error"=>false,"validate"=>$validation];
            default:
                return ["error"=>true,"errorMessage"=>"Unsupported date format"];
        }
    }


    public function parseDateFromString(string $format, string $date="today", string $timeZone="Africa/Nairobi"){
        switch ($format){
            case $format==="iso8601":
                $returnDate=DateTime::createFromFormat('Y-m-d\TH:i:s.u\Z', $date);
                break;
            case $format==="today":
                $returnDate = new DateTime();
                break;
            case $format==="Y-m-d":
                $returnDate=DateTime::createFromFormat('Y-m-d', $date);
                break;
            case $format==="H:i:s":
                $returnDate=DateTime::createFromFormat('H:i:s', $date);
                break;
            default:
                return ["error"=>true,"errorMessage"=>""];

        }
        if(!$returnDate){
            return ["error"=>true,"errorMessage"=>"error while converting provided date string"];
        }
        if($timeZone){
            $timeZone = new DateTimeZone($timeZone);
            $returnDate->setTimezone($timeZone);
        }
        return ["error"=>false, "date"=>$returnDate];
    }
}
