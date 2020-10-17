@extends('layouts.dashboard')

@section('content')
<div class="content">

    <div class="btn-panel">

        @php

            // get querystring param from current route
            $year = app('request')->input('year');
            $week = app('request')->input('week');

            // define weekstart of given week no.
            $week_start = new DateTime();
            $week_start->setISODate($year, $week);

        @endphp

        <!-- html button panel -->        
        <a href="{{ '/' . $accommodation[0]->domain . '/dashboard/reservations?year=' . ($week > 1 ? $year : $year - 1 ). '&week=' . ($week > 1 ? $week - 1 : 52) }}" class="btn-default">Previous Week</a>
            <span style="margin-left:0.5rem;margin-right:0.5rem;">{{ $week . ' | ' . ($week < 52 ? $week + 1 : 1) }}</span>
        <a href="{{ '/' . $accommodation[0]->domain . '/dashboard/reservations?year=' . ($week < 52 ? $year : $year + 1) . '&week=' . ($week < 52 ? $week + 1 : 1) }}" class="btn-default">Next Week</a>
    </div>


    <table class="reservable-planner">
        <tr>
            <td></td>

            <!-- loop over date between week start and week end for horizontal axis -->
            @for($d = 0; $d < 14; $d++) 
                @php       
                    $day=date('D, Y-m-d', strtotime($week_start->format('Y-m-d') . ' +' . $d . ' days' ));
                @endphp 
                <td style="">
                    {{ $day }} 
                </td>
            @endfor
        </tr>

        <!-- display residences nrs for vertical axis -->
        @for($i = 0; $i < $accommodation[0]->amount_residences; $i++ )
            <tr>
                <td>{{ $i + 1}}</td>

                <!-- display table cells -->
                @for($j = 0; $j < 14; $j++)

                    @php

                            $cellDate = date('Y-m-d', strtotime($week_start->format('Y-m-d') . ' +' . $j . ' days'));
                            $residenceNr = $i + 1;
                            $markcell = false;
                            $hideCellSideBorders = false;
                            $hideCellLeftBorder = false;

                            // loop over each reservation
                            foreach($reservations as $reservation){

                                // loop over each residence from reservation
                                foreach($reservation->residences as $residence){

                                    // check if cellDate is greater than or equal to checkin and check if cellDate is smaller than or equal to checkout date of reservation, if true mark cell.
                                    if($residence->residence_nr == $residenceNr && ($cellDate >= $reservation->check_in && $cellDate <= $reservation->check_out)){
                                        $markcell = true;

                                        // check if cellDate is between checkin and checkout date reservation, if true hide cell's left and right borders
                                        if($residence->residence_nr == $residenceNr && ($cellDate > $reservation->checkin_in && $cellDate < $reservation->check_out)){
                                            $hideCellSideBorders = true;
                                        }

                                        // check if CellDate is checkout date, if true hiden only left border
                                        if($residence->residence_nr == $residenceNr && ($cellDate == $reservation->check_out)){
                                            $hideCellLeftBorder = true;
                                        }
                                    }
                                }
                            }

                    @endphp
                        @if($hideCellSideBorders == false && $hideCellLeftBorder == false)
                            <td></td>
                        @endif
              
                        @if($hideCellSideBorders == true)
                            <td style="border-left:none;border-right:none;" class="{{ $markcell == true ? 'taken' : '' }}">
                                @if($cellDate == $reservation->check_in)
                                    {{ $reservation->id }}, {{ $reservation->guest->first_name}} {{ $reservation->guest->last_name }}
                                @endif
                            </td>
                        @endif

                        @if($hideCellLeftBorder == true)
                            <td style="border-left:none;" class="{{ $markcell == true ? 'taken' : '' }}"></td>
                        @endif
                @endfor
            </tr>
            @endfor
    </table>

</div>

@endsection