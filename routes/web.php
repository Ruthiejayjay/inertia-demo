<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;


Route::get('login', [LoginController::class, 'create'])->name('login');

Route::post('login', [LoginController::class, 'store']);

Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::middleware('auth')->group(function () {

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
            'can' => [
                'createUser' => false
            ],
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
});
