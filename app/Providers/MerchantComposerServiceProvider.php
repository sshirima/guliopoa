<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 5/10/2018
 * Time: 8:26 PM
 */

namespace App\Providers;


use App\Http\ViewComposers\MerchantProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class MerchantComposerServiceProvider extends ServiceProvider
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
            [
                'merchants.pages.dashboard',
                'merchants.pages.products.index',
                'merchants.pages.products.create',
                'merchants.pages.products.options.edit',
                'merchants.pages.products.options.attributes',
                'merchants.pages.products.options.costs',
                'merchants.pages.products.options.show',
            ],
            MerchantProfileComposer::class
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