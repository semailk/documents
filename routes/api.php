<?php

use App\Http\Controllers\Api\DocumentController;
use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/v1/document/')->group(function () {
    Route::post('/',[DocumentController::class, 'createDocument']); // Создания документа
    Route::get('{id}',[DocumentController::class, 'getDocument']); // Получение документа по uuid
    Route::patch('{id}',[DocumentController::class, 'updateDocument']); // Обновление документа по uuid
    Route::post('{id}/publish',[DocumentController::class, 'publishDocument']); // Обновление документа по uuid
    Route::get('{page?}', [DocumentController::class, 'getPaginate']); // Получить данные по пагинации
});