<table class="info-table">
    <tr>
        <td>name</td>
        <td>{{ $accommodation->name }}</td>
    </tr>
    <tr>
        <td>location</td>
        <td>{{ $accommodation->location }}</td>
    </tr>
    <tr>
        <td>description</td>
        <td>{{ $accommodation->description }}</td>
    </tr>
    <tr>
        <td>stars</td>
        <td>{{ $accommodation->stars }}</td>
    </tr>
    <tr>
        <td>rating</td>
        <td>{{ $accommodation->guests_rating }}</td>
    </tr>
    <tr>
        <td>residences</td>
        <td>{{ $accommodation->amount_residences }}</td>
    </tr>
    <tr>
        <td>meeting rooms</td>
        <td>{{ $accommodation->amount_meeting_rooms }}</td>
    </tr>
</table>