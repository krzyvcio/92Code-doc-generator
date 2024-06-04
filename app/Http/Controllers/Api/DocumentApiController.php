<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentApiController extends Controller
{
    public function index()
    {
        $categories = Auth::user()->categories;
        return response()->json(['categories' => $categories]);
    }

    public function show($id)
    {
        $category = Auth::user()->categories->find($id);
        return response()->json($category);
    }

    public function store(Request $request)
    {
        $category = Auth::user()->categories->create($request->all());
        return response()->json([
            'message' => 'Category created successfully',
            'category' => $category
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $category = Auth::user()->categories->find($id);
        $category->update($request->all());
        return response()->json([
            'message' => 'Category updated successfully',
            'category' => $category
        ]);
    }

    public function destroy($id)
    {
        $category = Auth::user()->categories->find($id);
        $category->delete();
        return response()->json([
            'message' => 'Category deleted successfully',
            'id' => $id
        ], 204);
    }
}
