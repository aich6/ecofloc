<?php

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Route;

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

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'deviceId' => 'required',
    ]);
 
    $user = User::where('email', $request->email)->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
 
    return ['token' => $user->createToken($request->deviceId)->plainTextToken];
});





Route::group(['middleware' => 'auth:sanctum'], function(){
    
    
    Route::get('/user/revoke', function (Request $request) {
        $user = $request->user();
        $user->tokens()->delete();
        return 'tokens are deleted';
    });

    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/products', 'App\Http\Controllers\ApiController@Products');

}); 

