<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class UsersFilter extends ApiFilter
{
    protected array $allowedFilters = [
        'name' => ['like'],
        'email' => ['like'],
        'createdAt' => ['gte', 'lte', 'gt', 'lt', 'eq'],
        'updatedAt' => ['gte', 'lte', 'gt', 'lt', 'eq'],
    ];

    protected array $columnMap = [
        'createdAt' => 'created_at',
        'updatedAt' => 'updated_at',
    ];

    protected array $operatorMap = [
        'like' => 'like',
        'gte' => '>=',
        'lte' => '<=',
        'gt' => '>',
        'lt' => '<',
        'eq' => '=',
    ];
}
