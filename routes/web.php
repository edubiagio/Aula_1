<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('dashboard');
});

//resourse  pertime rota para os metodos da controller, middleware auth, precisa estar logado p/ acessar
Route::resource('comments', CommentController::class)
->only(['index','store','update','edit','destroy'])
->middleware(['auth','verified']);

// GET /comments action: index nome-da-rota: comments.index
// POST /comments action: store nome-da-rota: comments.store
// GET /comments/{comment}/edit action: edit nome-da-rota: comments.edit
// PUT /comments/{comment} action: update nome-da-rota: comments.update
// DELETE /comments/{comment} action: destroy nome-da-rota: comments.destroy


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
