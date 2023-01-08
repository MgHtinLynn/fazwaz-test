<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PropertiesController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('home.index');
    }

    /**
     * @param $province
     * @return Application|Factory|View
     */
    public function listingByProvince($province)
    {
        $existingProvince = Property::query()->where('geo->province', '=', ucfirst($province));

        if (!$existingProvince->exists()) {
            abort(404);
        }

        return view('home.index', compact('province'));
    }
}
