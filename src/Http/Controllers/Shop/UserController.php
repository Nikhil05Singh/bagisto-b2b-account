<?php
namespace Acme\B2BAccount\Http\Controllers\Shop;

use Illuminate\Http\Request;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Shop\Http\Controllers\Controller;
use Acme\B2BAccount\Repositories\CompanyRoleRepository;
use Acme\B2BAccount\DataGrids\Shop\UserDataGrid;

class UserController extends Controller
{
    public function __construct(
        protected CustomerRepository $customerRepository,
        protected CompanyRoleRepository $companyRoleRepository,
    ) {}

    public function index()
    {
        if (request()->ajax()) {
            return datagrid(UserDataGrid::class)->process();
        }
        return view('b2baccount::shop.users.index');
    }

    public function create()
    {
        return view('b2baccount::shop.users.create');
    }
}