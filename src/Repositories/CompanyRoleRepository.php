<?php
namespace Acme\B2BAccount\Repositories;

use Webkul\Core\Eloquent\Repository;

class CompanyRoleRepository extends Repository
{
    public function model(): string
    {
        return 'Acme\B2BAccount\Contracts\CompanyRole';
    }

    public function countCustomersWithAllAccess(): int
    {
        return $this->model->where('permission_type', 'all')->count();
    }
}