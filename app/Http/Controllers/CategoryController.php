<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create(Request $request)
    {
        Category::newCategory($request);
        return back()->with('message', 'Category info create successfully.');
    }

    public function manage()
    {
        return view('admin.category.manage');
    }

    public function edit($id)
    {
        return view('admin.category.edit');
    }

    public function update(Request $request, $id)
    {
        return $request->all();
    }

    public function delete($id)
    {

    }
}
