<?php
namespace App\Providers\Traits;

use Illuminate\Support\Facades\Route;

trait RouteServiceProviderTrait
{
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/web.php'));
    }

    protected function mapCommonRoutes()
    {
        Route::middleware(['web'])
            ->namespace($this->namespaceCommon)
            ->prefix('clerk')
            ->group(base_path('routes/web/common.php'));
    }

    protected function mapClerkRoutes()
    {
        Route::middleware(['web','auth','auth.activeUser','auth.clerk'])
            ->namespace($this->namespaceClerk)
            ->prefix('clerk')
            ->group(base_path('routes/web/clerk.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::middleware(['web','auth','auth.admin'])
            ->namespace($this->namespaceAdmin)
            ->prefix('admin')
            ->group(base_path('routes/web/admin.php'));
    }

    protected function mapAjaxRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->prefix('ajax')
            ->group(base_path('routes/web/ajax.php'));
    }

    protected function mapAuthenticationRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespaceAuth)
            ->group(base_path('routes/web/authentication.php'));
    }

    protected function mapCompanyRoutes()
    {
        Route::middleware(['web','auth','auth.activeUser','auth.company'])
            ->namespace($this->namespaceCompany)
            ->prefix('company')
            ->group(base_path('routes/web/company.php'));
    }

    protected function mapAuthRoutes()
    {
        Route::middleware(['web','auth'])
            ->prefix('auth')
            ->group(base_path('routes/web/auth.php'));
    }

    protected function mapPersonRoutes()
    {
        Route::middleware(['web','auth','auth.activeUser','auth.person'])
            ->namespace($this->namespacePerson)
            ->prefix('person')
            ->group(base_path('routes/web/person.php'));
    }

    protected function mapSupplierRoutes()
    {
        Route::middleware(['web','auth','auth.activeUser','auth.supplier'])
            ->namespace($this->namespaceSupplier)
            ->prefix('supplier')
            ->group(base_path('routes/web/supplier.php'));
    }

    protected function mapHomeRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespaceHome)
            ->group(base_path('routes/web/home.php'));
    }

    protected function mapTestRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespaceTest)
            ->prefix('test')
            ->group(base_path('routes/web/test.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/api.php'));
    }

}
