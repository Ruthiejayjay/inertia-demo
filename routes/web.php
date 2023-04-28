<?php

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia('Home');
});

Route::get('/users', function () {
    return Inertia('Users/Index', [
        'users' => User::query()
            ->when(Request::input('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString()
            ->through(fn ($user) => [
                'id' => $user->id,
                'name' => $user->name
            ]),
        'filters' => Request::only(['search']),
        'time' => now()->toTimeString()
    ]);
});

Route::get('/users/create', function () {
    return Inertia('Users/Create');
});

Route::post('/users', function () {
    //validate request
    $attributes = Request::validate([
        'name' => 'required',
        'email' => ['required', 'email'],
        'password' => 'required',
    ]);
    User::create($attributes);

    return redirect('/users');
});

Route::get('/settings', function () {
    return Inertia('Settings');
});

Route::post('/logout', function () {
    dd('logging the user out');
});
