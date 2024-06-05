<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentApiController extends Controller
{

    use ValidatesRequests;

    public function index()
    {
        $documents = Document::all();
        return response()->json(['documents' => $documents]);
    }

    public function show($id)
    {
        $document = Auth::user()->documents->find($id);
        return response()->json($document);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',

        ]);

        if ($validatedData) {
            $document = Document::create([
                'title' => $validatedData['title'], // Provide a value for the 'name' field
                'body' => $validatedData['body'],
                'category_id' => $validatedData['category_id'],
            ]);

            return response()->json([
                'message' => 'Document created successfully',
                'document' => $document
            ]);
        } else {
            // Walidacja nie powiodła się, wyświetlaj błędy walidacji
            return back()->withInput()->withErrors($validatedData);
        }
    }

    public function update(Request $request, $id)
    {
        $document = Auth::user()->documents->find($id);
        $document->update($request->all());
        return response()->json([
            'message' => 'Document updated successfully',
            'document' => $document
        ]);
    }

    public function destroy($id)
    {
        $document = Auth::user()->documents->find($id);
        $document->delete();
        return response()->json([
            'message' => 'Document deleted successfully',
            'id' => $id
        ]);
    }
}