<?php

namespace App\Model; // Определение пространств имен

class Foof
{
    const VERSION = '1.0';
    const DATE_APPROVED = '2018-05-01';
    
    public function showConstant()
    {
        echo  self::DATE_APPROVED . "\n";
    }
    final public static function bar()
    {
        // тело метода
        return "тело метода";
    }

}

$c = new \App\Model\Foof; 

// Если текущее пространство имен App\Model, то имена преобразуются в App\Model\Foof.
$a = new Foof;
var_dump(Foof::bar());
var_dump($a->bar());
var_dump(\App\Model\Foof::bar());

var_dump(Foof::DATE_APPROVED);
var_dump(\App\Model\Foof::DATE_APPROVED);

