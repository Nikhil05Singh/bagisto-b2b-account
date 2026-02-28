<?php
namespace Acme\B2BAccount\Http\Controllers\Shop;

use Illuminate\Http\Request;
use Webkul\Shop\Http\Controllers\Controller;
use Acme\B2BAccount\Repositories\CompanyRoleRepository;
use Acme\B2BAccount\DataGrids\Shop\RoleDataGrid;

class RoleController extends Controller
{
    public function __construct(
        protected CompanyRoleRepository $companyRoleRepository,
    ) {}

    public function index()
    {
        if (request()->ajax()) {
            return datagrid(RoleDataGrid::class)->process();
        }
        return view('b2baccount::shop.roles.index');
    }

    public function create()
    {
        return view('b2baccount::shop.roles.create');
    }
}