<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\UserResource;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user/{id}', function ($id) {
    return new UserResource(User::findOrFail($id));
});

Route::get('/users', function () {
    return UserResource::collection(User::all());
});

Route::post('/user/login', function (Request $request) {
    $successful = User::validate($request->email, $request->password);
});
