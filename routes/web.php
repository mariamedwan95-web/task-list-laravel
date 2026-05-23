<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', function () {
    $tasks = DB::table('tasks')->get();

    return view('tasks', compact('tasks'));
});

Route::post('/tasks', function () {
    DB::table('tasks')->insert([
        'name' => request('name'),
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return redirect('/tasks');
});

Route::post('/delete/{id}', function ($id) {
    DB::table('tasks')->where('id', $id)->delete();

    return redirect('/tasks');
});

Route::post('/edit/{id}', function ($id) {
    $task = DB::table('tasks')->where('id', $id)->first();
    $tasks = DB::table('tasks')->get();

    return view('tasks', compact('task', 'tasks'));
});
Route::post('/update', function () {
    $id = request('id');
    $name = request('name');

    DB::table('tasks')->where('id', $id)->update([
        'name' => $name,
        'updated_at' => now()
    ]);

    return redirect('/tasks');
});