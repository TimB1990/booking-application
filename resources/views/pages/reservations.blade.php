@extends('layouts.dashboard')

@section('content')
<div class="content">

    <div class="btn-panel">
        <button class="btn-default" onclick="">Previous Week</button>
        <span style="margin-left:0.5rem;margin-right:0.5rem;">{{ date('W') . " wrong week" }}</span>
        <button class="btn-default" onclick="">Next Week</button>
    </div>


    <table class="reservable-planner">
        <tr>
            <td></td>

            <!-- loop over date between week start and week end for horizontal axis -->
            @for($d = 0; $d < 14; $d++) 
                @php 
                    $weekStart=date('Y-m-d', strtotime('monday this week')); 
                    $day=date('D, Y-m-d',
                        strtotime($weekStart . ' +' . $d . ' days' ));
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

                            $cellDate = date('Y-m-d', strtotime(date('Y-m-d', strtotime('monday this week')) . ' +' . $j . ' days'));
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