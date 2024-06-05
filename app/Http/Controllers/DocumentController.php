<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Document;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    public function index()
    {
        $documents = Document::all();

        return view('documents.index', ['documents' => $documents]);
    }
    public function create()
    {
        $categories = Category::all();

        return view('documents.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {


        $request->all(); // TODO: Add validation
    }

    public function show($id)
    {
        $document =  Document::find($id);
        return view('documents.show', ['document' => $document]);
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