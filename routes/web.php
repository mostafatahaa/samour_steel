<?php

use App\Http\Controllers\Front\ContactUsController;
use App\Http\Controllers\Front\PagesController;
use App\Http\Controllers\Front\ProductsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::middleware('lang')->group(function () {

    Route::controller(PagesController::class)->group(function () {
        Route::get('/', 'homePage')->name('home');
        Route::get('/why-choose-us', 'whyChooseUsPage')->name('why_choose_us');
        Route::get('/about-us', 'aboutUsPage')->name('about_us');

        Route::get('/news', 'newsPage')->name('news.index');
        Route::get('/news/{slug}', 'newsPageShow')->name('news.show');

        Route::get('/knowledge', 'knowledgePage')->name('knowledge.index');
        Route::get('/knowledge/{slug}', 'knowledgePageShow')->name('knowledge.show');
    });


    Route::controller(ProductsController::class)->group(function () {
        Route::get('products', 'index')->name('products.index');
        Route::get('products/{slug}', 'show')->name('product.show');
        Route::get('search', 'search')->name('product.search');
    });

    Route::controller(ContactUsController::class)->group(function () {
        Route::get('contact-us', 'index')->name('contactus');
        Route::get('inquiry', 'inquiry')->name('inquiry');
        Route::post('contact-us/store', 'store')->name('contactus.store');
        Route::get('thanks-message', 'successRedirect')->name('thanks');
    });

    Route::get('/set-language/{lang}', function ($lang) {
        // Validate the language input and set the session
        if (in_array($lang, ['en', 'ar'])) {
            Session::put('locale', $lang);
            $direction = ($lang == 'ar') ? 'rtl' : 'ltr';
            Session::put('direction', $direction);
        }

        // Redirect back to the previous page or to the home page if no referrer is found
        return redirect()->back();
    })->name('change.language');
});
