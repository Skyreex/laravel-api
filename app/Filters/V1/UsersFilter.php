<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class UsersFilter extends ApiFilter
{
    protected $allowedFilters = [
        'name' => ['like'],
        'email' => ['like'],
        'createdAt' => ['gte', 'lte', 'gt', 'lt', 'eq'],
        'updatedAt' => ['gte', 'lte', 'gt', 'lt', 'eq'],
    ];

    protected $columnMap = [
        'createdAt' => 'created_at',
        'updatedAt' => 'updated_at',
    ];

    protected $operatorMap = [
        'like' => 'like',
        'gte' => '>=',
        'lte' => '<=',
        'gt' => '>',
        'lt' => '<',
        'eq' => '=',
    ];

}
