<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\Accommodation;
use Illuminate\Database\Eloquent\Builder;

class InvoiceController extends Controller
{

    public function index($domain)
    {
        
        // retrieve accommodation information
        $accommodation = Accommodation::where('domain', $domain)->first();
        $acc_id = $accommodation->id;

        // retrieve invoice that belong to reservations on current accommodation
        $invoices = Invoice::whereHas('reservation', function (Builder $query) use ($acc_id) {
            $query->where('accommodation_id', $acc_id);
        })->get();

        // retrieve invoice lines
        

        // return view with invoices data
        return view('pages.invoices', [
            'accommodation' => $accommodation,
            'invoices' => $invoices,
            'title' => 'invoices'
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


    public function show(Invoice $invoice)
    {
        //
    }

    public function edit(Invoice $invoice)
    {
        //
    }

    public function update(Request $request, Invoice $invoice)
    {
        //
    }


    public function destroy(Invoice $invoice)
    {
        //
    }
}
