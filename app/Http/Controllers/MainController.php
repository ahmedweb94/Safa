<?php

namespace App\Http\Controllers;

use App\Http\Helper\RESTApi;
use App\Http\Filter\Filter;
use App\Http\Filter\QueryFilter;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    use RESTApi;
    protected $filter;

    public function __construct(Filter $filter)
    {
        $this->filter=$filter;
    }

    public function index()
    {
        try{
        $response = Http::get(config('services.filter.base_url').''.$this->make($this->filter));
        return $this->sendJson($response->json());
        }catch (\Exception $e){
            return $this->sendError($e->getMessage());
        }
    }

    public function make(QueryFilter $filter)
    {
       return $filter->apply();
    }

}
