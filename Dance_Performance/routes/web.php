<?php
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;

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

Auth::routes();

Route::group(['middleware' => 'auth'],function(){

    Route::get('/logout',[DisplayController::class, "logout"]);

    //管理者
    Route::get('/',[DisplayController::class, "index"]);
    Route::get('/performance/{id}/detail',[DisplayController::class, "performanceDitail"])->name('performance.detail');
    Route::get('/create_performance',[RegistrationController::class, "createPerformanceForm"])->name('performance.create');
    Route::post('/create_performance',[RegistrationController::class, "createPerformance"]);
    Route::get('/create_venue',[RegistrationController::class, "createVenueForm"])->name('venue.create');
    Route::post('/create_venue',[RegistrationController::class, "createVenue"]);
    Route::get('/edit_performance/{id}',[RegistrationController::class, "editPerformanceForm"])->name('performance.edit');
    Route::post('/edit_performance/{id}',[RegistrationController::class, "editPerformance"]);
    Route::get('/delete_performance/{id}',[RegistrationController::class,'performanceDelete'])->name('delete.performance');
    Route::get('/performance_category/{id}',[RegistrationController::class,'performanceCategory'])->name('performance.category');

    //一般
    Route::get('/top',[DisplayController::class, "top"])->name('top');
    Route::get('/book-top',[DisplayController::class, "books"])->name('book.top');
    Route::get('/comment-top',[DisplayController::class, "comments"])->name('comment.top');
    Route::get('/book/{id}/detail',[DisplayController::class, "bookDitail"])->name('book.detail');
    Route::get('/create_book/{id}',[RegistrationController::class, "createBookForm"])->name('book.create');
    Route::post('/create_book/{id}',[RegistrationController::class, "createBook"]);
    Route::get('/comment/{id}/detail',[DisplayController::class, "commentDitail"])->name('comment.detail');
    Route::get('/create_comment/{id}',[RegistrationController::class, "createCommentForm"])->name('comment.create');
    Route::post('/create_comment/{id}',[RegistrationController::class, "createBook"]);



});
