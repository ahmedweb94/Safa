<?php

namespace App\Http\Filter;

use App\Http\Requests\FilterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

abstract class QueryFilter
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Builder
     */
    protected $builder;

    /**
     * @param Request $request
     */
    public function __construct(FilterRequest $request)
    {
        $this->request = $request;
    }


    public function apply()
    {
        $this->builder = '?q=';
        foreach ($this->request->validated() as $field => $value) {
            $method = Str::camel($field);
            if (method_exists($this, $method)) {
                if ($value == null) continue;
                call_user_func([$this, $method], $value);
            }
        }
        return $this->builder;
    }
}
