<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{


    /**
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $property = Property::query();

        if ($request->has('province')) {
            $property->whereJsonContains('geo->province', ucfirst($request->input('province')));
        }

        if ($request->has('sale')) {
            $property->where('for_sale','=',true);
        }

        if ($request->has('sold')) {
            $property->where('sold','=',true);
        }

        if ($request->has('search')) {
            $search = $request->input('search');

            $property->where(function (Builder $query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('geo->province', 'like', '%' . $search . '%')
                    ->orWhere('geo->country', 'like', '%' . $search . '%')
                    ->orWhere('geo->street', 'like', '%' . $search . '%');
            });
        }

        return $property->paginate(5);
    }
}
