<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Document;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $documents = Document::all();

        return view('documents.index', ['documents' => $documents]);
    }
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
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
        $document = Document::find($id);
        return view('documents.edit', ['document' => $document]);
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $document = Document::find($id);
        $request->validate([
            'id' => 'required',
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);

        $document->update($request->all());
        return redirect('/documents')->with('success', 'Dokument został zaktualizowany');
    }

    public function destroy($id)
    {
        return $id;
    }
}
