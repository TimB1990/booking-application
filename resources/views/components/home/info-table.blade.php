<table>
    <tr>
        <td>name</td>
        <td>{{ $accommodation[0]->name }}</td>
    </tr>
    <tr>
        <td>location</td>
        <td>{{ $accommodation[0]->location }}</td>
    </tr>
    <tr>
        <td>description</td>
        <td>{{ $accommodation[0]->description }}</td>
    </tr>
    <tr>
        <td>stars</td>
        <td>{{ $accommodation[0]->stars }}</td>
    </tr>
    <tr>
        <td>rating</td>
        <td>{{ $accommodation[0]->guests_rating }}</td>
    </tr>
    <tr>
        <td>residences</td>
        <td>{{ $accommodation[0]->amount_residences }}</td>
    </tr>
    <tr>
        <td>meeting rooms</td>
        <td>{{ $accommodation[0]->amount_meeting_rooms }}</td>
    </tr>
</table>