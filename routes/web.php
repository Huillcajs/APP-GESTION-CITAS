<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function() {
    return view('login');
});

Route::post('/login', function (Request $request) {
    
    $usuario = "damaris";
    $password = "12345";

    if ($request->input('usuario') === $usuario && $request->input('password') === $password) {
        return redirect('/system');
    } else {
        return redirect('/login')->with('error', 'Credenciales incorrectas');
    }
});

Route::get('/system', function() {
    return view('system');
});
