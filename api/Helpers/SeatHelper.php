<?php

class SeatHelper
{
    public static function GetSeat(){
        $letters = array("A", "B", "C", "D", "E", "F");
        
        $letter = $letters[rand(0,5)];
        $number = rand(1,20);

        return $letter . $number;
    }
}