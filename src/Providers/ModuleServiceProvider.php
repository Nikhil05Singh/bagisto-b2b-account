<?php
namespace Acme\B2BAccount\Providers;

use Konekt\Concord\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        \Acme\B2BAccount\Models\CompanyRole::class,
    ];
}