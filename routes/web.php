<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', function () {
    $tasks = DB::table('tasks')->get();
    return view('tasks', ['tasks' => $tasks]);
});

Route::post('/tasks', function () {
    DB::table('tasks')->insert([
        'name' => request('name'),
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return redirect('/tasks');
});

Route::delete('/tasks/{id}', function ($id) {
    DB::table('tasks')->where('id', $id)->delete();
    return redirect('/tasks');
});