<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition()
    {
        // returns clean instance in order to alter in reservationSeeder -- not neccesary
        return [
            'reservation_id' => 0,
            'invoice_date' => null,
            'due_date' => null,
            'subtotal' => 0,
            'tax_9' => 0,
            'tax_21' => 0,
            'late_fees' => 0,
            'total' => 0,
        ];
    }
}
