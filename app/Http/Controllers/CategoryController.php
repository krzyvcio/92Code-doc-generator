<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return view('category.index');
    }

    public function show()
    {
        return view('category.show');
    }

    public function store(Request $request)
    {
        return view('category.store');
    }

    public function update(Request $request, $id)
    {
        return view('category.update');
    }

    public function destroy($id)
    {
        return view('category.destroy');
    }
}
