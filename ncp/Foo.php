<?php
// Пример синтаксиса, использующего пространство имен
// Имя пространства может быть определено с подуровнями: 
namespace App\Model; // Определение пространств имен

/*
   Названия пространств имен PHP и php,
   и составные названия (PHP\Classes),
   являются зарезервированными и их не следует использовать
   в пользовательском коде.
*/
class Foo
{
    const VERSION = '1.0';
    const DATE_APPROVED = '2018-05-01';
    
    public function showConstant()
    {
        echo  self::DATE_APPROVED . "\n";
    }
}

function myfunction()
{
    return "Hello There";
}
const MYCONST = 1;


$a = new Foo();

var_dump($a);

var_dump($a->showConstant());

var_dump(Foo::DATE_APPROVED);

$c = new \App\Model\Foo; //  Глобальная область видимости

var_dump($c);

$d = namespace\MYCONST;      // константа __NAMESPACE__
var_dump($d);

