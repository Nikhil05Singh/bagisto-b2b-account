<?php
namespace Acme\B2BAccount\DataGrids\Shop;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class UserDataGrid extends DataGrid
{
    public function prepareQueryBuilder()
    {
        return DB::table('customers')->select('id', 'first_name', 'email')->where('type', 'user');
    }

    public function prepareColumns()
    {
        $this->addColumn(['index' => 'first_name', 'label' => 'First Name', 'type' => 'string']);
        $this->addColumn(['index' => 'email', 'label' => 'Email', 'type' => 'string']);
    }
}