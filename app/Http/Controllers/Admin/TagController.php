<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use Session;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();

        return view('admin.tags.index')
            ->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validator = Validator::make(
        //     $request->all(),
        //     [
        //         'name' => 'required|unique:tags|max:255',
        //     ]
        // );

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator->messages()->first());
        // }

        $this->validate(
            $request,
            [
                'name' => 'required|unique:tags|max:255',
            ]
        );


        // if ($validator->fails()) {
        //     Session::flash('errors', $validator->messages()->first());
        //     return redirect()->back()->withInput();
        // }

        // finally store our user
        $tag = new Tag;

        // $tag = $request->all();
        $tag->name = $request->name;
        $tag->description = $request->input('description', 'Default Value');

        $tag->save();


        // return redirect(route('tags.index'));

        return redirect(route('tags.index'))->with('success', 'An tag has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // Получить кусок данных из сессии...
        // $value = $request->session()->get('key');

        // $value = session('key');

        // Указать значение по умолчанию...
        // $value = session('key', 'default');

        // Сохранить кусок данных в сессию...
        // session(['key' => 'value']);

        // $value = session('key');

        // $value = $request->session()->get('key', 'default');
        // $value = $request->session()->get(
        //     'key',
        //     function () {
        //         return 'default';
        //     }
        // );

        // получить все данные из сессии:
        // $value = $request->session()->all();

        // Через экземпляр запроса...
        // $request->session()->put('key', 'value');

        // Через глобальный вспомогательный метод...
        // session(['key' => 'value']);

        // $request->session()->push('user.teams', 'developers');

        // $value = $request->session()->pull('key', 'default');

        // $request->session()->flash('status', 'Задание выполнено успешно!');

        // $request->session()->reflash();

        // $request->session()->keep(['username', 'email']);


        if ($request->session()->has('users')) {
            dd($request->session()->all());
        }

        if ($request->session()->exists('users')) {
            dd($request->session()->all());
        }

        // $request->session()->forget('key');

        // $request->session()->flush();

        // $request->session()->regenerate();

        dd($value);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('admin.tags.edit')->withTag($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $tag->name = $request->input('name');

        $tag->save();
        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::find($id)->delete();

        return redirect(route('tags.index'));
    }
}
