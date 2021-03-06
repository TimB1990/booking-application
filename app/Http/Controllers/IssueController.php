<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;
use App\Models\Accommodation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class IssueController extends Controller
{
    public function index($domain)
    {
        // get current accommodation
        $accommodation = Accommodation::where('domain', $domain)->first();

        // get collections of issuable types that belong to current accommodation
        $residences = $accommodation->residences;
        $assets = $accommodation->assets;

        // init data array
        $issues = [
            'accommodation' => [],
            'residences' => [],
            'assets' => []
        ];

        // retrieve issues related to accommodation
        if ($accommodation->issues->count() > 0) {
            $issues['accommodation'] = $accommodation->issues;
        }

        // retrieve issues of each residence
        foreach ($residences as $residence) {
            if ($residence->issues->count() > 0) {
                array_push($issues['residences'], $residence->issues);
            }
        }

        // retrieve issues of each asset
        foreach ($assets as $asset) {
            if ($asset->issues->count() > 0) {
                array_push($issues['assets'], $asset->issues);
            }
        }

        // return data to view
        return view('pages.issues', [
            'accommodation' => $accommodation,
            'issues' => $issues,
            'title' => 'issues'
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

    public function show(Issue $issue)
    {
        //
    }

    public function edit(Issue $issue)
    {
        //
    }

    public function update(Request $request, Issue $issue)
    {
        //
    }

    public function destroy(Issue $issue)
    {
        //
    }
}
