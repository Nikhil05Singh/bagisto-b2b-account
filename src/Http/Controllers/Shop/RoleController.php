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

    // This method catches the form data and saves the role
    public function store(Request $request)
    {
        $request->validate([
            'name'            => 'required|string|max:255',
            'description'     => 'required|string',
            'permission_type' => 'required|in:all,custom',
        ]);

        $data = $request->only(['name', 'description', 'permission_type']);
        $data['permissions'] = $request->has('permissions') ? $request->permissions : [];
        
        // Link the role to the main B2B customer creating it
        $data['customer_id'] = auth()->guard('customer')->user()->id;

        $this->companyRoleRepository->create($data);

        session()->flash('success', 'Role successfully created!');
        return redirect()->route('b2baccount.roles.index');
    }
}