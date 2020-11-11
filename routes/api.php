<?php
use Illuminate\Support\Facades\Route;


Route::ApiResource('/class','Api\SclassController');
Route::ApiResource('/subject','Api\SubjectController');
Route::ApiResource('/section','Api\SectionController');
Route::ApiResource('/student','Api\StudentController');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
