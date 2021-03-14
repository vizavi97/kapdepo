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
//
//Route::get('/', function () {
//    return view('welcome');
//});
Auth::routes(['register' => false]);

Route::group(['prefix' => 'web-api'], function () {
    Route::match(['get', 'post'], 'user-register', 'ApiController@register');
    Route::get('tasks-run', 'ApiController@TaskRun');
});
// PERSONAL CABINET

Route::get('test', 'HomeController@testXML');

Route::get('logout', 'UserController@logout')->name('logout');

Route::group(['prefix' => 'cabinet', 'middleware' => 'auth'], function () {
    Route::get('/', 'UserController@index')->name('cabinet.home');
    Route::match(['get', 'post'], 'change-password', 'UserController@changePass')->name('change.pass');

    Route::match(['get', 'post'], 'refill', 'UserController@refill')->name('refill');
    Route::match(['get', 'post'], 'refill-test', 'UserController@refillTest')->name('refill-test');

    Route::get('pnl', 'UserController@getPNL')->name('get.pnl');

});
Route::group(['middleware' => \App\Http\Middleware\ClearCache::class], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('setlocale/{locale}', 'HomeController@setLang')->name('lang');
//get branches for map
    Route::post('/branches', 'HomeController@branchesRequest')->name('branches.request');

//news
    Route::group(['prefix' => 'news'], function () {
        Route::get('/{category}', 'HomeController@getNews')->name('news.page');
        Route::get('{category}/{slug}', 'HomeController@getNewsItem')->name('news.item');

    });
// Our offers
    Route::get('our-offers', 'HomeController@getOffersPage')->name('offers.page');
// Partners
    Route::get('partners', 'HomeController@getPartnersPage')->name('partners.page');
// CONTACTS
    Route::get('contacts', 'HomeController@getContactsPage')->name('contacts.page');
//  Compliance
    Route::get('compliance', 'HomeController@getCompliancePage')->name('compliance.page');
// Appeal
    Route::get('appeal', 'HomeController@getAppealPage')->name('appeal.page');
//disclosure
    Route::get('info-disclosure', 'HomeController@getDisclosurePage')->name('disclosure.page');
// About-us
//Route::get('about-us', 'HomeController@getAbout')->name('about');
    Route::group(['prefix' => 'about-us'], function () {
        Route::get('/', 'HomeController@getAbout')->name('about.page');
        Route::get('leadership', 'HomeController@getTeamPage')->name('team.page');
        Route::get('resume', 'HomeController@getResumePage')->name('team.resume');
    });
//private
    Route::group(['prefix' => 'private'], function () {
        Route::get('/', 'HomeController@getPrivate')->name('private.page');
        Route::get('stocks', 'HomeController@getPrivateStocks')->name('private.stocks.page');
        Route::get('stocks-data', 'HomeController@getPrivateStocksData')->name('private.stocks.data');
        Route::get('bonds', 'HomeController@getPrivateBonds')->name('private.bonds.page');
        Route::get('start-trading', 'HomeController@getPrivateTrade')->name('private.trade.page');
    });
//corporate
    Route::group(['prefix' => 'corporate'], function () {
        Route::get('/', 'HomeController@getCorporate')->name('corporate.page');
    });
//kd-ideas

});

Route::group(['prefix' => 'kd-ideas'], function () {
    Route::get('/', 'HomeController@getKd')->name('kd.page');


    Route::get('index', 'HomeController@getKdIndex')->name('kd.index');
    Route::post('get-index', 'HomeController@getKdIndexData')->name('kd.index-data');

});

// Market data

Route::group(['prefix' => 'market-data'], function () {
    Route::get('/', 'HomeController@getMarketData')->name('market.page');

    Route::post('/market-json/{id}', 'HomeController@getMarketDataJson')->name('market-json.page');
    Route::post('/market-company-json/{id}', 'HomeController@getMarketCompanyJson')->name('market-company-json.page');
    Route::post('/market-company-preference-json/{id}', 'HomeController@getMarketCompanyPrefJson')->name('market-company-prefer-json.page');
    Route::get('/market-json', 'HomeController@getMarketDataJsonGet')->name('market-json.pageget');

    Route::get('{issuer}/company', 'HomeController@getMarketCompany')->name('market.company');
    Route::get('{issuer}/balance', 'HomeController@getMarketBalance')->name('market.balance');
    Route::get('{issuer}/financial', 'HomeController@getMarketFinancial')->name('market.financial');
    Route::get('{issuer}/analysis', 'HomeController@getMarketAnalysis')->name('market.analysis');
    Route::get('{issuer}/profile', 'HomeController@getMarketProfile')->name('market.profile');
});

// open account
Route::group(['prefix' => 'open-account'], function () {
    Route::get('/', 'HomeController@getOpenAccount')->name('open.account');
    Route::get('/{type}', 'HomeController@getOpenAccount')->name('open.account.type');
});

// TIM

Route::group(["prefix" => 'tim', "middleware" => \App\Http\Middleware\ClearCache::class], function () {
    Route::get('/faq', 'Tim\FaqController@get');
    Route::post('/create-comment', "CommentController@createComment")->name('create-comment');
});

// FOR ADMIN

Route::group(['middleware' => ['admin', \App\Http\Middleware\ClearCache::class], 'prefix' => 'admin',], function () {
    Route::get('/', 'Admin\AdminController@index')->name('admin.home');


//  STATISTIC
    Route::match(['get', 'post'], 'statistics', 'Admin\AdminController@getStats')->name('stat.edit');
    Route::get('test', 'Admin\AdminController@getXml')->name('stat.update');

// SEO
    Route::group([
        'prefix' => 'seo'
    ], function () {
        Route::get('/', 'Admin\AdminController@SeoList')->name('seo.list');
        Route::match(['get', 'post'], 'create', 'Admin\AdminController@SeoCreate')->name('seo.create');
    });

//    SETTINGS

    Route::group([
        'prefix' => 'settings'
    ], function () {
        Route::match(['get', 'post'], '/', 'Admin\AdminController@settings')->name('settings');
    });
//    USERS
    Route::group([
        'prefix' => 'users'
    ], function () {
        Route::get('/', 'UserController@list')->name('users.list');
        Route::match(['get', 'post'], 'create', 'UserController@create')->name('users.create');
        Route::match(['get', 'post'], 'edit/{id}', 'UserController@edit')->name('users.edit');

        Route::get('stocks', 'UserController@stocksList')->name('users.stocks.list');
        Route::get('stocks-update', 'UserController@stocksListUpdateLink')->name('users.stocks.list.update');
        Route::get('stocks-delete/{id}', 'UserController@stocksDelete')->name('users.stocks.delete');
        Route::match(['get', 'post'], 'stocks-add', 'UserController@stocksAdd')->name('users.stocks.add');
        Route::match(['get', 'post'], 'stocks-edit/{id}', 'UserController@stocksEdit')->name('users.stocks.edit');


        Route::get('import-list', 'UserController@importList')->name('users.import.list');
        Route::get('import/delete/{id}', 'UserController@importDelete')->name('users.import.delete');
        Route::match(['get', 'post'], 'import-page', 'UserController@importData')->name('users.import.data');
    });
//     MENU
    Route::group([
        'prefix' => 'menu'
    ], function () {

        Route::get('/', 'Admin\MenuController@list')->name('menu.list');
        Route::get('lang/{lang}', 'Admin\MenuController@list')->name('menu.list.lang');
        Route::post('order', 'Admin\MenuController@order')->name('menu.order');
        Route::match(['get', 'post'], 'create', 'Admin\MenuController@create')->name('menu.create');
        Route::match(['get', 'post'], 'edit/{id}', 'Admin\MenuController@edit')->name('menu.edit');
        Route::get('delete/{id}', 'Admin\MenuController@delete')->name('menu.delete');

    });
//    KD - INDEX
    Route::group([
        'prefix' => 'kd-index'
    ], function () {

        Route::get('/', 'Admin\KdController@list')->name('stocks.list');
        Route::match(['get', 'post'], 'create', 'Admin\KdController@create')->name('stocks.create');
        Route::match(['get', 'post'], 'edit/{id}', 'Admin\KdController@edit')->name('stocks.edit');
        Route::match(['get', 'post'], 'translate/{id}/{lang}', 'Admin\KdController@translate')->name('stocks.trans');
        Route::get('delete/{id}', 'Admin\KdController@delete')->name('stocks.delete');

        Route::get('test', 'Admin\KdController@test')->name('stocks.test');

    });
//    KD - Analytics
    Route::group([
        'prefix' => 'kd-analytics'
    ], function () {

        Route::get('/', 'Admin\KdController@listAnalytics')->name('analytics.list');
        Route::match(['get', 'post'], 'create', 'Admin\KdController@createAnalytics')->name('analytics.create');
        Route::match(['get', 'post'], 'edit/{id}', 'Admin\KdController@editAnalytics')->name('analytics.edit');
        Route::match(['get', 'post'], 'translate/{id}/{lang}', 'Admin\KdController@translateAnalytics')->name('analytics.trans');
        Route::get('delete/{id}', 'Admin\KdController@deleteAnalytics')->name('analytics.delete');

    });
//    BANNER
    Route::group([
        'prefix' => 'banner'
    ], function () {

        Route::get('/', 'Admin\BannerController@list')->name('banner.list');
        Route::match(['get', 'post'], 'create', 'Admin\BannerController@create')->name('banner.create');
        Route::match(['get', 'post'], 'edit/{id}', 'Admin\BannerController@edit')->name('banner.edit');
        Route::match(['get', 'post'], 'translate/{id}/{lang}', 'Admin\BannerController@translate')->name('banner.trans');
        Route::get('delete/{id}', 'Admin\BannerController@delete')->name('banner.delete');

    });
//    Tariffs
    Route::group([
        'prefix' => 'tariff'
    ], function () {

        Route::get('/', 'Admin\TariffController@list')->name('tariff.list');
        Route::match(['get', 'post'], 'create', 'Admin\TariffController@create')->name('tariff.create');
        Route::match(['get', 'post'], 'edit/{id}', 'Admin\TariffController@edit')->name('tariff.edit');
        Route::match(['get', 'post'], 'translate/{id}/{lang}', 'Admin\TariffController@translate')->name('tariff.trans');
        Route::get('delete/{id}', 'Admin\TariffController@delete')->name('tariff.delete');

    });
//    News
    Route::group([
        'prefix' => 'news'
    ], function () {

        Route::get('/', 'Admin\NewsController@list')->name('new.list');
        Route::match(['get', 'post'], 'create', 'Admin\NewsController@create')->name('new.create');
        Route::match(['get', 'post'], 'edit/{id}', 'Admin\NewsController@edit')->name('new.edit');
        Route::match(['get', 'post'], 'translate/{id}/{lang}', 'Admin\NewsController@translate')->name('new.trans');
        Route::get('delete/{id}', 'Admin\NewsController@delete')->name('new.delete');

    });


//    Branches
    Route::group([
        'prefix' => 'branches'
    ], function () {

        Route::get('/', 'Admin\BranchController@list')->name('branches.list');
        Route::match(['get', 'post'], 'create', 'Admin\BranchController@create')->name('branches.create');
        Route::match(['get', 'post'], 'edit/{id}', 'Admin\BranchController@edit')->name('branches.edit');
        Route::match(['get', 'post'], 'translate/{id}/{lang}', 'Admin\BranchController@translate')->name('branches.trans');
        Route::get('delete/{id}', 'Admin\BranchController@delete')->name('branches.delete');

    });
//    Partners
    Route::group([
        'prefix' => 'partners'
    ], function () {

        Route::get('/', 'Admin\PartnerController@list')->name('partners.list');
        Route::match(['get', 'post'], 'create', 'Admin\PartnerController@create')->name('partners.create');
        Route::match(['get', 'post'], 'edit/{id}', 'Admin\PartnerController@edit')->name('partners.edit');
        Route::match(['get', 'post'], 'translate/{id}/{lang}', 'Admin\PartnerController@translate')->name('partners.trans');
        Route::get('delete/{id}', 'Admin\PartnerController@delete')->name('partners.delete');

    });
//    Team
    Route::group([
        'prefix' => 'team'
    ], function () {

        Route::get('/', 'Admin\TeamController@list')->name('team.list');
        Route::match(['get', 'post'], 'create', 'Admin\TeamController@create')->name('team.create');
        Route::match(['get', 'post'], 'edit/{id}', 'Admin\TeamController@edit')->name('team.edit');
        Route::match(['get', 'post'], 'translate/{id}/{lang}', 'Admin\TeamController@translate')->name('team.trans');
        Route::get('delete/{id}', 'Admin\TeamController@delete')->name('team.delete');

    });

    Route::group([
        'prefix' => 'history'
    ], function () {

        Route::get('/', 'Admin\HistoryController@list')->name('history.list');
        Route::match(['get', 'post'], 'create', 'Admin\HistoryController@create')->name('history.create');
        Route::match(['get', 'post'], 'edit/{id}', 'Admin\HistoryController@edit')->name('history.edit');
        Route::match(['get', 'post'], 'translate/{id}/{lang}', 'Admin\HistoryController@translate')->name('history.trans');
        Route::get('delete/{id}', 'Admin\HistoryController@delete')->name('history.delete');

    });

    Route::group([
        'prefix' => 'certificates'
    ], function () {

        Route::get('/', 'Admin\CertificateController@list')->name('certificates.list');
        Route::match(['get', 'post'], 'create', 'Admin\CertificateController@create')->name('certificates.create');
        Route::match(['get', 'post'], 'edit/{id}', 'Admin\CertificateController@edit')->name('certificates.edit');
        Route::get('delete/{id}', 'Admin\CertificateController@delete')->name('certificates.delete');

    });

    Route::group([
        'prefix' => 'achievements'
    ], function () {

        Route::get('/', 'Admin\AchievController@list')->name('achiev.list');
        Route::match(['get', 'post'], 'create', 'Admin\AchievController@create')->name('achiev.create');
        Route::match(['get', 'post'], 'edit/{id}', 'Admin\AchievController@edit')->name('achiev.edit');
        Route::get('delete/{id}', 'Admin\AchievController@delete')->name('achiev.delete');

    });

    //    MARKET DATA
    Route::group(['prefix' => 'data'], function () {
        Route::get('/', 'Admin\DataController@listData')->name('data.list');
        Route::get('delete/{id}', 'Admin\DataController@deleteData')->name('data.delete');
        Route::post('create-single', 'Admin\DataController@createDataSingle')->name('data.create.single');
//        Route::match(['get', 'post'], 'edit/{id}', 'Admin\DataController@edit')->name('data.edit');
//        Route::get('delete/{id}', 'Admin\DataController@delete')->name('data.delete');


//      Finance
        Route::get('reports-list', 'Admin\DataController@getReports')->name('report.list');
        Route::match(['get', 'post'], 'report/create', 'Admin\DataController@createReport')->name('report.create');
        Route::match(['get', 'post'], 'report/edit/{id}', 'Admin\DataController@editReport')->name('report.edit');
        Route::get('report/delete/{id}', 'Admin\DataController@deleteReport')->name('report.delete');


//        Company
        Route::get('companies', 'Admin\DataController@listCompany')->name('data.list.comp');
        Route::match(['get', 'post'], 'company-create', 'Admin\DataController@createCompany')->name('data.create.comp');
        Route::match(['get', 'post'], 'company-edit/{id}', 'Admin\DataController@editCompany')->name('data.edit.comp');
        Route::match(['get', 'post'], 'company-translate/{id}/{lang}', 'Admin\DataController@translateCompany')->name('data.trans.comp');
        Route::get('delete/companies/{id}', 'Admin\DataController@deleteCompany')->name('data.delete.comp');
        Route::post('info/{id}', 'Admin\DataController@changeCompanyDetail')->name('data.change.detail');


//        Key Executives
        Route::get('key', 'Admin\DataController@listKey')->name('data.list.key');
        Route::match(['get', 'post'], 'key-create', 'Admin\DataController@createKey')->name('data.create.key');
        Route::match(['get', 'post'], 'key-edit/{id}', 'Admin\DataController@editKey')->name('data.edit.key');
        Route::match(['get', 'post'], 'key-translate/{id}/{lang}', 'Admin\DataController@translateKey')->name('data.trans.key');
        Route::get('delete/keys/{id}', 'Admin\DataController@deleteKey')->name('data.delete.key');


//        Analysis
        Route::get('analysis', 'Admin\DataController@listAnalysis')->name('data.list.analysis');
        Route::match(['get', 'post'], 'analysis-create', 'Admin\DataController@createAnalysis')->name('data.create.analysis');
        Route::match(['get', 'post'], 'analysis-edit/{id}', 'Admin\DataController@editAnalysis')->name('data.edit.analysis');
        Route::match(['get', 'post'], 'analysis-translate/{id}/{lang}', 'Admin\DataController@translateAnalysis')->name('data.trans.analysis');
        Route::get('delete/analysis/{id}', 'Admin\DataController@deleteAnalysis')->name('data.delete.analysis');


    });

    Route::group(['prefix' => 'bonds'], function () {
        Route::get('/', 'Admin\BondController@list')->name('bonds.list');
        Route::match(['get', 'post'], 'create', 'Admin\BondController@create')->name('bonds.create');
        Route::match(['get', 'post'], 'edit/{id}', 'Admin\BondController@edit')->name('bonds.edit');
        Route::match(['get', 'post'], 'translate/{id}/{lang}', 'Admin\BondController@translate')->name('bonds.translate');
        Route::get('delete/{id}', 'Admin\BondController@delete')->name('bonds.delete');
    });
    Route::group(['prefix' => 'dividend'], function () {
        Route::get('/', 'Admin\DividendController@list')->name('dividend.list');
        Route::match(['get', 'post'], 'create', 'Admin\DividendController@create')->name('dividend.create');
        Route::match(['get', 'post'], 'edit/{id}', 'Admin\DividendController@edit')->name('dividend.edit');
        Route::get('delete/{id}', 'Admin\DividendController@delete')->name('dividend.delete');
    });

    //TIM
    Route::group(['prefix' => 'faq'], function () {
        Route::get('/', 'Tim\FaqController@list')->name('faq.list');
        Route::match(['get', 'post'], 'edit/{id}', 'Tim\FaqController@edit')->name('faq.edit');
        Route::match(['get', 'post'], 'create', 'Tim\FaqController@create')->name('faq.create');
        Route::post('delete/{id}', "Tim\FaqController@delete")->name('faq.delete');
    });
    Route::group(['prefix' => 'comments'], function () {
        Route::get('/', 'CommentController@list')->name('comments.list');
        Route::post('delete/{id}', "CommentController@delete")->name('comments.delete');
    });
    Route::group(['prefix' => 'start-trading'], function () {
        Route::get('/', 'Tim\StartTradingStepsController@list')->name('start-trading.list');
        Route::match(['get', 'post'], 'create', 'Tim\StartTradingStepsController@create')->name('start-trading.create');
        Route::match(['get', 'post'], 'edit/{id}', 'Tim\StartTradingStepsController@edit')->name('start-trading.edit');
        Route::post('delete/{id}', "Tim\StartTradingStepsController@delete")->name('start-trading.delete');
    });
    Route::group(['prefix' => "company-data", 'middleware' => \App\Http\Middleware\ClearCache::class], function () {
        Route::get('/', "Tim\StaticPageController@getCompanyPageInformation")->name('company-data-page');
    });
    Route::group(['prefix' => 'api'], function () {
        route::group(["prefix" => "company-data"], function () {
            Route::get('/', "Tim\ApiController@getCompanyData");
            route::post('/', "Tim\CompanyDataApiController@create");
            route::get('/list', "Tim\CompanyDataApiController@list");
            Route::post('/delete', "Tim\CompanyDataApiController@delete");
            Route::post('/update', "Tim\CompanyDataApiController@update");
        });
    });
});
Route::group(["prefix" => "api", "middleware" => \App\Http\Middleware\ClearCache::class], function () {
    Route::get('/market-data', "Tim\ApiController@getMarketData");
});
