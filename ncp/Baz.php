<?php

namespace App\Lib; // Определение пространств имен Baz.php

include 'Bar.php';

class Baz
{
    const VERSION = '1.0';
    const DATE_APPROVED = '2017-06-01';

    final public static function bar()
    {
        return "тело метода bar";
    }
}


// определяется как класс App\Lib\Baz с методом bar
echo "\nопределяется как класс App\Lib\Baz с методом bar\n";
echo Baz::bar(); 
// тело метода bar

// определяется как константа App\Lib\Baz\VERSION
echo "\nопределяется как константа App\Lib\Baz\VERSION\n";
echo Baz::VERSION; 
// 1.0


// класс App\Lib\Helper\Bar c методом foo
echo "\nопределяется как класс App\Lib\Helper\Bar c методом foo\n";
echo Helper\Bar::foo(); 
// тело метода foo

// константа App\Lib\Helper\Bar\DATE_APPROVED
echo "\nопределяется как константа App\Lib\Helper\Bar\DATE_APPROVED\n";
echo Helper\Bar::DATE_APPROVED; 

// 2018-01-01


echo '"', __NAMESPACE__, '"'; // выводит "App\Lib"