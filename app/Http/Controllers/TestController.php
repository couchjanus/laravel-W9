<?php

namespace App\Http\Controllers;

use Debugbar;
use Exception;

use App\Http\Controllers\Controller;

class TestController extends Controller
{

    public function index()
    {
        // Debugbar::info($object);
        // Debugbar::error('Error!');
        // Debugbar::warning('Watch out…');
        // Debugbar::addMessage('Another message', 'mylabel');

        // And start/stop timing:

        // Debugbar::startMeasure('render', 'Time for rendering');
        // Debugbar::stopMeasure('render');
        // Debugbar::addMeasure('now', LARAVEL_START, microtime(true));
        // Debugbar::measure(
        //     'My long operation', function () {
        //         // Do something…
        //     }
        // );

        // Чтение переменной сессии

        $value = Session::get('key');

        $value = session('key');

        // Чтение переменной или возврат значения по умолчанию

        $value = Session::get('key', 'default');

        $value = Session::get('key', function() { return 'default'; });
        // Прочитать переменную и забыть её

        $value = Session::pull('key', 'default');
        // Получение всех переменных сессии

        $data = Session::all();
        // Проверка существования переменой

        if (Session::has('users')) {
            //
        }
        // Удаление переменной из сессии

        Session::forget('key');
        // Удаление всех переменных

        Session::flush();
        // Присвоение сессии нового идентификатора

        Session::regenerate();

        // try {
        //     throw new Exception('foobar');
        // } catch (Exception $e) {
        //     Debugbar::addThrowable($e);
        // }

        // Метод pluck() извлекает все значения по заданному ключу:
        $collection = collect(
            [
                ['product_id' => 'prod-100', 'name' => 'Desk'],
                ['product_id' => 'prod-200', 'name' => 'Chair'],
            ]
        );

        $plucked = $collection->pluck('name');
        // $plucked->all(); // ['Desk', 'Chair']

        dd($plucked->all());

        // Можно указать, с каким ключом нужно получить коллекцию:

        $plucked = $collection->pluck('name', 'product_id');

        dd($plucked->all());

        // ['prod-100' => 'Desk', 'prod-200' => 'Chair']



        // return view('test');
    }

    public function fooIndex()       {
        return view('test');
    }

    public function barIndex()       {
        return view('hello')->with('name', 'Janus Nic');
    }

    public function baxIndex()       {
        return view('hello')->withName('Janus Nic With Name');
    }

    public function bazIndex()       {
        if (view()->exists('hello')) {
            return view('hello', ['name' => 'Janus Nic As Name']);
        }
    }

    // public function bazIndex()   	{
    //     if (view()->exists('hello')) {
    //         return view('hello', ['name' => 'Janus Nic As Name']);
    //     }
    // }

}
