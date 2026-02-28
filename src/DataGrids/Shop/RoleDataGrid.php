<?php
namespace Acme\B2BAccount\DataGrids\Shop;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class RoleDataGrid extends DataGrid
{
    public function prepareQueryBuilder()
    {
        $companyId = auth()->guard('customer')->user()->id;
        return DB::table('company_roles')->select('id', 'name', 'permission_type')->where('customer_id', $companyId);
    }

    public function prepareColumns()
    {
        $this->addColumn(['index' => 'name', 'label' => 'Role Name', 'type' => 'string']);
        $this->addColumn(['index' => 'permission_type', 'label' => 'Permission Type', 'type' => 'string']);
    }
}