<?php
use App\Http\Controllers\Auth\SignuplessorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Lessor\OfficeController;
use App\Http\Controllers\Lessor\LessordashController;
use App\Http\Controllers\Lessor\LessorprofileController;
use App\Http\Controllers\Lessor\CommentdashController;
use App\Http\Controllers\Lessor\ReservationLessor;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\SingleofficeController;
use App\Http\Controllers\User\UserprofileController;
use App\Http\Controllers\User\ReservationController;

use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\RateController;
use App\Http\Controllers\Admin\LessorController;
use App\Http\Controllers\Admin\ContactdashController;
use App\Http\Controllers\Admin\UserDashboardController;
use App\Http\Controllers\Admin\CommentDashboardController;
use App\Http\Controllers\Admin\ReversationDashboardController;
use App\Http\Controllers\Admin\OfficeadminController;
use App\Http\Controllers\Admin\DashboardAdminController;


Route::get('/', [LoginController::class, 'index'])->name('sign-up.index');
Route::post('/register', [SignupController::class, 'store'])->name('sign-up');
Route::post('/register/lessor', [SignuplessorController::class, 'store'])->name('sign-up.lessor');
Route::post('/login/check', [LoginController::class, 'check'])->name('login.check');
Route::match(['get', 'post'], '/logout', [LogoutController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {

    Route::middleware(['role:User'])->group(function () {

        Route::resource('/userprofile', UserprofileController::class);
        Route::post('/reservations', [ReservationController::class, 'create'])->name('reservations');
        Route::get('/home', [HomeController::class, 'index'])->name('home');
    });

    Route::middleware(['role:Lessor'])->group(function () {


        Route::resource('/office', OfficeController::class);
        Route::resource('/lessor', LessordashController::class);
        Route::resource('/profile', LessorprofileController::class);
        Route::put('/Lessorprofile/{id}', [LessorprofileController::class, 'update'])->name('Lessorprofile');
        Route::get('/office/create', [OfficeController::class, 'create'])->name('office.create');
        Route::get('/user/{userId}/comments', [CommentdashController::class, 'showUserComments'])->name('comments');
        Route::get('/lessor', [LessordashController::class, 'index'])->name('lessor');
        // Route::resource('/reservationLessor', ReservationLessor::class);


    });

    Route::middleware(['role:Admin'])->group(function () {
        Route::get('/admin', function () {
            return view('Admin.index');
        })->name('admin');

        Route::resource('/admin/lessores', LessorController::class);
        Route::resource('/userdashboard',UserDashboardController::class);
        Route::resource('/commentdashboard',CommentDashboardController::class);
        Route::resource('/admin/offices', OfficeadminController::class);
        Route::resource('/Adminprofile', DashboardAdminController::class);
        Route::resource('/reversation', ReversationDashboardController::class);
        Route::resource('/contact', ContactdashController::class);
        // Route::post('/contact', [ContacdashtController::class, 'index'])->name('contact.index');


    });
});

Route::resource('/product', SingleofficeController::class);
Route::get('/office/{id}', 'App\Http\Controllers\User\SingleofficeController@show')->name('single_office');
Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/rate', [RateController::class, 'store'])->name('rate.store');


Route::resource('/comment', CommentController::class);


Route::get('/product', [SingleofficeController::class, 'index'])->name('single_product');
Route::resource('/home', HomeController::class);
Route::get('/calnder', function () {
    return view('User.booking');
});









