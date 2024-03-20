<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter
{
    protected array $allowedFilters = [];

    protected array $columnMap = [];

    protected array $operatorMap = [];

    public function transform(Request $request): array
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
