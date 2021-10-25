<?php

namespace App\Http\Controllers;

use App\Http\Filter\Filter;
use App\Http\Filter\QueryFilter;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    protected $filter;

    public function __construct(Filter $filter)
    {
        $this->filter=$filter;
    }

    public function index()
    {
        $response = Http::get(config('services.filter.base_url').''.$this->make($this->filter));
        return response()->json(['data'=>$response->json()]);
    }

    public function make(QueryFilter $filter)
    {
       return $filter->apply();
    }

}
