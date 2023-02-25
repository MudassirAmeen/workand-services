<?php

use App\Http\Controllers\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CropController;
use App\Http\Controllers\Facts;
use App\Http\Controllers\Faqs;
use App\Http\Controllers\Features;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\NewUsers;
use App\Http\Controllers\Privacy;
use App\Http\Controllers\Projects;
use App\Http\Controllers\SendMails;
use App\Http\Controllers\Services;
use App\Http\Controllers\TeamMembers;
use App\Http\Controllers\TermsAndConditions;
use App\Http\Controllers\Testimonials;
use App\Http\Middleware\CheckID;
use App\Http\Middleware\FrontEnd;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontEndController::class, 'welcome']);

Route::prefix('/')->middleware(FrontEnd::class)->group(function () {
    Route::get('/about', [FrontEndController::class, "about"])->name('about');
    Route::get('/services', [FrontEndController::class, "services"])->name('services');
    Route::get('/projects', [FrontEndController::class, "projects"])->name('projects');
    Route::get('/team', [FrontEndController::class, "team"])->name('team');
    Route::get('/testimonial', [FrontEndController::class, "testimonial"])->name('testimonial');
    Route::get('/contact', [FrontEndController::class, "contact"])->name('contact');
    Route::get('/privacy', [FrontEndController::class, "privacy"])->name('privacy');
    Route::get('/terms', [FrontEndController::class, "terms"])->name('terms');
    Route::post('/contact', [SendMails::class, "submit"])->name('contact');
    Route::post('/newsLetter', [SendMails::class, "newsLetter"])->name('newsLetter');
});

// Authentication Routes
Route::get('login', [Controller::class, 'loginForm'])->name('loginForm');
Route::post('login', [Controller::class, 'login'])->name('loginForm');
Route::get('signup', [Controller::class, 'signupForm'])->name('signupForm');
Route::post('signup', [Controller::class, 'signup'])->name('signupForm');
Route::get('logout', [Controller::class, 'logout'])->name('logout');

// Admin Routes
Route::prefix('/admin')->middleware(CheckID::class)->group(function () {
    Route::get('/', [Controller::class, 'dashboard'])->name('AdminHome');
    Route::resource('user', NewUsers::class);
    Route::resource('project', Projects::class);
    Route::resource('fact', Facts::class);
    Route::resource('testimonial', Testimonials::class);
    Route::resource('service', Services::class);
    Route::resource('team', TeamMembers::class);
    Route::resource('feature', Features::class);
    Route::resource('category', Category::class);
    Route::resource('policy', Privacy::class);
    Route::resource('terms', TermsAndConditions::class);
    Route::resource('faqs', Faqs::class);
    Route::post('/FeatureCropImage', [CropController::class, 'FeatureCropImage'])->name('FeatureCropImage');
    Route::post('/ProjectCropImage', [CropController::class, 'ProjectCropImage'])->name('ProjectCropImage');
    Route::post('/ServiceCropImage', [CropController::class, 'ServiceCropImage'])->name('ServiceCropImage');
    Route::post('/TestimonialCropImage', [CropController::class, 'TestimonialCropImage'])->name('TestimonialCropImage');
    Route::post('/TeamCropImage', [CropController::class, 'TeamCropImage'])->name('TeamCropImage');
});
