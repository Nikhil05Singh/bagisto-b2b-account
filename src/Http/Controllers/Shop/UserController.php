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
        $customer = auth()->guard('customer')->user();
        $roles = $this->companyRoleRepository->findWhere(['customer_id' => $customer->id]);
        
        return view('b2baccount::shop.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name'      => 'required',
            'last_name'       => 'required',
            'email'           => 'required|email|unique:customers,email',
            'phone'           => 'required',
            'gender'          => 'required|in:Male,Female,Other',
            'company_role_id' => 'required',
        ]);

        // 1. Only grab the standard Bagisto fields first to bypass mass-assignment protection
        $data = $request->only(['first_name', 'last_name', 'email', 'phone', 'gender']);
        
        // Auto-generate a secure background password
        $data['password'] = bcrypt(rand(100000, 99999999));
        
        // Assign to default customer group (usually ID 2)
        $data['customer_group_id'] = 2; 
        $data['channel_id'] = core()->getCurrentChannel()->id;

        // 2. Create the base customer
        $customer = $this->customerRepository->create($data);

        // 3. FORCE update the custom B2B columns so Laravel saves them to the database
        $customer->type = 'user';
        $customer->company_role_id = $request->input('company_role_id');
        $customer->status = $request->has('status') ? 1 : 0;
        $customer->is_suspended = 0;
        $customer->save();

        session()->flash('success', 'User successfully created!');
        return redirect()->route('b2baccount.users.index');
    }
}