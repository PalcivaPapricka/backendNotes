<?php
use App\Http\Controllers\TestComponent;
use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', function () {
        echo("yo mama");

    });

    Route::get('/form', [TestComponent::class, 'viewForm']);
    Route::post('/submit', [TestComponent::class, 'submitForm2'])->name('submit.form');
