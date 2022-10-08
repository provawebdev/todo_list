<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
  
    public function store(Request $request)
    {
    $this->validate($request, [
        'name' => 'required|max:255',
    ]);

    $data = new Category;
    $data->name = $request->name;
    $data->save();
 
    return redirect('/');
    }
    public function destroy(Request $request, $id)
    {
        Category::findOrFail($id)->delete();
        return redirect('/');
    }
}
