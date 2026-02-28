<?php
namespace Acme\B2BAccount\Models;

use Illuminate\Database\Eloquent\Model;
use Acme\B2BAccount\Contracts\CompanyRole as CompanyRoleContract;
use Webkul\Customer\Models\CustomerProxy;

class CompanyRole extends Model implements CompanyRoleContract
{
    protected $table = 'company_roles';
    protected $fillable = ['name', 'description', 'permission_type', 'permissions', 'customer_id'];
    protected $casts = ['permissions' => 'array'];

    public function customer()
    {
        return $this->belongsTo(CustomerProxy::modelClass());
    }
}