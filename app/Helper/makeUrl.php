<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 10/25/2021
 * Time: 08:57 PM
 */

namespace App\Helper;


use Carbon\Carbon;

class makeUrl
{

    public static function make($request)
    {
        $url = config('services.filter.base_url').'?q=';
        if (isset($request['date'])) {
            $date = Carbon::parse($request['date'])->format('Y-m-d');
            $url .= "+created:$date";
        } else {
            $url .= "+created:2019-01-10";
        }
        if (isset($request['language'])) {
            $url .= "+language:" . $request['language'];
        }
        if (isset($request['sort'])) {
            $url .= "&sort:" . $request['sort'];
        }
        if (isset($request['order'])) {
            $order = in_array($request['order'], ['asc', 'desc']) ? $request['order'] : 'desc';
            $url .= "&order:$order";
        }
        if (isset($request['limit'])) {
            $url .= "&per_page:" . $request['limit'];
        }
        return $url;
    }
}
