<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{


    public function index()
    {
        $todolists=Todolist::all();
        return view('home',compact('todolists'));
    }
////////////////////////////////////////////////////////////////////////////////////
    public function store(Request $request)
    {
        $data=$request->validate([
            'content'=>'required'
        ]);
        Todolist::create($data);
        return back();
    }
    ////////////////////////////////////////////////////////////////////////////////////
    public function destroy($id)
    {
        $todolist = Todolist::find($id);
        $todolist->delete();

        return redirect('/')->with('success', 'todolist item deleted successfully');
    }
    ////////////////////////////////////////////////////////////////////////////////////
    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $todolist = Todolist::find($id);
        $todolist->content = $request->input('title');
        $todolist->save();

        // return redirect('/')->with('success', 'Todo item updated successfully');
    }
////////////////////////////////////////////////////////////////////////////////////
}
