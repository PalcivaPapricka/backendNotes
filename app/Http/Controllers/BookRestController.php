<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookRestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = [
            ['id'=>1,'title'=>'pp ppoo ppoo','autor'=>'paprik'],
            ['id'=>2,'title'=>'lol lmao','autor'=>'peper'],
            ['id'=>3,'title'=>'ooooooof','autor'=>'vktr'],
        ];
        return view('books',['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        echo "create";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        return response("kniha z nazvom $title bola vytvorena");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response("kniha s ID = $id");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        echo"edit";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $newTitle = $request->input('title');
        return response("knihe z id $id bol zmeneny nazov na $newTitle");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            return response("kniha s ID = $id bola vymazana");        //
    }
}
