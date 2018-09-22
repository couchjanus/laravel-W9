<?php
// Оператор namespace, внутри пространства имен
namespace MyProject;

class Cname
{
  public static function method()
  {
    echo "Cname::method... It's me in namespce MyProject";
  }
}

function func()
{
    echo "func... It's me in namespce MyProject";
}

namespace\func(); // вызывает функцию MyProject\func()

namespace\Cname::method(); // вызывает статический метод  класса MyProject\cname

$a = new namespace\Cname(); // Создает экземпляр класса MyProject\Cname

