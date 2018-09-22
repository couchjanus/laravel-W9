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
        Debugbar::error('Error!');
        Debugbar::warning('Watch out…');
        Debugbar::addMessage('Another message', 'mylabel');

        // And start/stop timing:

        Debugbar::startMeasure('render', 'Time for rendering');
        Debugbar::stopMeasure('render');
        Debugbar::addMeasure('now', LARAVEL_START, microtime(true));
        Debugbar::measure(
            'My long operation', function () {
                // Do something…
            }
        );

        try {
            throw new Exception('foobar');
        } catch (Exception $e) {
            Debugbar::addThrowable($e);
        }

        return view('test');
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
