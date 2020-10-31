<?php

namespace Database\Seeders;

use DateTime;
use DateInterval;
use App\Models\Guest;
use App\Models\Invoice;
use App\Models\Residence;
use App\Models\InvoiceLine;
use App\Models\Reservation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuestSeeder extends Seeder
{
    public function run()
    {
        $guests = Guest::factory()
            ->has(Reservation::factory()->count(1))
            ->count(3)
            ->create();

        foreach ($guests as $guest) {
            $reservations = $guest->reservations;
            $reservations->each(function (Reservation $reservation) {

                // generate checkin checkout logic

                $daysAhead = rand(2,7);
                $date = strtotime("+" . $daysAhead . " days");

                // $checkinDate = date("Y-m-d", $date);
                // $checkoutDate = date("Y-m-d", strtotime("+2 days", $date));

                $checkinDate = new DateTime(date("Y-m-d H:i", $date));

                $checkoutDate = new DateTime(date("Y-m-d H:i", $date));
                $checkoutDate->add(new DateInterval("P2D"));

                $checkinDate->setTime(14,0,0);
                $checkoutDate->setTime(11,0,0);

                $checkinDate->format('Y-m-d H:i');
                $checkoutDate->format('Y-m-d H:i');

                // set data for polymorphic many to many pivot table
                $pivot_data = [
                    'reservation_id' => $reservation->id,
                    'reservable_id' => Residence::distinct('id')->pluck('id')->random(),
                    'reservable_type' => Residence::class,
                    'check_in' => $checkinDate,
                    'check_out' => $checkoutDate               
                ];

                // populate polymorphic many to many pivot table
                DB::table('reservables')->insert($pivot_data);

                // find residence that has defined random generated reservable_id
                $residence = Residence::find($pivot_data['reservable_id']);

                // set taken to true
                $residence->status = 'taken';

                // save residence to DB
                $residence->save();

                // calculate time difference in days
                $diff = $checkinDate->diff($checkoutDate)->format('%d');


                // set invoice data
                $invoice_data = [
                    'reservation_id' => $reservation->id,
                    'invoice_date' => $checkoutDate,
                    'due_date' => $checkoutDate->add(new DateInterval('P1W')),
                    'subtotal' => 0,
                    'tax_9' => 0,
                    'tax_21' => 0,
                    'late_fees' => 0,
                    'total' => 0
                ];

                // save invoice to DB
                $invoice = Invoice::create($invoice_data);

                // get reservables for reservation_id
                $reservables = DB::table('reservables')->where('reservation_id', $reservation->id)->get();

                // create invoiceLine for each reservable in reservation
                $reservables->each(function ($reservable) use ($invoice, $diff, $residence) {
                    InvoiceLine::create([
                        'invoice_id' => $invoice->id,
                        'reservable_id' => $reservable->reservable_id,
                        'type' => $reservable->reservable_type,
                        'description' => 'stay (nights)',
                        'quantity' => $diff,
                        'cost' => $residence->price_per_night,
                        'amount' => ($diff - 1) * $residence->price_per_night
                    ]);
                });

                // calc subtotal for invoice
                $subtotal = $invoice->invoiceLines->sum('amount');

                // update invoice
                $invoice->subtotal = $subtotal;
                $invoice->tax_9 = $subtotal * 0.09;
                $invoice->total = $subtotal + $invoice->tax_9 + $invoice->tax_21 + $invoice->late_fees;

                // store invoice in DB
                $invoice->save();

                // update reservations
                $reservation->invoice_id = $invoice->id;
                $reservation->save();
            });
        }

        // $reservations = Reservation::factory()->count(3)->forGuest()->create();
    }
}
