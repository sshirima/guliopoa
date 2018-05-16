<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 5/10/2018
 * Time: 8:26 PM
 */

namespace App\Providers;


use App\Http\ViewComposers\ProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer(
            ['admins.pages.dashboard',
                'admins.pages.accounts.admin.index',
                'admins.pages.accounts.admin.create',
                'admins.pages.accounts.admin.edit',
                'admins.pages.locations.index',
                'admins.pages.locations.edit',
                'admins.pages.locations.create',
                'admins.pages.categories.index',
                'admins.pages.categories.create',
                'admins.pages.categories.edit',
                'admins.pages.sub_categories.index',
                'admins.pages.sub_categories.edit',
                'admins.pages.sub_categories.create',
                'admins.pages.sub_categories.index',
                'admins.pages.seller_groups.index',
                'admins.pages.seller_groups.edit',
                'admins.pages.seller_groups.create',
                'admins.pages.currencies.index',
                'admins.pages.currencies.edit',
                'admins.pages.currencies.create',
                'admins.pages.sellers.index',
                'admins.pages.sellers.create',
                'admins.pages.sellers.edit',
                'admins.pages.price_decisions.index',
                'admins.pages.price_decisions.edit',
                'admins.pages.price_decisions.create',
                'admins.pages.product_attributes.index',
                'admins.pages.product_attributes.edit',
                'admins.pages.product_attributes.create',
                'admins.pages.accounts.merchants.index',
            ],
            ProfileComposer::class
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}