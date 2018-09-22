<?php

namespace App\Lib\Helper; // Определение пространств имен Bar.php

class Bar
{
    const VERSION = '2.0';
    const DATE_APPROVED = '2018-01-01';
    
    final public static function foo()
    {
        return "тело метода foo";
    }
}
