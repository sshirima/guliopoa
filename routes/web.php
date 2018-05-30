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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admins', function () {
    return view('admins.pages.auth.register');
});

Route::prefix('user')->group(function () {

});

Route::prefix('admin')->group(function () {
    Route::get('/', 'Admins\AdminController@dashboard')->name('admin.home');
    // Authentication Routes...
    Route::get('login', 'Admins\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admins\Auth\LoginController@login')->name('admin.login');
    Route::get('logout', 'Admins\Auth\LoginController@logout')->name('admin.logout');

    // Registration Routes...
    Route::get('register', 'Admins\Auth\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('register', 'Admins\Auth\RegisterController@register')->name('admin.register.submit');

    //Admin accounts routes
    Route::get('accounts/admins', 'Admins\Accounts\AdminsAccountController@index')->name('admin.admin_accounts.index');
    Route::get('accounts/admins/create', 'Admins\Accounts\AdminsAccountController@create')->name('admin.admin_accounts.create');
    Route::post('accounts/admins', 'Admins\Accounts\AdminsAccountController@store')->name('admin.admin_accounts.store');
    Route::get('accounts/admins/{id}/edit', 'Admins\Accounts\AdminsAccountController@edit')->name('admin.admin_accounts.edit');
    Route::put('accounts/admins/{id}', 'Admins\Accounts\AdminsAccountController@update')->name('admin.admin_accounts.update');
    Route::delete('accounts/admins/{id}', 'Admins\Accounts\AdminsAccountController@destroy')->name('admin.admin_accounts.destroy');
    //Locations routes CRUD
    Route::resource('locations', 'Admins\LocationController')->names([
        'index' => 'admin.locations.index',
        'create' => 'admin.locations.create',
        'store' => 'admin.locations.store',
        'update' => 'admin.locations.update',
        'show' => 'admin.locations.show',
        'edit' => 'admin.locations.edit',
        'destroy' => 'admin.locations.destroy',
    ]);
    //Categories routes CRUD
    Route::resource('categories', 'Admins\CategoryController')->names([
        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'update' => 'admin.categories.update',
        'show' => 'admin.categories.show',
        'edit' => 'admin.categories.edit',
        'destroy' => 'admin.categories.destroy',
    ]);
    //Currency routes CRUD
    Route::resource('currencies', 'Admins\CurrencyController')->names([
        'index' => 'admin.currencies.index',
        'create' => 'admin.currencies.create',
        'store' => 'admin.currencies.store',
        'update' => 'admin.currencies.update',
        'show' => 'admin.currencies.show',
        'edit' => 'admin.currencies.edit',
        'destroy' => 'admin.currencies.destroy',
    ]);

    //Seller groups routes CRUD
    Route::resource('seller_groups', 'Admins\SellerGroupController')->names([
        'index' => 'admin.seller_groups.index',
        'create' => 'admin.seller_groups.create',
        'store' => 'admin.seller_groups.store',
        'update' => 'admin.seller_groups.update',
        'show' => 'admin.seller_groups.show',
        'edit' => 'admin.seller_groups.edit',
        'destroy' => 'admin.seller_groups.destroy',
    ]);

    //Sellers routes CRUD
    Route::resource('sellers', 'Admins\SellerController')->names([
        'index' => 'admin.sellers.index',
        'create' => 'admin.sellers.create',
        'store' => 'admin.sellers.store',
        'update' => 'admin.sellers.update',
        'show' => 'admin.sellers.show',
        'edit' => 'admin.sellers.edit',
        'destroy' => 'admin.sellers.destroy',
    ]);

    //Product attributes routes CRUD
    Route::resource('product_attributes', 'Admins\ProductAttributeController')->names([
        'index' => 'admin.product_attributes.index',
        'create' => 'admin.product_attributes.create',
        'store' => 'admin.product_attributes.store',
        'update' => 'admin.product_attributes.update',
        'show' => 'admin.product_attributes.show',
        'edit' => 'admin.product_attributes.edit',
        'destroy' => 'admin.product_attributes.destroy',
    ]);

    //Price decision routes CRUD
    Route::resource('price_decisions', 'Admins\PriceDecisionController')->names([
        'index' => 'admin.price_decisions.index',
        'create' => 'admin.price_decisions.create',
        'store' => 'admin.price_decisions.store',
        'update' => 'admin.price_decisions.update',
        'show' => 'admin.price_decisions.show',
        'edit' => 'admin.price_decisions.edit',
        'destroy' => 'admin.price_decisions.destroy',
    ]);

    //Merchant account CRUD routes
    Route::resource('merchant_accounts', 'Admins\Accounts\MerchantsAccountController')->names([
        'index' => 'admin.merchant_accounts.index',
        'create' => 'admin.merchant_accounts.create',
        'store' => 'admin.merchant_accounts.store',
        'update' => 'admin.merchant_accounts.update',
        'show' => 'admin.merchant_accounts.show',
        'edit' => 'admin.merchant_accounts.edit',
        'destroy' => 'admin.merchant_accounts.destroy',
    ]);

    //Sub categories CRUD routes
    Route::resource('sub_categories', 'Admins\SubCategoryController')->names([
        'index' => 'admin.sub_categories.index',
        'create' => 'admin.sub_categories.create',
        'store' => 'admin.sub_categories.store',
        'update' => 'admin.sub_categories.update',
        'show' => 'admin.sub_categories.show',
        'edit' => 'admin.sub_categories.edit',
        'destroy' => 'admin.sub_categories.destroy',
    ]);

});

Route::prefix('merchant')->group(function () {
    Route::get('/', 'Merchants\MerchantController@dashboard')->name('merchant.home');
    // Authentication Routes...
    Route::get('login', 'Merchants\Auth\LoginController@showLoginForm')->name('merchant.login');
    Route::post('login', 'Merchants\Auth\LoginController@login')->name('merchant.login');
    Route::get('logout', 'Merchants\Auth\LoginController@logout')->name('merchant.logout');

    // Registration Routes...
    Route::get('register', 'Merchants\Auth\RegisterController@showRegistrationForm')->name('merchant.register');
    Route::post('register', 'Merchants\Auth\RegisterController@register')->name('merchant.register.submit');

    //Sub categories CRUD routes
    Route::resource('products', 'Merchants\ProductController')->names([
        'index' => 'merchant.products.index',
        'create' => 'merchant.products.create',
        'store' => 'merchant.products.store',
        'update' => 'merchant.products.update',
        'edit' => 'merchant.products.edit',
        'destroy' => 'merchant.products.destroy',
    ])->except(['show']);

    Route::get('products/{id}/show', 'Merchants\ProductController@show')->name('merchant.products.show');
    Route::get('products/{id}/attributes', 'Merchants\Products\AttributeController@show')->name('merchant.products.attributes');
    Route::post('products/{id}/attributes', 'Merchants\Products\AttributeController@store')->name('merchant.products.attributes.store');
    Route::get('products/{id}/cost', 'Merchants\Products\CostController@show')->name('merchant.products.costs');
    Route::post('products/{id}/cost', 'Merchants\Products\CostController@store')->name('merchant.products.costs.store');

    //Update product controller
    Route::put('products/{id}/update/title', 'Merchants\Products\UpdateProductController@updateTitle')->name('merchant.products.update_title');
    Route::put('products/{id}/update/description', 'Merchants\Products\UpdateProductController@updateDescription')->name('merchant.products.update_title');
    Route::delete('products/{id}/delete/image', 'Merchants\Products\UpdateProductController@deleteImage')->name('merchant.products.update_title');
    Route::put('products/{id}/update/images', 'Merchants\Products\UpdateProductController@updateImages')->name('merchant.products.update_images');
});
