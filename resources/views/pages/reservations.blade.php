@extends('layouts.dashboard')

@section('content')
<div class="content">

    <!-- html button panel -->
    <div class="btn-panel">

        @php

        // get querystring param from current route
        $year = app('request')->input('year');
        $week = app('request')->input('week');
        $subject = app('request')->input('subject');

        // define weekstart of given week no.
        $week_start = new DateTime();
        $week_start->setISODate($year, $week);

        @endphp

        <!-- btn panel left section -->
        <div class="btn-panel-section">
        <a href="{{ '/' . $accommodation[0]->domain . '/dashboard/reservations?year=' . $year . '&week=' . $week . '&subject=residences' }}" class="btn-default {{ $subject == 'residences' ? 'active' : '' }}">
                Residences
            </a>
        <a href="{{ '/' . $accommodation[0]->domain . '/dashboard/reservations?year=' . $year . '&week=' . $week . '&subject=meetingrooms' }}" class="btn-default {{ $subject == 'meetingrooms' ? 'active' : ''}}">
                Meeting Rooms
            </a>
        </div>

        <!-- btn panel right section -->
        <div class="btn-panel-section">
            <a href="{{ '/' . $accommodation[0]->domain . '/dashboard/reservations?year=' . ($week > 1 ? $year : $year - 1) . '&week=' . ($week > 1 ? $week - 1 : 52) . '&subject=' . $subject }}"
                class="btn-default">Previous Week</a>
            <span
                style="margin-left:0.5rem;margin-right:0.5rem;">{{ $week . ' | ' . ($week < 52 ? $week + 1 : 1) }}</span>
            <a href="{{ '/' . $accommodation[0]->domain . '/dashboard/reservations?year=' . ($week < 52 ? $year : $year + 1) . '&week=' . ($week < 52 ? $week + 1 : 1) . '&subject=' . $subject  }}"
                class="btn-default">Next Week</a>
        </div>
    </div>


    <table class="reservable-planner">
        <tr>
            <td></td>

            <!-- loop over date between week start and week end for horizontal axis -->
            @for ($d = 0; $d < 14; $d++) @php $day=date('D, Y-m-d', strtotime($week_start->format('Y-m-d') . ' +' . $d .
                ' days' ));
                @endphp
                <td style="">
                    {{ $day }}
                </td>
                @endfor
        </tr>

        <!-- display residences nrs for vertical axis -->

        @php
        
        $amount = null;

        if($subject == "residences"){
            $amount = $accommodation[0]->amount_residences;
        }
        if($subject == "meetingrooms"){
            $amount = $accommodation[0]->amount_meeting_rooms;
        }


        @endphp

        @for ($i = 0; $i < $amount; $i++) <tr>
            <td>{{ $i + 1 }}</td>

            <!-- display table cells -->
            @for ($j = 0; $j < 14; $j++) @php $cellDate=date('Y-m-d', strtotime($week_start->format('Y-m-d') . ' +'
                .
                $j . ' days'));
                $number = $i + 1;
                $markcell = false;
                $hideCellSideBorders = false;
                $hideCellLeftBorder = false;

                // loop over each reservation
                foreach($reservations as $reservation){

                // if subject = residence loop over each residence from reservation
                if($subject == 'residences' && isset($reservation->residences)){
                foreach($reservation->residences as $residence){

                // check if cellDate is between checkin and checkout, if true mark cell.
                if($residence->residence_nr == $number && ($cellDate >= $reservation->check_in && $cellDate <=
                    $reservation->check_out)){
                    $markcell = true;

                    // check if cellDate is between checkin and checkout date reservation, if true hide cell's left
                    if($residence->residence_nr == $number && ($cellDate > $reservation->checkin_in &&
                    $cellDate < $reservation->check_out)){
                        $hideCellSideBorders = true;
                        }

                        // check if CellDate is checkout date, if true hiden only left border
                        if($residence->residence_nr == $number && ($cellDate == $reservation->check_out)){
                        $hideCellLeftBorder = true;
                        }
                        }
                        }
                        }

                        if($subject == 'meetingrooms' && isset($reservation->meetingRooms)){
                        foreach($reservation->meetingRooms as $mr){
                        if($mr->id == $number && ($cellDate >= $reservation->check_in && $cellDate <= $reservation->
                            check_out)){
                            $markcell = true;
                            }
                            }
                            }

                            }

                            @endphp


                            @if ($hideCellSideBorders == false && $hideCellLeftBorder == false)
                            <td></td>
                            @endif

                            @if ($hideCellSideBorders == true)
                            <td style="border-left:none;border-right:none;"
                                class="{{ $markcell == true ? 'taken' : '' }}">
                                @if ($cellDate == $reservation->check_in)
                                {{ $reservation->id }}, {{ $reservation->guest->first_name }}
                                {{ $reservation->guest->last_name }}
                                @endif
                            </td>
                            @endif

                            @if ($hideCellLeftBorder == true)
                            <td style="border-left:none;" class="{{ $markcell == true ? 'taken' : '' }}"></td>
                            @endif
                            @endfor
                            </tr>
                            @endfor
    </table>
</div>

@endsection