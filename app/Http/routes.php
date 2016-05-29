<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    if(Auth::check()) {
        return redirect()->route('userMainPage');
    }
    return view('guestmainpage');
})->name('main');

Route::get('/login', function() {
    if(Auth::check()) {
        return redirect()->route('userMainPage');
    }
    return view('auth');
})->name('auth');
Route::post('/login', ['uses' => 'UserController@loginUser', 'as' => 'loginUser']);

Route::get('/signup', function()
{
    if(Auth::check()) {
        return redirect()->route('userMainPage');
    }
    return view('signup');
});
Route::post('/signup', ['uses' => 'UserController@createUser', 'as' => 'createUser']);

Route::get('/logout', ['uses' => 'UserController@logout', 'as' => 'logout']);

Route::get('/about', function() {
    return view('about');
});

Route::get('/chapter/{field}/{nr}/theory', ['uses' => 'ChapterController@displayTheory', 'as' => 'chapterTheory']);
Route::get('/chapter/{field}/{nr}/practice', ['uses' => 'ChapterController@displayPractice', 'as' => 'chapterPractice']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/main', ['uses' => 'UserController@mainPage', 'as' => 'userMainPage']);

    Route::get('/knowledgequiz', ['uses' => 'QuizController@showKnowledgeQuiz', 'as' => 'knowledgeQuiz']);
    Route::post('/knowledgequiz', ['uses' => 'QuizController@knowledgeQuizResults', 'as' => 'knowledgeQuizResults']);
    Route::get('/stylesquiz', ['uses' => 'QuizController@showStylesQuiz', 'as' => 'stylesQuiz']);
    Route::post('/stylesquiz', ['uses' => 'QuizController@stylesQuizResults', 'as' => 'stylesQuizResults']);

    Route::get('/profile/{id}', ['uses' => 'UserController@getProfile', 'as' => 'getProfile']);
    Route::get('/compareprofiles/{id}', ['uses' => 'UserController@compareProfiles', 'as' => 'compareProfiles']);
    Route::get('/editProfile', ['uses' => 'UserController@editProfile', 'as' => 'editProfile']);
    Route::post('/updateProfile', ['uses' => 'UserController@updateProfile', 'as' => 'updateProfile']);

    Route::post('/comment/{id}/create', ['uses' => 'ChapterController@createComment', 'as' => 'createComment']);

    Route::get('/chapter/next/{field}/{nr}/theory', ['uses' => 'ChapterController@displayNextTheory', 'as' => 'chapterNextTheory']);
    Route::get('/chapter/next/{field}/{nr}/practice', ['uses' => 'ChapterController@displayNextPractice', 'as' => 'chapterNextPractice']);
});




