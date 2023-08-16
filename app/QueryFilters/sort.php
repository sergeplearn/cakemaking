<?php

namespace App\QueryFilters;

use Closure;

class sort
{
    public function handle($request, Closure $next)
    {

        if (! request()->has('sort')) {
            return $next($request);
        }

        $builder = $next($request);

        return $builder->orderBy('price', request('sort'));

    }
}
