@extends('layouts.dashboard')

@section('content')
<div class="content">

    <div class="btn-panel">
        <button class="btn-default" onclick="">Previous Week</button>
        <span style="margin-left:0.5rem;margin-right:0.5rem;">{{ date('W') }}</span>
        <button class="btn-default" onclick="">Next Week</button>
    </div>


    <table class="reservable-planner">
        <tr>
            <td></td>

            <!-- loop over date between week start and week end for horizontal axis -->
            @for($d = 0; $d < 7; $d++) 
                @php 
                    $weekStart=date('Y-m-d', strtotime('monday next week')); 
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
                @for($j = 0; $j < 7; $j++)

                    @php

                            $celDate = date('Y-m-d', strtotime(date('Y-m-d', strtotime('monday next week')) . ' +' . $j . ' days'));
                            $residenceNr = $i + 1;
                            $markcell = false;

                            foreach($reservations as $reservation){
                                foreach($reservation->residences as $residence){
                                    if($residence->residence_nr == $residenceNr && ($celDate >= $reservation->check_in && $celDate <= $reservation->check_out)){
                                        $markcell = true;
                                    }
                                }
                            }


                    @endphp
              
                        <td style="{{ $markcell === true ? 'background-color:red;' : '' }}">
                        <!-- cel content -->
                        {{ $celDate }}, {{ $residenceNr }}
                        
                    </td>

                @endfor
            </tr>
            @endfor
    </table>

    <!-- code -->
    <code>
        {{ $reservations }}
    </code>

</div>

@endsection