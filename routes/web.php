<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLogin;


Route::namespace('Auth')->prefix('admin')->group(function () {
    Route::prefix('login')->group(function () {
        Route::get('/', "LoginController@index")->name("login.index");
        Route::post('handle-register', "LoginController@registerAdd")->name("login.register");
        Route::get('register-form', "LoginController@register")->name("authAdmin.register");
        Route::post('handle-login', "LoginController@handleLogin")->name("handleLogin");
        Route::get('show-register', "LoginController@showRegister")->name("login.showRegister");
        Route::get('add-register', "LoginController@registerAdd");
        Route::get('logout', "LoginController@logOut")->name("authAdmin.logout");
        Route::get('forget-password-index', 'ForgotPasswordController@showLinkRequestForm')->name('forget.index');
        Route::post('forget-password', 'ForgotPasswordController@sendResetLinkEmail')->name('forget-password');
        Route::get('reset-password-index/{token}', 'ResetPasswordController@showResetForm')->name('reset.index');
        Route::post('reset-password', 'ResetPasswordController@reset')->name('reset-password');

    });
});

Route::middleware([CheckLogin::class])->namespace('admin')->prefix('admin')->group(function () {
    Route::prefix('dashboad')->group(function () {
        Route::get('/home', "DashboadController@index")->name("dashboad.index");
    });
    Route::prefix('career')->group(function () {
        Route::get('index', "CareerController@index")->name("career.index");
        Route::post('store', "CareerController@store")->name("career.store");
        Route::get('edit/{id}', "CareerController@edit")->name("career.edit");
        Route::put('update/{id}', "CareerController@update")->name("career.update");
        Route::get('delete/{id}', "CareerController@delete")->name("career.delete");
    });
    Route::prefix('skill')->group(function () {
        Route::get('index', "SkillController@index")->name("skill.index");
        Route::post('store', "SkillController@store")->name("skill.store");
        Route::get('edit/{id}', "SkillController@edit")->name("skill.edit");
        Route::put('update/{id}', "SkillController@update")->name("skill.update");
        Route::get('delete/{id}', "SkillController@delete")->name("skill.delete");
    });
    Route::prefix('welfare')->group(function () {
        Route::get('index', "WelfareController@index")->name("welfare.index");
        Route::post('store', "WelfareController@store")->name("welfare.store");
        Route::get('edit/{id}', "WelfareController@edit")->name("welfare.edit");
        Route::put('update/{id}', "WelfareController@update")->name("welfare.update");
        Route::get('delete/{id}', "WelfareController@delete")->name("welfare.delete");
    });
    Route::prefix('attribute')->group(function () {
        Route::get('index', "AttributeController@index")->name("attribute.index");
    });
    Route::prefix('company')->group(function () {
        Route::get('index', "CompanyControllerer@index")->name("company.index");
        Route::get('delete-{id}', "CompanyControllerer@delete")->name("company.delete");
    });
    Route::resource('locations', LocationController::class)->names([
            'index' => 'location.index',
        ]);
    Route::prefix('users')->group(function () {
        Route::get('index', "UserController@index")->name("users.index");
        Route::get('delete-{id}', "UserController@delete")->name("users.delete");

    });
    Route::prefix('blog')->group(function () {
        Route::get('index', "BlogController@index")->name("blog.index");
        Route::get('show', "BlogController@show")->name("blog.show");
        Route::post('store', "BlogController@store")->name("blog.store");
        Route::get('edit-{id}', "BlogController@edit")->name("blog.edit");
        Route::put('update-{id}', "BlogController@update")->name("blog.update");
        Route::get('delete-{id}', "BlogController@delete")->name("blog.delete");

    });
});

Route::namespace('frontend')->group(function () {
    Route::get('/', "HomeController@index")->name("home.index");
    Route::get('/detail-post-{id}', "HomeController@detail")->name("home.detail");
    Route::get('/list-post', "ActionController@listPost")->name("action.listPost");
    Route::get('/life-it-post', "ActionController@lifeIT")->name("action.lifeIT");
    Route::get('/post-life-it-{id}', "ActionController@detailLifeIT")->name("action.detailLifeIT");
    Route::get('/search', "ActionController@search")->name("action.search");
    Route::get('/list-company', "ActionController@listCompany")->name("action.listCompany");
    Route::post('/store-apply-job', "HomeController@storeApplyJob")->name("home.storeApplyJob");
    Route::get('/select-form-register', "HomeController@selectLinkRegister")->name("home.selectLinkRegister");
    Route::get('/logout', "LoginController@logOut")->name("login.logOut");

    Route::prefix('/login')->group(function () {
        Route::get('/form', "LoginController@formLogin")->name("login.formLogin");
        Route::post('/check-login', "LoginController@checkLogin")->name("login.checkLogin");
    });
    Route::prefix('/register')->group(function () {
        Route::get('/candidate', "RegisterController@formCandidate")->name("register.formCandidate");
        Route::get('/recruiment', "RegisterController@formRecruiment")->name("register.formRecruiment");
        Route::post('/store-candidate', "RegisterController@storeCandidate")->name("register.storeCandidate");
        Route::post('/store-recruiment', "RegisterController@storeRecruiment")->name("register.storeRecruiment");
    });

    Route::middleware("checkRecruiment")->prefix('/recruiment')->group(function () {
        Route::get('/dashboard-{id}', "RecruimentController@index")->name("recruiment.dashboard");
        Route::get('/manage-post-{id}', "RecruimentController@managePost")->name("recruiment.managePost");
        Route::get('/manage-account-{id}', "RecruimentController@manageAccount")->name("recruiment.manageAccount");
        Route::get('/list-candidate', "RecruimentController@listCandidate")->name("recruiment.listCandidate");
        Route::get('/list-cv-submit', "RecruimentController@listCVSubmit")->name("recruiment.listCVSubmit");
        Route::get('/delete-cv-submit-{id}', "RecruimentController@deleteCVSubmit")->name("recruiment.deleteCVSubmit");


    });
    Route::middleware("checkRecruiment")->namespace("manageRecruiment")->group(function (){
        Route::prefix('/manage-account')->group(function () {
            Route::post('/store-account-{id}', "ManageAccountController@storeAccount")->name("ManageAccount.storeAccount");
            Route::post('/store-company-{id}', "ManageAccountController@storeCompany")->name("ManageAccount.storeCompany");
        });
        Route::prefix('/manage-candidate')->group(function () {
            Route::get('/detail-{id}', "ManageListCandidateController@detailProfile")->name("ManageCandidate.detailProfile");
        });
        Route::prefix('/manage-post')->group(function () {
            Route::get('/create-post', "ManagePostController@createPost")->name("ManagePost.createPost");
            Route::post('/store-post-{id}', "ManagePostController@store")->name("ManagePost.store");
            Route::get('/edit-post-{id}', "ManagePostController@edit")->name("ManagePost.edit");
            Route::put('/update-post-{id}', "ManagePostController@update")->name("ManagePost.update");
            Route::get('/delete-post-{id}', "ManagePostController@delete")->name("ManagePost.delete");
        });
        Route::prefix('/manage-cv-submit')->group(function () {
            Route::post('/accept-cv', "ManageCvSubmitController@acceptCV")->name("CvSubmit.acceptCV");
        });
    });
    Route::prefix('candidate')->group(function () {
        Route::get('/profile-{id}', "ProfileController@index")->name("profile.index");
        Route::post('/update-{id}', "ProfileController@save")->name("profile.save");
    });
    Route::middleware("checkCandidate")->prefix('/user')->group(function () {
        Route::post('/favorite', "ActionController@favorite")->name("user.favorite");
    });
});
