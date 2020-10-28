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
        $days = 14;

        // define weekstart of given week no.
        $week_start = new DateTime();
        $week_start->setISODate($year, $week);

        @endphp

        <!-- btn panel left section -->
        <div class="btn-panel-section">
            <a href="{{ '/' . $accommodation->domain . '/dashboard/reservations?year=' . $year . '&week=' . $week . '&subject=residences' }}"
                class="btn-default {{ $subject == 'residences' ? 'active' : '' }}">
                Residences
            </a>
            <a href="{{ '/' . $accommodation->domain . '/dashboard/reservations?year=' . $year . '&week=' . $week . '&subject=meetingrooms' }}"
                class="btn-default {{ $subject == 'meetingrooms' ? 'active' : ''}}">
                Meeting Rooms
            </a>
        </div>

        <!-- btn panel right section -->
        <div class="btn-panel-section">
            <a href="{{ '/' . $accommodation->domain . '/dashboard/reservations?year=' . ($week > 1 ? $year : $year - 1) . '&week=' . ($week > 1 ? $week - 1 : 52) . '&subject=' . $subject }}"
                class="btn-default">Previous Week</a>
            <span
                style="margin-left:0.5rem;margin-right:0.5rem;">{{ $week . ' | ' . ($week < 52 ? $week + 1 : 1) }}</span>
            <a href="{{ '/' . $accommodation->domain . '/dashboard/reservations?year=' . ($week < 52 ? $year : $year + 1) . '&week=' . ($week < 52 ? $week + 1 : 1) . '&subject=' . $subject  }}"
                class="btn-default">Next Week</a>
        </div>
    </div>


    <table class="reservable-planner">
        <!-- content for horizontal axis header -->
        <tr>
            <td>#</td>
            @for($d = 0; $d < $days; $d++)
                <td>
                    {{ date('Y-m-d', strtotime( $week_start->format('Y-m-d') . ' +'. $d . ' days'))}}
                </td>
            @endfor
        </tr>

        <!-- content -->
        @for($i = 0; $i < $accommodation[$subject]->count(); $i++)
            <tr>
                <!-- content for vertical axis descriptions -->
                <td>{{ $i + 1 }}</td>
                @foreach($cells as $cell)
                    @if($cell['no'] == ($i + 1))
                        <td>
                        <span style="{{ $cell['taken'] ? 'background-color:red;font-weight:bold;padding:0.25rem;' : ''}}">
                            {{ json_encode($cell['taken'])}}
                        </span>
                        </td>
                    @endif
                @endforeach
            </tr>
        @endfor
    </table>
</div>

@endsection