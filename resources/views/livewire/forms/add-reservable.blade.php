<div>
    <form action="" class="reservation-form">
        <fieldset class="reservation-form-fieldset">
            <legend>Reservation</legend>
            <label for="subject">Reservable Subject:</label>
            <select name="subject" id="subject">
                <option value="residence">Residence</option>
                <option value="meeting-room">Meeting Room</option>
                <option value="asset">Reservable Asset</option>
            </select>
            <label for="">Check In: </label>
            <input id="checkin" type="date" placeholder="Check In">
            <label for="">Check Out: </label>
            <input id="checkout" type="date" placeholder="check Out">
            <input class="btn-default" type="submit" value="Add">
        </fieldset>
    </form>
</div>
