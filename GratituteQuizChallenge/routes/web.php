<?php

use App\Models\Category;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
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
    return view('welcome');
});
Route::get('dynamic-questions', function (Request $request) {
    $category_type = Category::where('type', $request->input('type'))->first();

    $questions =  Question::whereIn('category_id', [$category_type->id])->get();
    $questions_id = collect($questions)->pluck('id');
    $options = Option::whereIn('question_id', [21])->get();
    // dd($options);
    return view('question', compact('questions', 'category_type', 'options'));
});
