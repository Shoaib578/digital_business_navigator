<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Questions\QuestionsCrudController;
use App\Http\Controllers\Admin\Answers\AnswersCrudController;
use App\Http\Controllers\Admin\Services\ServicesCrudController;
use App\Http\Controllers\Admin\Files\FilesController;
use App\Http\Controllers\Admin\ManageLevels\ManageLevelsController;
use App\Http\Controllers\Admin\UserSubscriptions\UserSubscriptionsController;
use App\Http\Controllers\Admin\UserOwnedServices\UserOwnedServicesController;

use App\Http\Controllers\Admin\NewEvents\NewsEventsController as AdminNewsEventsController;

use App\Http\Controllers\Admin\Subscription\CrudController as SubscriptionCrudController;

use App\Http\Controllers\Main\HomeController;
use App\Http\Controllers\Main\AboutController;
use App\Http\Controllers\Main\StartService\StartServiceController;

use App\Http\Controllers\LandingPage\LandingPageController;
use App\Http\Controllers\Main\NewsEventsController;
use App\Http\Controllers\Main\ContactUs\ContactUsController;
use App\Http\Controllers\Main\Files\FilesController as MainFileController;

use App\Http\Controllers\Checkout;


use App\Http\Controllers\Main\BuySubscription\BuySubscriptionController;

Route::get('/login', [AuthController::class,'index'])->name('auth')->middleware('guest');
Route::post('/signup', [AuthController::class,'store'])->name('signup')->middleware('guest');
Route::post('/login', [AuthController::class,'login'])->name('login')->middleware('guest');





Route::get('/',[LandingPageController::class,"index"])->name('landing_page')->middleware("guest");
Route::get('/terms_and_conditions',[LandingPageController::class,"terms_and_conditions"])->name('terms_and_conditions');

Route::get('/get_start',[LandingPageController::class,"get_start"])->name('get_start')->middleware("auth");

Route::get('/about',[AboutController::class,"index"])->name('about');

Route::get('/home', [HomeController::class,'index'])->name('home')->middleware("auth");
Route::get('/main_files', [MainFileController::class,'index'])->name('main_files')->middleware("auth");
Route::get('/view_service/{id}', [HomeController::class,'show'])->name('main_view_service')->middleware("auth");
Route::get('/start_service/{id}/{page_number}', [StartServiceController::class,'index'])->name('start_service')->middleware("auth");
Route::get('/service/buy/{id}', [StartServiceController::class,'buy_service'])->name('buy_service')->middleware('auth');

Route::get('/new_events', [NewsEventsController::class,'index'])->name('news_events');
Route::get('/contact_us', [ContactUsController::class,'index'])->name('contact_us');
Route::post('/contact_us', [ContactUsController::class,'store'])->name('contact_us');

Route::get('/buy_subscription', [BuySubscriptionController::class,'index'])->name('buy_subscription')->middleware('auth');
Route::get('/buy_subscription/{subscription_id}', [BuySubscriptionController::class,'store'])->name('final_buy_subscription')->middleware('auth');


Route::get('/buy_subscription_checkout/{price}/{subscription_id}',[Checkout::class,'BuySubscriptioncheckout'])->name("BuySubscriptioncheckout")->middleware('auth');
Route::post('/buy_subscription_checkout/{subscription_id}',[Checkout::class,'afterBuySubscriptionpayment'])->name('BuySubscriptioncheckout.credit-card')->middleware('auth');

Route::get('/buy_serivce_checkout/{price}/{service_id}',[Checkout::class,'BuyServiceCheckout'])->name("BuyServiceCheckout")->middleware('auth');
Route::post('/buy_service_checkout/{service_id}',[Checkout::class,'afterBuyServicepayment'])->name('BuyServiceCheckout.credit-card')->middleware('auth');

Route::get('/logout',function(){
    auth()->logout();
    return redirect()->route('auth');
    })->name('logout')->middleware('auth');





Route::prefix('admin')->group(function(){
    Route::get('/', [AdminDashboardController::class,'index'])->name('admin_home')->middleware('auth');
    Route::get('/activate_user/{id}', [AdminDashboardController::class,'activate_user'])->name('activate_user')->middleware('auth');
    Route::get('/deactivate_user/{id}', [AdminDashboardController::class,'deactivate_user'])->name('deactivate_user')->middleware('auth');

    Route::get('/manage_levels', [ManageLevelsController::class,'index'])->name('manage_levels')->middleware('auth');
    Route::post('/manage_levels/add', [ManageLevelsController::class,'store'])->name('add_level')->middleware('auth');
    Route::get('/manage_levels/{id}', [ManageLevelsController::class,'destroy'])->name('delete_manage_levels')->middleware('auth');


    Route::get('/subscriptions', [SubscriptionCrudController::class,'index'])->name('admin_subscriptions_crud')->middleware('auth');
    Route::get('/subscription/delete/{id}', [SubscriptionCrudController::class,'destroy'])->name('delete_subscription')->middleware('auth');
    Route::get('/create_subscription', [SubscriptionCrudController::class,'create'])->name('admin_create_subscription')->middleware('auth');
    Route::post('/create_subscription', [SubscriptionCrudController::class,'store'])->name('admin_create_subscription')->middleware('auth');
    Route::get('/users_subscriptions', [UserSubscriptionsController::class,'index'])->name('admin_users_subscription')->middleware('auth');


    Route::get('/questions', [QuestionsCrudController::class,'index'])->name('questions_crud')->middleware('auth');
    Route::get('/create_questions', [QuestionsCrudController::class,'create'])->name('create_question')->middleware('auth');
    Route::post('/create_questions', [QuestionsCrudController::class,'store'])->name('create_question')->middleware('auth');
    Route::get('/question/delete/{id}', [QuestionsCrudController::class,'destroy'])->name('delete_question')->middleware('auth');
    
    Route::get('/question/delete_answer_from_question/{answer_id}', [QuestionsCrudController::class,'delete_answer_from_question'])->name('delete_answer_from_question')->middleware('auth');


    
    Route::get('/services', [ServicesCrudController::class,'index'])->name('services_crud')->middleware('auth');
    Route::get('/create_service', [ServicesCrudController::class,'create'])->name('create_service')->middleware('auth');
    Route::post('/create_service', [ServicesCrudController::class,'store'])->name('create_service')->middleware('auth');
    Route::get('/service/delete/{id}', [ServicesCrudController::class,'destroy'])->name('delete_service')->middleware('auth');
    Route::get('/service/view/{id}', [ServicesCrudController::class,'show'])->name('view_service')->middleware('auth');
    Route::get('/service/assign_question/{id}', [ServicesCrudController::class,'assign_question_to_service'])->name('assign_question_to_service')->middleware('auth');
    Route::get('/service/assign_question/delete_question/{id}', [ServicesCrudController::class,'destroy_question'])->name('destroy_assigned_question_to_service')->middleware('auth');
    Route::get('/service/view_question/{id}', [ServicesCrudController::class,'view_question'])->name('view_question')->middleware('auth');
    Route::get('/users_services', [UserOwnedServicesController::class,'index'])->name('admin_users_services')->middleware('auth');

    

    Route::get('/answers', [AnswersCrudController::class,'index'])->name('answers_crud')->middleware('auth');
    Route::get('/create_answer', [AnswersCrudController::class,'create'])->name('create_answer')->middleware('auth');
    Route::post('/create_answer', [AnswersCrudController::class,'store'])->name('create_answer')->middleware('auth');
    Route::get('/answer/delete/{id}', [AnswersCrudController::class,'destroy'])->name('delete_answer')->middleware('auth');

    Route::get('/files', [FilesController::class,'index'])->name('files')->middleware('auth');
    Route::post('/files', [FilesController::class,'store'])->name('add_file')->middleware('auth');
    Route::get('/files/delete/{id}', [FilesController::class,'destroy'])->name('delete_file')->middleware('auth');

    Route::get('/new_events', [AdminNewsEventsController::class,'index'])->name('admin_news_events')->middleware('auth');
    Route::post('/create_news_events', [AdminNewsEventsController::class,'store'])->name('create_news_events')->middleware('auth');
    Route::get('/create_news_events', [AdminNewsEventsController::class,'create'])->name('create_news_events')->middleware('auth');
    Route::get('/new_events/delete/{id}', [AdminNewsEventsController::class,'destroy'])->name('delete_news')->middleware('auth');

});



