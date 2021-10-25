<?php
namespace App\Http\Filter;


use Carbon\Carbon;

class Filter extends QueryFilter
{

    public function date($date)
    {
        $date=Carbon::parse($date)->format('Y-m-d');
        $this->builder.="+created:$date";
    }

    public function language($language)
    {
        $this->builder.="+language:$language";
    }

    public function sort($sort)
    {
        $this->builder.="&sort=$sort";
    }

    public function order($order)
    {
        $order=in_array($order,['asc','desc'])?$order:'desc';
        $this->builder.="&order=$order";
    }

    public function limit($limit)
    {
        $this->builder.="&per_page=$limit";
    }

}
