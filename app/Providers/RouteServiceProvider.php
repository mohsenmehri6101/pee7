<?php

namespace App\Providers;

use App\Providers\Traits\RouteServiceProviderTrait;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    use RouteServiceProviderTrait;
    # namespaces ...
    protected $namespace = 'App\Http\Controllers';
    protected $namespaceAuth = 'App\Http\Controllers\Auth';
    protected $namespaceAdmin = 'App\Http\Controllers\Admin';
    protected $namespaceClerk = 'App\Http\Controllers\Clerk';
    protected $namespaceCompany = 'App\Http\Controllers\Company';
    protected $namespacePerson = 'App\Http\Controllers\Person';
    protected $namespaceSupplier = 'App\Http\Controllers\Supplier';
    protected $namespaceHome = 'App\Http\Controllers\Home';
    protected $namespaceCommon = 'App\Http\Controllers\Common';
    protected $namespaceTest = 'App\Http\Controllers\Test';
    # protected $namespaceAuth = 'App\Http\Controllers\Auth';

    public const HOME = '';

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        //
        # supplier
        $this->mapSupplierRoutes();

        # admin
        $this->mapAdminRoutes();

        # ajax
        $this->mapAjaxRoutes();

        # authentication
        $this->mapAuthenticationRoutes();

        # auth
        $this->mapAuthRoutes();

        # company
        $this->mapCompanyRoutes();

        # clerk
        $this->mapClerkRoutes();

        # person
        $this->mapPersonRoutes();

        # test
        $this->mapTestRoutes();

        # home
        $this->mapHomeRoutes();

        # common
        $this->mapCommonRoutes();
    }
}
