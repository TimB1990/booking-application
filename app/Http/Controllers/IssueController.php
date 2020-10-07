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
        $accommodation = Accommodation::where('domain', $domain)->get();

        // get collections of issuable types that belong to current accommodation
        $residences = $accommodation->residences;
        $assets = $accommodation->assets;
        $accommodation_issues = $accommodation->issues;

        // init data array
        $issues = [
            'accommodation' => null,
            'residences' => null,
            'assets' => null
        ];

        // retrieve issues of each residence
        foreach ($residences as $residence) {
            if (!empty($residence->issues)) {
                $issues['residences'] = $residence->issues;
            } else {
                $issues['residences'] = 'There are currently no related issues to any residence';
            }
        }

        // retrieve issues of each asset
        foreach ($assets as $asset) {
            if (!empty($asset->issues)) {
                $issues['assets'] = $asset->issues;
            } else {
                $issues['assets'] = 'There are currently no issues related to any reservable asset';
            }
        }

        // retrieve issues related to accommodation
        if (!empty($accommodation_issues)) {
            $issues['accommodation'] = $accommodation_issues;
        } else {
            $issues['accommodation'] = 'There are currently no issues related to this accommodation';
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
