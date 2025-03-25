<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return response()->json($categories);
    }

    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Kategória nebola nájdená'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($category);
    }

    public function store(Request $request)
    {
        $category = Category::create(['name' => $request->name]);

        return response()->json(['message' => 'Kategória bola vytvorená', 'category' => $category], Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Kategória nebola nájdená'], Response::HTTP_NOT_FOUND);
        }

        $category->update(['name' => $request->name]);

        return response()->json(['message' => 'Kategória bola aktualizovaná', 'category' => $category]);
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Kategória nebola nájdená'], Response::HTTP_NOT_FOUND);
        }

        $category->delete();

        return response()->json(['message' => 'Kategória bola vymazaná']);
    }

    public function findByName($name)
    {
        $category = Category::where('name', $name)->first();

        if (!$category) {
            return response()->json(['message' => 'Kategória neexistuje'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($category);
    }
}
