<?php
namespace App\Http\Controllers\BaseHelpers;

class TextHelpers
{

  /* GENERATE RANDOM TEXT TO FILL CARDS */
private static function digitCorrector($start, $last) { return rand($start, $last);}
public static function generateRandomString($length = 100) {  
 $characters = "eatoinhsrdlwmguycfpbkvxjzq"; $vowels = "eaoiuy"; $consonants = "tinhsrdlwmgcfpbkvxjzq";            $capchars = 'EATOINHSRDLWMGUYCFPBKVXJZQ';
 $gaps = [" ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", ", ", ", ", ", ", ", ", ", ", ", ", ", ", " - ", "'", ": ", "; ", " — " ];
 $capitalgaps = [".", ".", ".", ".",".", ".",".", ".", ".", ".", ".", "?", "!", "!?", "..." ];
 $charactersLength = strlen($characters); $capcharsLength = strlen($capchars); $randomString = ''; $boycounter = 0; $lettrcounter = 0; $entercounter = 0; $lactCapafter = ''; $lastCharAfter = ''; $VC_POSITION = 0; $startcounter = 0;
 for ($i = 0; $i < $length; $i++) {
     if ($boycounter == 0) { $worcounts = rand(19, 73);}
     if ($entercounter == 0) {  $entercounts = rand(3, 13);}
     for ($w = 0; $w< rand(1, 12); $w++ ) {
         if ((($boycounter == 1) && ($lettrcounter == 0)) || !$startcounter ) {
           $startcounter++;
         $randomString .= $capchars[rand(0, self::digitCorrector( 0, $capcharsLength - 1))];
         $lettrcounter++;} else {  if ($VC_POSITION == 0){
                   $characters = $vowels;
                   $charactersLength = strlen($vowels);
                   $VC_POSITION = 1;
                  } else {
                   $characters = $consonants;
                   $charactersLength = strlen($consonants);
                   $VC_POSITION = 0;};
             $lastcharBefore = $characters[rand(0, self::digitCorrector( 0, $charactersLength - 1))];
           if ($lastcharBefore != $lastCharAfter){
               $randomString .= $lastcharBefore;
               $lastCharAfter = $lastcharBefore;
           } else { $randomString .= $characters[rand(0, self::digitCorrector( 0, $charactersLength - 1))]; }
           $lettrcounter++;}}
     if ($boycounter == $worcounts) {
         $capitalpoint = $capitalgaps[(rand(0, count($capitalgaps) - 1))];
         $randomString = $randomString . $capitalpoint . '<br>';
         $boycounter = 0; $lettrcounter = 0; $entercounter++;
         if ($entercounter == $entercounts) {
             $randomString = $randomString . '<br>';
             $entercounter = 0; }
     } else {
       $gap = $gaps[(rand(0, count($gaps) - 1))];
       $randomString = $randomString . $gap; }
     $boycounter++; }
 return trim($randomString);}
/* GENERATE RANDOM TEXT TO FILL CARDS */


public static function GetLastLetterByCountRu($count)
{
    $word = "";
    if ($count == 0 || $count % 10 == 0){ $word = "" ;};
    if ($count == 1 || $count % 10 == 1){ $word = "а";};
    if ($count == 2 || $count % 10 == 2){ $word = "и";};
    if ($count == 3 || $count % 10 == 3){ $word = "и";};
    if ($count == 4 || $count % 10 == 4){ $word = "и";};
    if ($count == 5 || $count % 10 == 5){ $word = "" ;};
    if ($count == 6 || $count % 10 == 6){ $word = "" ;};
    if ($count == 7 || $count % 10 == 7){ $word = "" ;};
    if ($count == 8 || $count % 10 == 8){ $word = "" ;};
    if ($count == 9 || $count % 10 == 9){ $word = "" ;};
    if ($count % 100 == 11 || $count % 100 == 12 || $count % 100 == 13 || $count % 100 == 14 || $count % 100 == 15){ $word = "" ;};
    if ($count % 100 == 16 || $count % 100 == 17 || $count % 100 == 18 || $count % 100 == 19){ $word = "" ;};
    return $word;
}
public static function GetLastLetterByCountRuEy($count)
{
    $word = "";
    if ($count == 0 || $count % 10 == 0){ $word = "ей" ;};
    if ($count == 1 || $count % 10 == 1){ $word = "ь";};
    if ($count == 2 || $count % 10 == 2){ $word = "и";};
    if ($count == 3 || $count % 10 == 3){ $word = "и";};
    if ($count == 4 || $count % 10 == 4){ $word = "и";};
    if ($count == 5 || $count % 10 == 5){ $word = "ей" ;};
    if ($count == 6 || $count % 10 == 6){ $word = "ей" ;};
    if ($count == 7 || $count % 10 == 7){ $word = "ей" ;};
    if ($count == 8 || $count % 10 == 8){ $word = "ей" ;};
    if ($count == 9 || $count % 10 == 9){ $word = "ей" ;};


    return $word;
}


public static function TimeToYearMonth($time)
{
    $result = "";
    $ex = explode("-", $time);
    $month = "";
    $year = "";
    if (count($ex) > 0){
        $year = $ex[0];
        $result = $year;
    }
    if (count($ex)> 1){
        $m = $ex[1];
        if ($m == 1){ $month = "Январь";};
        if ($m == 2){ $month = "Февраль";};
        if ($m == 3){ $month = "Март";};
        if ($m == 4){ $month = "Апрель";};
        if ($m == 5){ $month = "Май";};
        if ($m == 6){ $month = "Июнь";};
        if ($m == 7){ $month = "Июль";};
        if ($m == 8){ $month = "Август";};
        if ($m == 9){ $month = "Сентябрь";};
        if ($m == 10){ $month = "Октябрь";};
        if ($m == 11){ $month = "Ноябрь";};
        if ($m == 12){ $month = "Декабрь";};
        $result = $month . " " . $year;
    }
    return $result;
}


}