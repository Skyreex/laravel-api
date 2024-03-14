<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter
{
    protected $allowedFilters = [];

    protected $columnMap = [];

    protected $operatorMap = [];

    public function transform(Request $request)
    {
        $eloquentQuery = [];

        foreach ($this->allowedFilters as $filter => $operators) {
            $query = $request->query($filter);

            if (!isset($query)) continue;

            $column = $this->columnMap[$filter] ?? $filter;

            foreach ($operators as $operator) {
                if (isset($query[$operator]))
                    $eloquentQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];

            }
        }
        return $eloquentQuery;
    }
}
