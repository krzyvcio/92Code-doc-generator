<?php

namespace App\Http\Controllers\Document;

use App\Models\Category;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    public function index()
    {
        return view('documents.index');
    }
    public function create()
    {
        $categories = Category::all();
        dd($categories);
        return view('documents.create')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        return $request->all(); // TODO: Add validation
    }

    public function edit($id)
    {
        return view('documents.edit', ['id' => $id]);
    }

    public function update(Request $request, $id)
    {
        return $request->all(); // TODO: Add validation
    }

    public function destroy($id)
    {
        return $id;
    }
}
