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
    Route::group(['middleware' => 'admin_auth'], function () {

        Route::get('/',[DisplayController::class, "index"]);
        Route::get('/past',[DisplayController::class, "past"])->name('past');
        Route::get('/past/{performance}/comment',[DisplayController::class, "pastcomment"])->name('past.comment');
        Route::get('/performance/{performance}/detail',[DisplayController::class, "performanceDitail"])->name('performance.detail');
        Route::get('/create_performance',[RegistrationController::class, "createPerformanceForm"])->name('performance.create');
        Route::post('/create_performance',[RegistrationController::class, "createPerformance"]);
        Route::get('/create_venue',[RegistrationController::class, "createVenueForm"])->name('venue.create');
        Route::post('/create_venue',[RegistrationController::class, "createVenue"]);
        Route::get('/edit_performance/{performance}',[RegistrationController::class, "editPerformanceForm"])->name('performance.edit');
        Route::post('/edit_performance/{performance}',[RegistrationController::class, "editPerformance"]);
        Route::get('/delete_performance/{performance}',[RegistrationController::class,'performanceDelete'])->name('delete.performance');
        Route::get('/performance_category/{performance}',[RegistrationController::class,'performanceCategory'])->name('performance.category');
        Route::get('/performance_image/{performance}',[RegistrationController::class,'performanceImage'])->name('performance.image');
        Route::get('/edit_book/{book}',[RegistrationController::class, "editBookForm"])->name('book.edit');
        Route::post('/edit_book/{book}',[RegistrationController::class, "editBook"]);
        Route::get('/delete_book/{book}',[RegistrationController::class,'bookDelete'])->name('delete.book');
    
    });
    //一般
    Route::get('/top',[DisplayController::class, "top"])->name('top');

    Route::get('/book-top',[DisplayController::class, "books"])->name('book.top');
    Route::get('/book-serch',[DisplayController::class, "Bookserch"])->name('book.serch');
    Route::get('/book/{performance}/detail',[DisplayController::class, "bookDitail"])->name('book.detail');
    Route::get('/create_book/{performance}',[RegistrationController::class, "createBookForm"])->name('book.create');
    Route::post('/create_book/{performance}',[RegistrationController::class, "createBook"]);
    
    Route::get('/comment-top',[DisplayController::class, "comments"])->name('comment.top');
    Route::get('/comment-serch',[DisplayController::class, "Commentserch"])->name('comment.serch');
    Route::get('/comment/{performance}/detail',[DisplayController::class, "commentDitail"])->name('comment.detail');
    Route::get('/create_comment/{performance}',[RegistrationController::class, "createCommentForm"])->name('comment.create');
    Route::post('/create_comment/{performance}',[RegistrationController::class, "createComment"]);



});
