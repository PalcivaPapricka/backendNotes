<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\TestComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookRestController;

/*Route::get('/hello', function(){
    echo "Hello API";
});

Route::get('/test', [TestComponent::class, 'testAction']);

Route::post('/books/{id}/borrow', [TestComponent::class, 'borrowBook']);
Route::post('/books/{id}/return', [TestComponent::class, 'returnBook']);
Route::post('/book/{id}', TestComponent::class);
Route::resource('books', BookRestController::class);


*/
Route::apiResource('/notes', NoteController::class);

Route::get('/notes-with-users', [NoteController::class, 'notesWithUsers']);
Route::get('/users-with-note-count', [NoteController::class, 'usersWithNoteCount']);
Route::get('/search-notes', [NoteController::class, 'searchNotes']);

Route::get('/users-with-notes-count', [NoteController::class, 'usersWithNotesCount']);
Route::get('/longest-and-shortest-note', [NoteController::class, 'longestAndShortestNote']);
Route::get('/notes-last-week', [NoteController::class, 'notesLastWeek']);
