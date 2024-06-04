<?php

namespace App\Http\Controllers\Document;

use App\Http\Controller;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    public function index()
    {
        return view('documents.index');
    }
    public function create()
    {
        return view('documents.create');
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
