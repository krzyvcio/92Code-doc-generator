<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class CategoryApiController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        $categories =  Auth::user()->categories;
        return response()->json(["categories" => $categories]);
    }


    public function show($id)
    {
        $category = Auth::user()->categories->find($id);
        return response()->json($category);
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $category = Auth::user()->categories->create($request->all());
        return response()->json([
            'message' => 'Category created successfully',
            'category' => $category
        ], 201);
    }

    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {

        $category = auth()->user()->categories->find($id);
        $category->update($request->all());
        return response()->json([
            'message' => 'Category updated successfully',
            'category' => $category
        ]);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $category = auth()->user()->categories->find($id);

        $category->delete();
        return response()->json([
            'message' => 'Category deleted successfully',
            'id' => $id
        ], 204);
    }
}
