<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use App\Models\Accommodation;
use Illuminate\Database\Eloquent\Builder;

class AssetController extends Controller
{

    public function index($domain)
    {
        $accommodation = Accommodation::where('domain', $domain)->get();
        $acc_id = $accommodation[0]->id;

        $assets = Asset::whereHas('accommodation', function (Builder $query) use ($acc_id) {
            $query->where('accommodation_id', $acc_id);
        })->get();

        return view('pages.assets', [
            'accommodation' => $accommodation,
            'assets' => $assets,
            'title' => 'assets'
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Asset $asset)
    {
        //
    }


    public function edit(Asset $asset)
    {
        //
    }

    public function update(Request $request, Asset $asset)
    {
        //
    }

    public function destroy(Asset $asset)
    {
        //
    }
}
