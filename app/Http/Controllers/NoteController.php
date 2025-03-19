<?php

namespace App\Http\Controllers;


use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = DB::table('notes')->orderBy('created_at', 'desc')->get();
        return response()->json($notes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $note = DB::table('notes')->insert([
            'user_id'=>$request->user_id,
            'title'=>$request->title,
            'body'=>$request->body,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        if($note){
            return response()->json(["message" => "Poznamka bola vytvorena"],Response::HTTP_CREATED);
        } else {
            return response()->json(["message" => "Something went wrong"],Response::HTTP_FORBIDDEN);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $note = DB::table('notes')->where('id', $id)->first();
        if($note){
            return response()->json(["message" => "Poznamka nebola najdena"],Response::HTTP_NOT_FOUND);
        }

        return response()->json($note);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = DB::table('notes')->where('id', $id)->update([
            'title'=>$request->title,
            'body'=>$request->body,
            'updated_at'=>now(),
        ]);

        if($update){
            return response()->json(["message" => "Poznamka bola aktualizovana"],Response::HTTP_OK);
        }
        else{
            return response()->json(["message" => "Poznamka nebola aktualizovana"],Response::HTTP_OK);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = DB::table('notes')->where('id', $id)->delete();
        if($delete){
            return response()->json(["message" => "Poznamka bola vymazana"],Response::HTTP_OK);
        }
        else{
            return response()->json(["message" => "Poznamka nebola najdena"],Response::HTTP_NOT_FOUND);
        }
    }


    /**
     * Vlastné metódy
     */

    // Získanie poznámok s menami používateľov
    public function notesWithUsers()
    {
        $notes = DB::table('notes')
            ->join('users', 'notes.user_id', '=', 'users.id')
            ->select('notes.*', 'users.name as user_name')
            ->get();

        return response()->json($notes);
    }

    // Počet poznámok pre každého používateľa
    public function usersWithNoteCount()
    {
        $users = DB::table('users')
            ->select('users.id', 'users.name')
            ->selectSub(function ($query) {
                $query->from('notes')
                    ->selectRaw('COUNT(*)')
                    ->whereColumn('notes.user_id', 'users.id');
            }, 'note_count')
            ->get();

        return response()->json($users);
    }

    // Fulltextové vyhľadávanie v poznámkach
    public function searchNotes(Request $request)
    {
        $query = $request->query('q');

        if (empty($query)) {
            return response()->json(['message' => 'Musíte zadať dopyt na vyhľadávanie'], Response::HTTP_BAD_REQUEST);
        }

        $notes = DB::table('notes')
            ->where('title', 'like', '%' . $query . '%')
            ->orWhere('body', 'like', '%' . $query . '%')
            ->get();

        if ($notes->isEmpty()) {
            return response()->json(['message' => 'Žiadne poznámky sa nenašli'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($notes);
    }

    //Počet poznámok podľa používateľa
    public function usersWithNotesCount()
    {
        $users = DB::table('notes')
            ->join('users', 'notes.user_id', '=', 'users.id')
            ->select('users.id', 'users.name', DB::raw('COUNT(notes.id) as note_count'))
            ->groupBy('users.id', 'users.name')
            ->having('note_count', '>', 1)
            ->orderByDesc('note_count')
            ->get();

        return response()->json($users);
    }

    //Najdlhšia a najkratšia poznámka
    public function longestAndShortestNote()
    {
        $longest = DB::table('notes')
            ->select('id', 'title', 'body', DB::raw('LENGTH(body) as length'))
            ->orderByDesc('length')
            ->first();

        $shortest = DB::table('notes')
            ->select('id', 'title', 'body', DB::raw('LENGTH(body) as length'))
            ->orderBy('length')
            ->first();

        return response()->json([
            'longest' => $longest,
            'shortest' => $shortest
        ]);
    }

    //Počet poznámok za posledných 7 dní
    public function notesLastWeek()
    {
        $count = DB::table('notes')
            ->where('created_at', '>=', now()->subDays(7))
            ->count();

        return response()->json(['last_week_notes' => $count]);
    }

}
