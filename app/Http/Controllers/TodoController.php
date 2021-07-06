<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $items = DB::table('todos')->get();
        return view('index',['items' => $items]);
    }
    public function create(Request $request)
    {
        $this->validate($request, Todo::$rules);
        $param = [
            'content' => $request->content
        ];
        DB::table('todos')->insert($param);
        return redirect('/');
    }
    public function update(Request $request)
    {
        $this->validate($request, Todo::$rules);
        $param = [
            'content' => $request->input('content')
        ];
        DB::table('todos')->where('id', $request->id)->update($param);
        return redirect('/');
    }
    public function delete(Request $request)
    {
        $param = [
            'id' => $request->input('id')
        ];
        DB::table('todos')->where('id', $request->id)->delete($param);
        return redirect('/');
    }
}
