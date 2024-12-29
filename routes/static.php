<?php
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DirController;
use App\Http\Controllers\EnquireController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\RefpageController;




Route::get('/', [FrontEndController::class, 'index']);
Route::get('/contact', [FrontEndController::class, 'contact']);
Route::post('/contact', [ContactController::class,'store']);


Route::get('/services', [FrontEndController::class, 'services']);
Route::get('/services2', [FrontEndController::class, 'services2']);
Route::get('/about-us', [FrontEndController::class, 'about']);
Route::get('/cms/our-team', [FrontEndController::class, 'our_team']);
Route::get('/career-at-rafusoft', [FrontEndController::class, 'career']);
Route::post('/career-at-rafusoft', [CareerController::class, 'store']);


Route::get('/cms/gallery', [FrontEndController::class, 'gallery']);
Route::get('/industrial-attachment', [FrontEndController::class, 'industrial_attachment']);
Route::get('/software-outsourcing-company-mobile-apps-games', [FrontEndController::class, 'software_outsourcing_company_mobile_apps_games']);
Route::get('/rafusoft-software-development-company', [FrontEndController::class, 'rafusoft_software_development_company']);
Route::get('/web-development-service-lead-outsourcing', [FrontEndController::class, 'web_development_service_lead_outsourcing']);
Route::get('/graphic-design', [FrontEndController::class, 'graphic_design']);
Route::get('/offshore-development-center-services', [FrontEndController::class, 'offshore_development_center_services']);
Route::get('/companies', [FrontEndController::class, 'companies']);
Route::get('/resource', [FrontEndController::class, 'resources']);
Route::get('/others', [FrontEndController::class, 'others']);
Route::get('/it-solution-dinajpur', [FrontEndController::class, 'it_solution_dinajpur']);
Route::get('/javascript-jquery-training-in-dinajpur', [FrontEndController::class, 'javascript_jquery_training_in_dinajpur']);
Route::get('/php-training-in-dinajpur', [FrontEndController::class, 'php_training_in_dinajpur']);
Route::get('/web-designing-training-in-dinajpur', [FrontEndController::class, 'web_designing_training_in_dinajpur']);
Route::get('/android-training-in-dinajpur', [FrontEndController::class, 'android_training_in_dinajpur']);
Route::get('/java-training-in-dinajpur', [FrontEndController::class, 'java_training_in_dinajpur']);
Route::get('/microsoft-dot-net-training-in-dinajpur', [FrontEndController::class, 'microsoft_dot_net_training_in_dinajpur']);
Route::get('/digital-marketing-training-in-dinajpur', [FrontEndController::class, 'digital_marketing_training_in_dinajpur']);
Route::get('/webtv', [FrontEndController::class, 'webtv']);
Route::get('/cobra-internet-alert', [FrontEndController::class, 'cobra_internet_alert']);

Route::get('/top-most-software-company-in-bangladesh', [FrontEndController::class, 'top_software_company']);
Route::get('/training', [FrontEndController::class, 'training']);
Route::get('/cms/cobra-antivirus-sdk', [FrontEndController::class, 'cobra_antivirus_sdk']);
Route::get('/cms/cobra-antivirus', [FrontEndController::class, 'cobra_antivirus']);




// dir ref


Route::get('/ref/{slug}', [RefpageController::class, 'view']);
Route::get('/dir/{slug}', [DirController::class, 'view']);
Route::post('/dir/{slug}', [EnquireController::class, 'store_enquire']);

// html withoutlayout 



Route::get('/invoices', [FrontEndController::class, 'invoice']);