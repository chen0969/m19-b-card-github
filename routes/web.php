<?php

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

/* The following are the new pages made by broccoli, please merage the back-end deta into it, thanks */
// about us page
Route::get('about-us', 'AboutUsController@index');
Route::get('yizixue-faq', 'YizixueFaqController@index');
/* End of new pages */
// Route::get('/', 'FrontPageController@index');
Route::get('/', function () {
    return view('welcome');
});

Route::get('article-list/{user}', 'ArticleController@getAllArticle')->name('article-list');
Route::get('article/{article}', 'ArticleController@getArticle')->name('article');
Route::get('study-abroad', 'ArticleController@studyAbroad')->name('study-abroad');
Route::get('senior', 'SeniorController@index')->name('senior');
Route::any('line-pay/confirm', 'LinePayController@confirm')->name('line-pay-confirm');
Route::any('line-pay/cancel', 'LinePayController@cancel')->name('line-pay-cancel');
Route::get('membership-agreement', 'ContractController@membershipAgreement')->name('membership-agreement');
Route::get('service-agreement', 'ContractController@serviceAgreement')->name('service-agreement');
Route::get('disclaimer', 'ContractController@disclaimer')->name('disclaimer');
Route::get('subscription-agreement', 'ContractController@subscriptionAgreement')->name('subscription-agreement');
Route::get('privacy', 'ContractController@privacy')->name('privacy');

//line login
Route::get('/line', 'LoginController@pageLine');
Route::get('/callback/login', 'LoginController@lineLoginCallBack');

Route::get('qna', 'GuestQaController@index')->name('qna');
Route::get('qna/{id}', 'GuestQaController@show')->name('qna.show');


//LIKE
Route::get('like-user/{id}', 'LikeController@likeUser')->name('like-user');
Route::get('like-post/{id}', 'LikeController@likePost')->name('like-post');
//Collect
Route::get('collect-user/{id}', 'CollectController@collectUser')->name('collect-user');
Route::get('collect-post/{id}', 'CollectController@collectPost')->name('collect-post');
Route::get('collect-qa/{id}', 'CollectController@collectQa')->name('collect-qa');

//reference
Route::delete('reference-delete/{id}', 'UserController@referenceDelete')->name('reference-delete');
Route::get('reference-download/{id}', 'UserController@referenceDownload')->name('reference-download');


//meta login
Route::get('facebook-login', 'Auth\FacebookController@login')->name('facebook-login');
Route::any('facebook-callback', 'Auth\FacebookController@callback')->name('facebook-callback');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('introduction/{id}', 'IntroductionController@getDetial')->name('get-introduction');

//PostController
Route::group(['middleware' => ['auth', 'isEmailVerified']], function () {

    Route::get('/user/get', 'UserController@getAll')->name('user-get');
    Route::get('/user/collect-user', 'UserController@collect')->name('collect-user');
    Route::get('/user/skill', 'UserController@getUserBySkill');
    Route::get('/user/profile', 'UserController@profile')->name('profile');
    Route::post('/user/profile/update', 'UserController@update')->name('update-profile');
    Route::get('/user/profile/companies', 'UserController@getCompaniesArray');
    // the new code｀
    // Route for updating user profile
    Route::post('/user/profile/update-name', 'UserController@updateName')->name('update-name');
    Route::post('/user/profile/update-description', 'UserController@updateDescription')->name('update-description');
    Route::post('/user/profile/update-contact', 'UserController@updateContact')->name('update-contact');
    Route::post('/user/profile/update-bgColor', 'UserController@updateBgColor')->name('update-bgColor');
    Route::post('/user/profile/update-avatar', 'UserController@updateBgColor')->name('update-avatar');
    Route::post('/user/profile/update-banner', 'UserController@updateBgColor')->name('update-banner');
    // test
    Route::get('/user/profile/companies', 'UserController@getCompaniesArray');


    // end of user profile 

    Route::get('/bulletinboard', 'BulletinBoardController@index')->name('bulletinboard');
    Route::get('pay-product', 'PayProductController@index')->name('pay-product-list');
    Route::post('pay-product/{id}', 'PayProductController@store')->name('pay-product');
    Route::get('pay-order', 'PayOrderController@index')->name('pay-order-list');
    Route::get('university-list', 'UniversityController@index')->name('university-list');

    //ecpay
    Route::post('pay-product-ecpay/{id}', 'PayProductController@ecpayStore')->name('pay-product-ecpay');
});

//carousel
Route::get('carousel-list', 'CarouselController@list')->name('carousel-list');

// ecpay return
Route::any('ecpay-order-result', 'EcpayController@ecpayOrderResult')->name('ecpay-order-result');
Route::any('ecpay-return-url', 'EcpayController@ecpayReturn')->name('ecpay-return-url');

//Verify
Route::get('register/verify', 'Auth\RegisterController@verify')->name('verifyEmailLink');
Route::get('register/verify/resend', 'Auth\RegisterController@showResendVerificationEmailForm')->name('showResendVerificationEmailForm');
Route::post('register/verify/resend', 'Auth\RegisterController@resendVerificationEmail')->name('resendVerificationEmail');
