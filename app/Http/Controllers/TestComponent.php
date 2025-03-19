<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class TestComponent
{
    public function viewForm(){
        return view('form');
    }
    public function submitForm2 (Request $request) {
        $data =$request-> only (['name', 'email', 'age']);
        if ($data['age'] < 18) {
            return response()->json([
                ' status' => Response::HTTP_FORBIDDEN,
                'message' => "lmao.",
            ]);
        }else{
            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => "{$data['name']}, s emailom {$data['email']} pain.",


            ]);

        }
    }


    public function borrowBook(Request $request, int $id){
        $userId = $request->input('userId');
        return response()->json(['message'=>"User s ID = $userId si pozical knihu s ID = $id." ]);
    }

    public function returnBook(Request $request, int $id){
        $condition = $request->input('condition');
        return response()->json(['message'=>"Kniha s ID = $id bola vratena v stave: $condition." ]);
    }


    public function __invoke(Request $request, int $id){
        $format = $request->input('format');
        return response("Toto je kniha s ID = $id vo formate $format.");

    }







}
