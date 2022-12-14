<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Todo_list;

class Todo_listController extends Controller
{
    public function index(Request $request)
    {
        $category = Category::orderBy('created_at', 'asc')->get();
        $todo_list = Todo_list::orderBy('created_at', 'asc')->get();
        return view('welcome', [
        'todo_list' => $todo_list , 'category' => $category
    ]);
    }
    public function store(Request $request)
    {
    $this->validate($request, [
        'name' => 'required|max:255',
    ]);
    
    $data = new Todo_list();
    $data->name = $request->name;
    $data->category_id = $request->category_id;
    $data->save();
 
    return redirect('/');
    }
    public function destroy(Request $request, $id)
    {
        Todo_list::findOrFail($id)->delete();
        return redirect('/');
    }
}
